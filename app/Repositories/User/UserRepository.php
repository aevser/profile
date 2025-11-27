<?php

namespace App\Repositories\User;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserRepository
{
    private const string RELATIONS = 'gender';

    public function __construct(private User $user){}

    public function getProfile(int $user_id): ?User
    {
        return $this->user->query()->with([self::RELATIONS])->where('id', $user_id)->first();
    }

    public function create(array $data): User
    {
        $data['password'] = Hash::make($data['password']);

        $user = $this->user->query()->create($data);

        return $user->fresh([self::RELATIONS]);
    }
}
