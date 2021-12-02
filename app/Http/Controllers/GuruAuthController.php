<?php

namespace App\Http\Controllers;

// model
use App\Models\Guru;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class GuruAuthController extends Controller
{
    public function showRegister()
    {
        return view("auth.guru.register");
    }

    /**
     * Handle account registration request
     * 
     * @param RegisterRequest $request
     * 
     * @return \Illuminate\Http\Response
     */
    public function register(RegisterRequest $request)
    {
        $guru = Guru::create($request->validated());
        Auth::login($guru);
        return redirect('/')->with('success', "Account successfully registered.");
    }

    public function showLogin()
    {
        return view("auth.guru.login");
    }


    /**
     * Handle response after guru authenticated
     * 
     * @param Request $request
     * @param Auth $guru
     * 
     * @return \Illuminate\Http\Response
     */
    public function login(LoginRequest $request)
    {
        $credentials = $request->getCredentials();
        if (!Auth::validate($credentials)) :
            return redirect()->to('login')
                ->withErrors(trans('auth.failed'));
        endif;
        $guru = Auth::getProvider()->retrieveByCredentials($credentials);
        Auth::login($guru);
        return $this->authenticated($request, $guru);
    }


    /**
     * Handle response after guru authenticated
     * 
     * @param Request $request
     * @param Auth $guru
     * 
     * @return \Illuminate\Http\Response
     */
    protected function authenticated(Request $request, $guru)
    {
        return redirect()->intended();
    }


    /**
     * Log out account user.
     *
     * @return \Illuminate\Routing\Redirector
     */

    public function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect('login');
    }
}
