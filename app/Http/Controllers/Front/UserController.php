<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class UserController extends Controller
{
    public function about()
    {
        return view('front.about');
    }

    public function contact()
    {
        return view('front.contact');
    }

    public function login()
    {
        return view('front.login');
    }

    public function register()
    {
        return view('front.register');
    }

    public function doRegister(Request $request)
    {
        $user = [
            'username' => $request->username,
            'password' => $request->password,
            'nickname' => $request->nickname,
            'email' => $request->email,
            'tel' => $request->tel,
        ];

        if (Cache::get($request->username)) {
            return '用户已存在';
        }

        Cache::put($request->username, $user, 30);
        return redirect('login');
    }

    public function doLogin(Request $request)
    {
        $user = Cache::get($request->username);

        if ($request->username == $user['username'] && $request->password == $user['password']) {
            session(['user' => $user]);
            return redirect('about');
        }

        return '用户名或密码错误';
    }

    public function logout()
    {
        session()->flush();
        return '用户已退出';
    }
}
