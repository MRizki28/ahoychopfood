<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\AuthRequest;
use App\Http\Requests\Setting\SettingRequest;
use App\Repositories\AuthRepositories;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    protected $authRepositories;

    public function __construct(AuthRepositories $authRepositories)
    {
        $this->authRepositories = $authRepositories;
    }

    public function login(Request $request)
    {
        return $this->authRepositories->login($request);
    }

    public function logout(Request $request)
    {
        return $this->authRepositories->logout($request);
    }
}
