<?php

namespace Modules\Auth\Services;

use App\Exceptions\RecordNotFoundException;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleService
{
    public function handle()
    {
        //
    }

    public function getAllRolesAndPermisionWithoutPagination()
    {
        $roles = Role::with('permissions')->get();
        $permissions = Permission::all();
        return response()->json([
            'roles' => $roles,
            'permissions' => $permissions,
        ]);
    }
    public function getRole($id)
    {
        $role = Role::findById($id);
        if (empty($role)) return throw new RecordNotFoundException();
        return $role;
    }
}
