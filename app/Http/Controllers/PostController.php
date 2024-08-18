<?php

namespace App\Http\Controllers;

use App\Http\Resources\Post\PostResource;
use App\Models\Post;
use App\Services\PostService;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        return PostResource::collection(Post::all())->resolve();
    }

    public function store()
    {
        $data = [
            'title' => 'Post 3',
            'description' => 'Post 3 description',
            'content' => 'Content 3',
        ];
        $post = PostService::create($data);
        return $post;
    }

    public function show(Post $post)
    {
        return PostResource::make($post)->resolve();
    }

    public function update(Post $post)
    {
        $data = ['title' => 'updated title 3'];
        $post = PostService::update($data, $post);
        return PostResource::make($post)->resolve();
    }

    public function destroy(Post $post)
    {
        PostService::delete($post);
        return response()->json('Post deleted successfully');
    }
}
