<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Profile\StoreRequest;
use App\Http\Requests\Profile\UpdateRequest;
use App\Http\Resources\Profile\ProfileResource;
use App\Models\Profile;
use App\Services\ProfileService;

class ProfileController extends Controller
{
    public function index()
    {
        return ProfileResource::collection(Profile::all())->resolve();
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        $profile = ProfileService::create($data);
        return ProfileResource::make($profile)->resolve();
    }

    public function show(Profile $profile)
    {
        return ProfileResource::make($profile)->resolve();
    }

    public function update(UpdateRequest $request, Profile $profile)
    {
        $data = $request->validated();
        $profile = ProfileService::update($data, $profile);
        return ProfileResource::make($profile)->resolve();
    }

    public function destroy(Profile $profile)
    {
        ProfileService::delete($profile);
        return response()->json('Profile deleted successfully');
    }
}
