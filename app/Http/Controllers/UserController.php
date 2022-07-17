<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use Laravel\Passport\Token;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UserCreateRequest;
use Illuminate\Auth\Events\Validated;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function login(Request $request)
    {
        $input = $request->only(['email', 'password']);

        // authentication attempt
        if (auth()->attempt($input)) {
            $token = auth()->user()->createToken('passport_token')->accessToken;

            return response()->json([
                'success' => true,
                'message' => 'User login succesfully, Use token to authenticate.',
                'token' => $token
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'User authentication failed.'
            ], 401);
        }
    }

    public function logout()
    {
        try {
            $user = Auth::user();
            Token::where('user_id', $user->id)
                ->update(['revoked' => true]);
            return response()->json([
                'message' => 'Logout realizado com sucesso'
            ]);
        } catch (\Exception $exception) {
            return response([
                'message' => $exception->getMessage()
            ], 400);
        }
    }

    public function user()
    {
        try {
            $user = Auth::user();
            return $user;
        } catch (\Exception $exception) {
            return response([
                'message' => 'Houve um erro ao recuperar os dados do usuário autenticado',
                'description' => $exception->getMessage()
            ], 400);
        }
    }

    public function register(UserCreateRequest $request)
    {
        $request->all();

        try {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'last_name' => $request->last_name,
                'birthdate' => $request->birthdate,
                'password' => Hash::make($request->password)
            ]);

            return $user;
        } catch (\Exception $exception) {
            return response([
                'message' => 'Houve um erro no cadastro',
                'description' => $exception->getMessage()
            ], 400);
        }
    }
}
