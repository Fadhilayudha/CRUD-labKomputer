<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    // public function __construct()
    // {
    //     $this->middleware('guest')->except('logout');
    // }

    public function username()
    {
        return 'username';
    }

    protected function sendLoginResponse(User $user, Request $request)
    {
        $request->session()->regenerate();

        Auth::login($user, $request->has('remember'));
        return redirect()->route('lab-komputer.index');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'username' => 'required|exists:users,username|min:2|max:30',
            'password' => 'required|min:6',
        ],[
            'username.exists' => 'username tidak tersedia',
            'username.required' => 'username belum di isi',
            'password.required' => 'password belum di isi',
        ]);

        $login = $request->input('username');

        $user = User::where('username', $login)->first();

        if (Hash::check($request->input('password'), $user->password)) {
            return $this->sendLoginResponse($user, $request);
        }
       
        return $this->sendFailedLoginResponse($request);
    }
}

