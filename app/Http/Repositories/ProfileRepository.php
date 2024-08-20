<?php

namespace App\Http\Repositories;

use App\Models\Setting;

class ProfileRepository
{
    public function contactDetails($keys)
    {
        $settings = Setting::whereIn('key', $keys)->get();

        return response()->json($settings, 200);
    }

    public function updateContact($data)
    {
        foreach ($data as $key => $value) {
            Setting::updateOrCreate(
                ['key' => $key],
                ['value' => $value]
            );
        }

        return response()->json('Contact Details Updated', 201);
    }
}
