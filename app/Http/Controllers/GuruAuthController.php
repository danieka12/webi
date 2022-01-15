<?php

namespace App\Http\Controllers;

// model
use App\Models\Guru;
use App\Models\Penulis;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use Illuminate\Foundation\Http\FormRequest;
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
        if (!Auth::guard('guru')->attempt(['email' => $guru->email, 'password' => $request->input('password')])) {
            return redirect()->back()->withInput($request->only('email', 'name'));
        }
        
        // create penulis for teachers
        $penulis = new Penulis();
        $penulis['guru_id'] = $guru->id;
        $penulis->save();
        
        return redirect()->route("guru.dashboard")->with('success', "Account successfully registered.");
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
        if (!Auth::guard('guru')->attempt($credentials)) {
            return redirect()->back()->withInput($request->only('email'));
        }
        return $this->authenticated($request);
    }


    /**
     * Handle response after guru authenticated
     * 
     * @param Request $request
     * @param Auth $guru
     * 
     * @return \Illuminate\Http\Response
     */
    protected function authenticated(FormRequest $request, $user = "")
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
