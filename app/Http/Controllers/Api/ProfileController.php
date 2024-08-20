<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Repositories\ProfileRepository;
use App\Http\Requests\ProfileRequest;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    protected $repository;

    public function __construct(ProfileRepository $repository)
    {
        $this->repository = $repository;
    }

    public function contactDetails()
    {
        return $this->repository->contactDetails(['phone', 'email', 'location']);
    }

    public function updateContact(ProfileRequest $request)
    {
        return $this->repository->updateContact($request->all());
    }
}
