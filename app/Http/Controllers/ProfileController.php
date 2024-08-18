<?php

namespace App\Http\Controllers;

use App\Http\Resources\Profile\ProfileResource;
use App\Models\Profile;
use App\Services\ProfileService;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        return ProfileResource::collection(Profile::all())->resolve();
    }

    public function store()
    {
        $data = [
            'birthed_at' => '2001-10-22',
            'avatar_path' => 'salam'
        ];
        $profile = ProfileService::create($data);
        return ProfileResource::make($profile)->resolve();
    }

    public function show(Profile $profile)
    {
        return ProfileResource::make($profile)->resolve();
    }

    public function update(Profile $profile)
    {
        $data = ['birthed_at' => '2023-04-13'];
        $profile = ProfileService::update($data, $profile);
        return ProfileResource::make($profile)->resolve();
    }

    public function destroy(Profile $profile)
    {
        ProfileService::delete($profile);
        return response()->json('Profile deleted successfully');
    }
}
