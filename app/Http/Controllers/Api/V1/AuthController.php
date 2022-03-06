<?php

namespace App\Http\Controllers\Api\V1;

use App\Enums\UserStatus;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\UserRegister;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Response;


class AuthController extends Controller
{
    public function register(UserRegister $request)
    {
        $form = $request->validated();

        $user = User::where('email', $form['email'])->first();

        if(!empty($user)) return Response::unprocessable('User already exist');

        $user = User::create($form);
        $token = $user->createToken('web0');
        return Response::authenticated($token->plainTextToken, $user);
    }

    public function login(LoginRequest $request)
    {
        $form = $request->validated();

        $user = User::where('email', $form['email'])->first();
        if(!($user->status == UserStatus::actv())) return Response::unprocessable('Your account is not active.');

        if (!empty($user) && Hash::check($form['password'], $user->password)) {
            $user->tokens()->delete();
            $token = $user->createToken('web0');
            return Response::authenticated($token->plainTextToken, new UserResource($user));
        }
        return Response::unauthenticated();
    }

    public function logout()
    {
        auth()->user()->tokens()->delete();
        return Response::success("User logged out successfully");
    }

    public function user()
    {
        return Response::success("User data found", new UserResource(auth()->user()));
    }
}
