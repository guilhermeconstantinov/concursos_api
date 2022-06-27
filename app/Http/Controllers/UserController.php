<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use Laravel\Passport\Token;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UserCreateRequest;
use Illuminate\Contracts\Validation\Validator;

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

    public function index()
    {
        $user = Auth::user();
        $check = Auth::check();
        return [$user, $check];
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        return $user;
    }
}
