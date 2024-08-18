<?php

namespace App\Http\Controllers;

use App\Http\Resources\Comment\CommentResource;
use App\Models\Comment;
use App\Services\CommentService;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index()
    {
        return CommentResource::collection(Comment::all())->resolve();
    }

    public function store()
    {
        $data = [
            'user' => 'Ivan',
            'content' => 'Content 3',
            'post' => '3',
            'parent' => 'idk'
        ];
        $comment = CommentService::create($data);
        return CommentResource::make($comment)->resolve();
    }

    public function show(Comment $comment)
    {
        return CommentResource::make($comment)->resolve();
    }

    public function update(Comment $comment)
    {
        $data = ['content' => 'updated content 1'];
        $comment = CommentService::update($data, $comment);
        return CommentResource::make($comment)->resolve();
    }

    public function destroy(Comment $comment)
    {
        CommentService::delete($comment);
        return response()->json('Comment deleted successfully');
    }
}
