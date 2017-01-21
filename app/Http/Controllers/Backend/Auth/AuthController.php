<?php

namespace App\Http\Controllers\Backend\Auth;

use App\Database\Models\Donor;
use App\Database\Repositories\DonorsRepositoryInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\LoginDonorRequest;
use App\Http\Requests\Frontend\RegisterNewDonorRequest;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Foundation\Auth\ThrottlesLogins;

class AuthController extends Controller
{
    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    protected $redirectPath = '/dashboard';

    public function __construct()
    {
        $this->middleware($this->guestMiddleware(), ['except' => 'getLogout']);
    }

    public function getLogin()
    {
        if (auth()->check()) {
            return redirect()->intended('dashboard');
        }
        return view('backend.auth.login');
    }

    public function postLogin(LoginDonorRequest $request)
    {
        $credentials = [
            'username' => $request->get('username'),
            'password' => $request->get('password')
        ];

        if (auth()->attempt($credentials, $request->has('remember'))) {
            return redirect()->intended('dashboard');
        }

        return redirect()->back();
    }

    public function getRegister()
    {
        if (auth()->check()) {
            return redirect()->intended('dashboard');
        }

        if (settings('site_registrations') != 1) {
            return redirect()->route('auth.login');
        }
        return view('backend.auth.register');
    }

    public function postRegister(RegisterNewDonorRequest $request)
    {
        $user = Donor::create($request->except(['password_confirmation', 'g-recaptcha-response']));

        auth()->login($user);

        return redirect()->route('auth.login');
    }

    public function getLogout()
    {
        auth()->logout();

        return redirect()->route('auth.login');
    }
}
