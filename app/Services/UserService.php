<?php

namespace App\Services;

use App\Models\User;

class UserService
{
    /**
     * @param $id
     * @return mixed
     */
    public function findById($id)
    {
        return User::findOrFail($id);
    }
}
