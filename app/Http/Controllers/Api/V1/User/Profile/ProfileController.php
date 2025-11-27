<?php

namespace App\Http\Controllers\Api\V1\User\Profile;

use App\Http\Controllers\Controller;
use App\Repositories\User\UserRepository;
use Illuminate\Http\JsonResponse;

class ProfileController extends Controller
{
    public function __construct(private UserRepository $userRepository){}

    public function profile(int $user_id): JsonResponse
    {
        $profile = $this->userRepository->getProfile(user_id: $user_id);

        if (!$profile) { return response()->json(['success' => false, 'error' => ['message' => __('responses.profile.not_found')], 'code' => JsonResponse::HTTP_NOT_FOUND]); }

        return response()->json(['success' => true, 'user' => $profile, 'code' => JsonResponse::HTTP_OK]);
    }
}
