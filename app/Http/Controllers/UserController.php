<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Repositories\UserRepository;
use Illuminate\Http\Resources\Json\JsonResource;

class UserController extends Controller
{
    public function __construct(protected UserRepository $userRepository) {}

    public function index(): JsonResource
    {
        $user = auth()->user();
        return UserResource::make($user);
    }
}
