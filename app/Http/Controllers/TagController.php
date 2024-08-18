<?php

namespace App\Http\Controllers;

use App\Http\Resources\Tag\TagResource;
use App\Models\Tag;
use App\Services\TagService;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index()
    {
        return TagResource::collection(Tag::all())->resolve();
    }

    public function store()
    {
        $data = [
            'title' => 'tag 1'
        ];
        $tag = TagService::create($data);
        return TagResource::make($tag)->resolve();
    }

    public function show(Tag $tag)
    {
        return TagResource::make($tag)->resolve();
    }

    public function update(Tag $tag)
    {
        $data = ['title' => 'updated title 1'];
        $tag = TagService::update($data, $tag);
        return TagResource::make($tag)->resolve();
    }

    public function destroy(Tag $tag)
    {
        TagService::delete($tag);
        return response()->json('Tag deleted successfully');
    }
}
