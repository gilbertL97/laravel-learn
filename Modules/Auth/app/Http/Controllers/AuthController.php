<?php

namespace Modules\Auth\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\Auth\Http\Requests\LoginUserFormRequest;
use Illuminate\Http\Request;
use Modules\Auth\Services\AuthService;




class AuthController extends Controller
{
    private $authService;

    //     public function __construct()
    //     {
    //       $this->userService = new \Modules\Auth\Services\UserService();
    //        $this->authService = new $this->authService()
    // ;
    //
    //     }
    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

        //return response()->json($this->userService->saveUser());
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

    public function login(LoginUserFormRequest $request)
    {
        //return response()->json($request->get('name'));
        $credentials = $request->validated();

        $token = $this->authService->generateToken($credentials);

        if (!$token) {
            return response()->json([
                'status' => 401,
                'message' => 'Credenciales incorrectas'
            ], 401);
        }

        return response()->json($this->authService->handleTokenResponse($token));
    }
}
