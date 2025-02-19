<?php

namespace Modules\Auth\Services;

use App\Exceptions\RecordNotFoundException;
use App\Service\BaseService;
use Modules\Auth\Models\User;

// use Modules\Auth\Models\User;

class UserService extends BaseService
{
    public function __construct()
    {
        parent::__construct(new User());
    }
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
        $user = $this->create($data);
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
        $users = $this->getAll();
        return response()->json($users);
    }
    public function getAllUsersWithPagination() {}
    public function getUser($id)
    {
        $user = $this->find($id);
        if (empty($user)) {
            return throw new RecordNotFoundException();
        }
        return $user;
    }
}
