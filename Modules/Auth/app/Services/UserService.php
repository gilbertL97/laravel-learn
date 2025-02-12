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
    protected function makePagination($query, string|array $pagination)
    {
        // if (is_string($pagination))
        $pagination = json_decode($pagination, true);
        $currentPage = isset($pagination["page"]) ? $pagination["page"] : 1;
        $pageSize = isset($pagination["pageSize"]) ? $pagination["pageSize"] : $this->model->perPage;
        return $query->paginate($pageSize, ['*'], 'page', $currentPage);
    }
}
