<?php

namespace Modules\Auth\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Auth\Services\AuthService;
use Modules\Auth\Services\UserService;

class AuthController extends Controller
{
    private $authService;
    private $userService;

    //     public function __construct()
    //     {
    //       $this->userService = new \Modules\Auth\Services\UserService();
    //        $this->authService = new $this->authService()
    // ;
    //
    //     }
    public function __construct(AuthService $authService, UserService $userService)
    {
        $this->userService = $userService;
        $this->authService = $authService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

        return response()->json($this->userService->saveUser());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        return response()->json([]);
    }

    /**
     * Show the specified resource.
     */
    public function show($id)
    {
        //

        return response()->json([]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //

        return response()->json([]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //

        return response()->json([]);
    }
}
