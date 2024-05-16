<?php


namespace App\Repositories;

use App\Http\Requests\Auth\AuthRequest;
use App\Http\Requests\Setting\SettingRequest;
use App\Interfaces\AuthInterfaces;
use App\Models\User;
use App\Traits\HttpResponseTraits;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthRepositories implements AuthInterfaces
{
    protected $userModel;
    use HttpResponseTraits;

    public function __construct(User $userModel)
    {
        $this->userModel = $userModel;
    }

    public function login(Request $request)
    {
        try {

            $validation = Validator::make($request->all(), [
                'username' => 'required',
                'password' => 'required'
            ]);

            if ($validation->fails()) {
                return response()->json([
                    'code' => 422,
                    'message' => 'Check your validation',
                    'errors' => $validation->errors()
                ]);
            }

            if (!Auth::attempt($request->only('username', 'password'))) {
                return response()->json([
                    'message' => 'Unauthorization'
                ]);
            } else {
                $user = $this->userModel->where('username', $request['username'])->firstOrFail();
                $token = $user->createToken('auth_token')->plainTextToken;

                return response()->json([
                    'message' => 'Success login',
                    'user' => $user,
                    'token' => $token,
                    'token_type' => 'Bearer'
                ]);
            }
        } catch (\Throwable $th) {
            return $this->error($th);
        }
    }

    public function logout(Request $request)
    {
        try {
            $request->user('web')->tokens()->delete();
            Auth::guard('web')->logout();

            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return $this->success();
        } catch (\Throwable $th) {
            return $this->error($th);
        }
    }
}
