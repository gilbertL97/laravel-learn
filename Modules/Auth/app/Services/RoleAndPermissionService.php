<?php

namespace Modules\Auth\Services;

use App\Exceptions\RecordNotFoundException;
use App\Service\BaseService;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleAndPermissionService extends BaseService
{
    public function __construct()
    {
        parent::__construct(new Role());
    }

    public function getAllRolesAndPermisionWithoutPagination()
    {
        $roles = $this->getRelation('permissions');
        $permissions = $this->getAll();
        return [
            'roles' => $roles,
            'permissions' => $permissions
        ];
    }
    public function getRole($id)
    {
        $role = $this->find($id);
        if (empty($role)) return throw new RecordNotFoundException();
        return $role;
    }
    public function getAllRole()
    {
        $role = $this->getAll();
        return $role;
    }
    public function getPermission($id)
    {
        $permissions = Permission::find($id);
        if (empty($permissions)) return throw new RecordNotFoundException();
        return $permissions;
    }
    public function getAllPermission()
    {
        $permissions = Permission::all();
        return $permissions;
    }
}
