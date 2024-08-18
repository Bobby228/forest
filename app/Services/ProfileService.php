<?php

namespace App\Services;

use App\Models\Profile;

class ProfileService
{
    /**
     * Create a new class instance.
     */
    public static function create(array $data): Profile
    {
        return Profile::create($data);
    }

    public static function update(array $data, Profile $profile): Profile
    {
        $profile->update($data);
        return $profile;
    }

    public static function delete(Profile $profile): void
    {
        $profile->delete();
    }
}
