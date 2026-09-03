<?php

namespace modules\site\seed;

/**
 * One Block in a Seed: the entry type to create, and its field values by handle. A nested
 * Matrix value is a list of these, read by the same rules as a top-level Block.
 */
readonly class SeedBlock
{
    public function __construct(
        public string $type,
        public array $fields,
        public int $position,
    ) {
    }

    /**
     * @param mixed $block one entry of a Seed's `blocks` list, or of a nested Matrix value.
     * @throws SeedException if it is not a Block.
     */
    public static function fromArray(mixed $block, int $position): self
    {
        if (!is_array($block) || array_is_list($block)) {
            throw new SeedException("Block $position must be a JSON object.");
        }

        if (!isset($block['type']) || !is_string($block['type']) || $block['type'] === '') {
            throw new SeedException("Block $position must name an entry type in “type”.");
        }

        $fields = $block['fields'] ?? [];

        if (!is_array($fields) || ($fields !== [] && array_is_list($fields))) {
            throw new SeedException("Block {$position}’s “fields” must be a map of field handle to value.");
        }

        return new self($block['type'], $fields, $position);
    }

    /**
     * @param mixed[] $blocks
     * @return self[]
     * @throws SeedException
     */
    public static function listFromArray(array $blocks): array
    {
        return array_map(
            static fn(mixed $block, int $index): self => self::fromArray($block, $index + 1),
            $blocks,
            array_keys($blocks),
        );
    }
}
