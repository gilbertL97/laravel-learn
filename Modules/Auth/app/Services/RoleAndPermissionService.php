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
    public function handle()
    {
        //
    }

    public function getAllRolesAndPermisionWithoutPagination()
    {
        $roles = $this->getRelation('permissions');
        $permissions = Permission::all();
        return response()->json([
            'roles' => $roles,
            'permissions' => $permissions,
        ]);
    }
    public function getRole($id)
    {
        $role = $this->find($id);
        if (empty($role)) return throw new RecordNotFoundException();
        return response()->json($role);
    }
}
