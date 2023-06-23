<?php

namespace App\Services;

use App\Models\User;

class AuthService
{
    public function token(User $user, $data)
    {
        return $user->createToken($data)->plainTextToken;
    }
}
