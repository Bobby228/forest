<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Tag\StoreRequest;
use App\Http\Requests\Tag\UpdateRequest;
use App\Http\Resources\Tag\TagResource;
use App\Models\Tag;
use App\Services\TagService;

class TagController extends Controller
{
    public function index()
    {
        return TagResource::collection(Tag::all())->resolve();
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        $tag = TagService::create($data);
        return TagResource::make($tag)->resolve();
    }

    public function show(Tag $tag)
    {
        return TagResource::make($tag)->resolve();
    }

    public function update(UpdateRequest $request, Tag $tag)
    {
        $data = $request->validated();
        $tag = TagService::update($data, $tag);
        return TagResource::make($tag)->resolve();
    }

    public function destroy(Tag $tag)
    {
        TagService::delete($tag);
        return response()->json('Tag deleted successfully');
    }
}
