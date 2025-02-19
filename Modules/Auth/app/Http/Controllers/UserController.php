<?php

namespace Modules\Auth\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Auth\Http\Requests\CreateUserFormRequest;
use Modules\Auth\Http\Requests\UpdateUserFormRequest;
use Modules\Auth\Services\AuthService;
use Modules\Auth\Services\UserService;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    private $authService;
    private $userService;
    public function __construct(AuthService $authService, UserService $userService)
    {
        $this->userService = $userService;
        $this->authService = $authService;
    }
    public function index()
    {
        //
        $users = $this->userService->getAllUsers();
        return $users;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateUserFormRequest $request)
    {
        $credentials = $request->validated();
        $user = $this->userService->saveUser($credentials);
        return response()->json($user, 201);
    }

    /**
     * Show the specified resource.
     */
    public function show($id)
    {
        $user = $this->userService->getOneUser($id);
        return response()->json($user, 201);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserFormRequest $request, $id)
    {
        $data = $request->validated();
        $user = $this->userService->updateUser($id, $data);
        return response()->json($user, 201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $user = $this->userService->deleteUser($id);
        return response()->json($user, 201);;
    }
}
