<?php

namespace Modules\Auth\Services;

use App\Exceptions\RecordNotFoundException;
use Modules\Auth\Models\User;

// use Modules\Auth\Models\User;

class UserService
{
    public function handle()
    {
        //
    }
    public function getOneUser($id)
    {
        $user = $this->getUser($id);
        return response()->json($user);
    }


    public function saveUser($data)
    {
        $data['password'] = bcrypt($data['password']);
        $user = User::create($data);
        return  response()->json($user, 201);
    }
    public function updateUser($id, $data)
    {
        $user = $this->getUser($id);
        if ($user->update($data)) {
            return response()->json($user, 200);
        };
    }
    public function deleteUser($id)
    {
        $user = $this->getUser($id);
        if ($user->delete()); {
            return response()->json([], 200);
        }
    }
    public function getAllUsers()
    {
        $users = User::all();
        return response()->json($users);
    }
    public function getAllUsersWithPagination() {}
    public function getUser($id)
    {
        $user = User::find($id);
        if (empty($user)) {
            return throw new RecordNotFoundException();
        }
        return $user;
    }
}
