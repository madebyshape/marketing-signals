<?php

namespace modules\site\seed;

use craft\base\ElementInterface;
use craft\elements\Category;
use craft\elements\Entry;
use craft\fields\Link as LinkField;

/**
 * Turns a Seed's link value into the array a Link field takes.
 *
 * Entries and categories are named by slug and assets by filename, so a Seed never carries an
 * ID. Craft stores a reference tag for those, which is what the control panel writes too. The
 * text types — url, email and tel — take their value as given, and a bare string is a url, so
 * the common link is one line.
 */
class LinkResolver
{
    /** The link types a Seed may name, matching the ids Craft's own link types register under. */
    private const TYPES = ['entry', 'category', 'asset', 'url', 'email', 'tel'];

    /** Keys a link value may carry. `target` and `ariaLabel` reach the field only if it offers them. */
    private const KEYS = ['type', 'value', 'label', 'target', 'ariaLabel'];

    public function __construct(
        private readonly AssetResolver $assets,
    ) {
    }

    /**
     * @return array<string, string> the link as Craft's Link field normalizes it.
     * @throws SeedException if the value is not a link, or names something that is not there.
     */
    public function resolve(LinkField $field, mixed $value): array
    {
        if (is_string($value)) {
            $value = ['type' => 'url', 'value' => $value];
        }

        if (!is_array($value) || array_is_list($value)) {
            throw new SeedException(sprintf(
                'Field “%s” takes a URL string, or an object with “type” and “value”, but the Seed gives %s.',
                $field->handle,
                get_debug_type($value),
            ));
        }

        foreach (array_keys($value) as $key) {
            if (!in_array($key, self::KEYS, true)) {
                throw new SeedException(sprintf(
                    'Field “%s”: a link has an unknown key “%s”. A link takes: %s.',
                    $field->handle,
                    $key,
                    implode(', ', self::KEYS),
                ));
            }
        }

        $type = $this->type($field, $value);
        $target = $this->string($field, $value, 'value');

        return array_filter([
            'type' => $type,
            'value' => $this->value($field, $type, $target),
            'label' => $this->optional($field, $value, 'label'),
            'target' => $this->optional($field, $value, 'target'),
            'ariaLabel' => $this->optional($field, $value, 'ariaLabel'),
        ], static fn(?string $part): bool => $part !== null);
    }

    /**
     * @throws SeedException
     */
    private function type(LinkField $field, array $value): string
    {
        $type = $value['type'] ?? 'url';

        if (!is_string($type) || !in_array($type, self::TYPES, true)) {
            throw new SeedException(sprintf(
                'Field “%s”: a link’s “type” is one of: %s. The Seed gives “%s”.',
                $field->handle,
                implode(', ', self::TYPES),
                is_scalar($type) ? (string)$type : get_debug_type($type),
            ));
        }

        return $type;
    }

    /**
     * The stored value for a link: a reference tag for the element types, the string itself for
     * the rest.
     *
     * @throws SeedException
     */
    private function value(LinkField $field, string $type, string $target): string
    {
        return match ($type) {
            'entry' => $this->reference('entry', $this->entry($field, $target)),
            'category' => $this->reference('category', $this->category($field, $target)),
            'asset' => $this->reference('asset', $this->asset($field, $target)),
            default => $target,
        };
    }

    private function reference(string $handle, ElementInterface $element): string
    {
        return sprintf('{%s:%d@%d:url}', $handle, $element->id, $element->siteId);
    }

    /**
     * @throws SeedException
     */
    private function entry(LinkField $field, string $slug): Entry
    {
        return Entry::find()->slug($slug)->site('*')->unique()->status(null)->one()
            ?? throw new SeedException("Field “{$field->handle}”: no entry with the slug “{$slug}”.");
    }

    /**
     * @throws SeedException
     */
    private function category(LinkField $field, string $slug): Category
    {
        return Category::find()->slug($slug)->site('*')->unique()->status(null)->one()
            ?? throw new SeedException("Field “{$field->handle}”: no category with the slug “{$slug}”.");
    }

    /**
     * A link points at an image the volume already holds; unlike an Assets field, it never
     * uploads one.
     *
     * @throws SeedException
     */
    private function asset(LinkField $field, string $filename): ElementInterface
    {
        return $this->assets->find(basename($filename))
            ?? throw new SeedException("Field “{$field->handle}”: no asset named “{$filename}” in the Seed’s volume.");
    }

    /**
     * @throws SeedException
     */
    private function string(LinkField $field, array $value, string $key): string
    {
        $part = $value[$key] ?? null;

        if (!is_string($part) || $part === '') {
            throw new SeedException(sprintf(
                'Field “%s”: a link’s “%s” is a non-empty string, but the Seed gives %s.',
                $field->handle,
                $key,
                get_debug_type($part),
            ));
        }

        return $part;
    }

    /**
     * @throws SeedException
     */
    private function optional(LinkField $field, array $value, string $key): ?string
    {
        return isset($value[$key]) ? $this->string($field, $value, $key) : null;
    }
}
