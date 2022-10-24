<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use App\Services\User\UserCreateService;
use Exception;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    public function register(RegisterRequest $request)
    {
        DB::beginTransaction();

        try {
            $user = new User();
            $isSave = (new UserCreateService($user, $request))->run();

            if ($isSave) {
                $token = $user->createToken('UserPersonalToken')->accessToken;
                DB::commit();

                return response()->json([
                    'token' => $token
                ], 200);
            }

            throw new Exception('Не удалось создать пользователя');
        } catch (Exception $exception) {
            DB::rollBack();
            throw $exception;
        }
    }

    public function login(LoginRequest $request)
    {
        if (auth()->attempt($request->only(['username', 'password']))) {
            $user = auth()->user();
            $token = $user->createToken('UserPersonalToken')->accessToken;

            return response()->json([
                'token' => $token,
            ], 200);
        } else {
            return response()->json(['error' => 'Unauthorised']);
        }
    }
}
