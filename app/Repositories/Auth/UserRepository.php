<?php

namespace App\Repositories\Auth;

use App\Models\User;

class UserRepository
{
    public function findByEmail(string $email): ?User
    {
        return User::where('email', $email)->first();
    }
}
