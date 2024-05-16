<?php


namespace App\Interfaces;

use Illuminate\Http\Request;

interface AuthInterfaces {
    public function login(Request $request);
    public function logout(Request $request);
}