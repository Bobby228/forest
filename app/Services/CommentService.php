<?php

namespace App\Services;

use App\Models\Comment;

class CommentService
{
    /**
     * Create a new class instance.
     */
    public static function create(array $data): Comment
    {
        return Comment::create($data);
    }

    public static function update(array $data, Comment $comment): Comment
    {
        $comment->update($data);
        return $comment;
    }

    public static function delete(Comment $comment): void
    {
        $comment->delete();
    }
}
