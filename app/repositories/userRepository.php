<?php 

namespace App\Repositories;

use App\User;

class UserRepository {

    /**
     * @param $userData
     * @return static
     */
    public function findByUsernameOrCreate($userData)
    {
        return User::firstOrCreate([
            'name' => $userData->name,
            'email'    => $userData->email,
            'avatar'   => $userData->avatar
        ]);
    }
} 