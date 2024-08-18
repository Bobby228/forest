<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Comment\StoreRequest;
use App\Http\Requests\Comment\UpdateRequest;
use App\Http\Resources\Comment\CommentResource;
use App\Models\Comment;
use App\Services\CommentService;

class CommentController extends Controller
{
    public function index()
    {
        return CommentResource::collection(Comment::all())->resolve();
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        $comment = CommentService::create($data);
        return CommentResource::make($comment)->resolve();
    }

    public function show(Comment $comment)
    {
        return CommentResource::make($comment)->resolve();
    }

    public function update(UpdateRequest $request, Comment $comment)
    {
        $data = $request->validated();
        $comment = CommentService::update($data, $comment);
        return CommentResource::make($comment)->resolve();
    }

    public function destroy(Comment $comment)
    {
        CommentService::delete($comment);
        return response()->json('Comment deleted successfully');
    }
}
