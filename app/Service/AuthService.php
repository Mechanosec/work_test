<?php


namespace App\Service;


use App\Http\Requests\AuthRequest;
use App\Models\Admin;

class AuthService
{
    public function login(AuthRequest $request)
    {
        $admin = Admin::where('login', $request->get('login'))->where('password', md5($request->get('password')))->first();
        if (!is_null($admin)) {
            return $admin->auth_token;
        }

        return false;
    }
}
