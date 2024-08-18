<?php

namespace App\Services;

use App\Models\Post;

class PostService
{
    /**
     * Create a new class instance.
     */
    public static function create(array $data): Post
    {
        return Post::create($data);
    }

    public static function update(array $data, Post $post): Post
    {
        $post->update($data);
        return $post;
    }

    public static function delete(Post $post): void
    {
        $post->delete();
    }
}
