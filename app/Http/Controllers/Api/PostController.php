<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\StoreRequest;
use App\Http\Requests\Post\UpdateRequest;
use App\Http\Resources\Post\PostResource;
use App\Models\Post;
use App\Services\PostService;

class PostController extends Controller
{
    public function index()
    {
        return PostResource::collection(Post::all())->resolve();
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        $post = PostService::create($data);
        return $post;
    }

    public function show(Post $post)
    {
        return PostResource::make($post)->resolve();
    }

    public function update(UpdateRequest $request ,Post $post)
    {
        $data = $request->validated();
        $post = PostService::update($data, $post);
        return PostResource::make($post)->resolve();
    }

    public function destroy(Post $post)
    {
        PostService::delete($post);
        return response()->json('Post deleted successfully');
    }
}
