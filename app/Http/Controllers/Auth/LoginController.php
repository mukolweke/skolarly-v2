<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Services\Auth\LoginService;
use Illuminate\Http\JsonResponse;

class LoginController extends Controller
{
    protected $loginService;

    public function __construct(LoginService $loginService)
    {
        $this->loginService = $loginService;
    }

    public function login(LoginRequest $request): JsonResponse
    {
        $credentials = $request->only('email', 'password');
        $remember = $request->input('remember', false);

        $result = $this->loginService->login($credentials, $remember);

        if ($result['status']) {
            return response()->json(['message' => 'Login successful'], 200);
        }

        return response()->json(['errors' => $result['errors']], 422);
    }

    public function user()
    {
        $result = $this->loginService->user();
dd($result);
        if ($result['status']) {
            return response()->json(['message' => 'Login successful'], 200);
        }

        return response()->json(['errors' => $result['errors']], 422);
    }
}
