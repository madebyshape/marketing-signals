<?php

namespace modules\site\seed;

use Craft;
use craft\base\Element;
use craft\elements\Category;
use craft\fields\Categories as CategoriesField;
use craft\helpers\Db;
use craft\models\CategoryGroup;

/**
 * Turns the titles a Categories field is given into category IDs, creating any the field's own
 * group does not hold yet.
 *
 * A Seed names categories by title and never by slug, since a Seed that creates one has only a
 * title to give it and Craft derives the slug from that. A Categories field relates to a single
 * group, which is where a title is looked up and where a missing category is created; a field
 * whose source is not a group stops the run rather than the command guessing one. A dry run
 * resolves and reports the same way and creates nothing.
 */
class CategoriesResolver
{
    /** @var SeedCategoryOutcome[] */
    private array $outcomes = [];

    public function __construct(
        private readonly bool $dryRun,
    ) {
    }

    /**
     * @return int[] the IDs to relate, in the order the Seed listed them. Craft keeps that order.
     *               A dry run has no ID for a category it did not create, so those are left out.
     * @throws SeedException if the value is not a list of titles, or the field names no group.
     */
    public function resolve(CategoriesField $field, mixed $value): array
    {
        if (!is_array($value) || !array_is_list($value)) {
            throw new SeedException(sprintf(
                'Field “%s” takes a list of category titles, but the Seed gives %s.',
                $field->handle,
                get_debug_type($value),
            ));
        }

        $group = $this->group($field);
        $ids = [];

        foreach ($value as $title) {
            if (!is_string($title) || trim($title) === '') {
                throw new SeedException(sprintf(
                    'Field “%s” takes a list of category titles, but one of them is %s.',
                    $field->handle,
                    is_string($title) ? 'empty' : get_debug_type($title),
                ));
            }

            $id = $this->one($field, $group, trim($title));

            if ($id !== null) {
                $ids[] = $id;
            }
        }

        return $ids;
    }

    /**
     * @return SeedCategoryOutcome[]
     */
    public function outcomes(): array
    {
        return $this->outcomes;
    }

    /**
     * @throws SeedException
     */
    private function one(CategoriesField $field, CategoryGroup $group, string $title): ?int
    {
        $existing = Category::find()
            ->group($group)
            ->title(Db::escapeParam($title))
            ->site('*')
            ->unique()
            ->status(null)
            ->one();

        if ($existing !== null) {
            $this->outcomes[] = new SeedCategoryOutcome(SeedCategoryOutcome::RESOLVED, $field->handle, (string)$existing->title, $group->handle);

            return $existing->id;
        }

        $this->outcomes[] = new SeedCategoryOutcome(SeedCategoryOutcome::CREATED, $field->handle, $title, $group->handle);

        return $this->dryRun ? null : $this->create($group, $title);
    }

    /**
     * Craft places the new category at the end of the group's structure and derives its slug
     * from the title, so there is nothing else for a Seed to give it.
     *
     * @throws SeedException
     */
    private function create(CategoryGroup $group, string $title): int
    {
        $category = new Category();
        $category->groupId = $group->id;
        $category->title = $title;
        $category->setScenario(Element::SCENARIO_LIVE);

        if (!Craft::$app->getElements()->saveElement($category)) {
            throw new SeedException(sprintf(
                "Category “%s” could not be created in group “%s”:\n%s",
                $title,
                $group->handle,
                implode("\n", array_map(
                    static fn(string $error): string => "  - $error",
                    $category->getErrorSummary(true),
                )),
            ));
        }

        return $category->id;
    }

    /**
     * @throws SeedException
     */
    private function group(CategoriesField $field): CategoryGroup
    {
        $source = $field->source ?? '';
        $uid = str_starts_with($source, 'group:') ? substr($source, strlen('group:')) : null;
        $group = $uid !== null ? Craft::$app->getCategories()->getGroupByUid($uid) : null;

        return $group ?? throw new SeedException(sprintf(
            'Field “%s”: its source “%s” is not a category group, so the Seed cannot say where its categories live.',
            $field->handle,
            $source,
        ));
    }
}
