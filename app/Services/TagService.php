<?php

namespace App\Services;

use App\Models\Tag;

class TagService
{
    /**
     * Create a new class instance.
     */
    public static function create(array $data): Tag
    {
        return Tag::create($data);
    }

    public static function update(array $data, Tag $tag): Tag
    {
        $tag->update($data);
        return $tag;
    }

    public static function delete(Tag $tag): void
    {
        $tag->delete();
    }
}
