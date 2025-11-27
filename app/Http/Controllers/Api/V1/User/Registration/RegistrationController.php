<?php

namespace App\Http\Controllers\Api\V1\User\Registration;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\User\Registration\CreateUserRequest;
use App\Repositories\User\UserRepository;
use Illuminate\Http\JsonResponse;

class RegistrationController extends Controller
{
    public function __construct(private UserRepository $userRepository){}

    public function registration(CreateUserRequest $request): JsonResponse
    {
        $user = $this->userRepository->create(data: $request->validated());

        return response()->json(['success' => true, 'message' => __('responses.registration.success'), 'user' => $user, 'code' => JsonResponse::HTTP_CREATED]);
    }
}
