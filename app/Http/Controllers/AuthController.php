<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\UserRegisterRequest;
use App\Models\User;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

/**
 * @group Auth
 *
 * APIs for auth
 */
class AuthController extends Controller
{
    use ApiResponser;

    /**
     * Login
     *
     * @response {"token": "token"}
     */
    public function login(Request $request)
    {
        $attr = $request->validate([
            'email' => 'required|string|email|',
            'password' => 'required|string|min:6'
        ]);

        if (!Auth::attempt($attr)) {
            return $this->error('Credentials not match', 401);
        }

        return $this->success([
            'token' => auth()->user()->createToken('API Token')->plainTextToken
        ]);
    }

    /**
     * Logout
     *
     * @response {"message": "Tokens Revoked"}
     */
    public function logout()
    {
        auth()->user()->tokens()->delete();

        return [
            'message' => 'Tokens Revoked'
        ];
    }

    /**
     * Register
     *
     * Register new user account
     *
     * @param UserRegisterRequest $request
     * @return {"message":"User created.","data":{"user_id":1,"api_token":"1|lRB0oiF41gHO7h0VVJVhWtvSQEUiQsiBm7SH7ktd"}}
     */
    public function register(UserRegisterRequest $request)
    {

        $user = User::create([
            'name' => $request->name,
            'email' => strtolower($request->email),
            'password' => Hash::make($request->password)
        ]);

        return response([
            'message' => 'User created.',
            'data' => ['user_id' => $user->id, 'api_token' => $user->createToken('API Token')->plainTextToken]
        ],
        Response::HTTP_CREATED);
    }
}
