<?php

namespace Modules\Auth\Services;

use Modules\Auth\Models\User;

// use Modules\Auth\Models\User;

class UserService
{
    public function handle()
    {
        //
    }

    public function saveUser($data)
    {
        $data['password'] = bcrypt($data['password']);
        return User::create($data);
    }
}
