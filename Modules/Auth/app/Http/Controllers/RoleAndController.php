<?php

namespace Modules\Auth\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Auth\Services\RoleAndPermissionService;

class RoleAndController extends Controller
{

    private $permisAndRoleService;
    public function __construct(RoleAndPermissionService $permisAndRoleService)
    {
        $this->permisAndRoleService = $permisAndRoleService;
    }
    /**
     * Display a listing of the resource.
     */
    public function getRole($id)
    {
        //
        $role = $this->permisAndRoleService->getRole($id);
        return response()->json($role, 201);
    }
    public function getRoles()
    {
        //
        $roles = $this->permisAndRoleService->getAllRole();
        return response()->json($roles, 201);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function createRole(Request $request)
    {
        //

        return response()->json([]);
    }

    /**
     * Show the specified resource.
     */
    public function getPermission($id)
    {
        //

        return response()->json([]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateRoles(Request $request, $id)
    {
        //

        return response()->json([]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function deleteRole($id)
    {
        //

        return response()->json([]);
    }
}
