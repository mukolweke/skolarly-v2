<?php

namespace App\Services\Auth;

use App\Repositories\Auth\UserRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\JsonResponse;

class LoginService
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function login(array $credentials, $remember = false): array
    {
        if (Auth::attempt($credentials, $remember)) {
            return ['status' => true];
        }

        return ['status' => false, 'errors' => ['password' => ['Invalid credentials provided']]];
    }

    public function user()
    {
        // Check if the user is authenticated
        if (!Auth::check()) {
            return ['status' => false];
        }

        $email = Auth::user()->email;

        // Find the user by email using the repository
        $user = $this->userRepository->findByEmail($email);

        return ['status' => true, 'user' => $user];
    }
}
