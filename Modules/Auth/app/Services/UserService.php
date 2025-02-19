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
        return $user;
    }


    public function saveUser($data)
    {
        $data['password'] = bcrypt($data['password']);
        return $this->create($data);
    }
    public function updateUser($id, $data)
    {
        $user = $this->getUser($id);
        if ($user->update($data)) {
            return $user;
        };
    }
    public function deleteUser($id)
    {
        $user = $this->getUser($id);
        if ($user->delete()); {
            return true;
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
