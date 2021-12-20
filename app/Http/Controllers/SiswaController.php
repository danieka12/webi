<?php

namespace App\Http\Controllers;

use App\Http\Requests\SiswaLoginRequest;
use App\Http\Requests\SiswaRegisterRequest;
use App\Models\Siswa;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class SiswaController extends Controller
{

    public function register(SiswaRegisterRequest $request)
    {
        $siswa = Siswa::create($request->validated());
        if (!Auth::guard('siswa')->attempt(['nis' => $siswa->nis, 'password' => $request->input('password')])) {
            return redirect()->back()->withInput($request->only('nis', 'name'));
        }
        return $this->authenticated($request, $siswa);
    }

    public function username()
    {
        return 'nis';
    }

    /**
     * Handle account login request
     * 
     * @param SiswaRegisterRequest $request
     * 
     * @return \Illuminate\Http\Response
     */
    public function login(SiswaLoginRequest $request)
    {
        $credentials = $request->only('nis', 'password');
        if (!Auth::guard('siswa')->attempt($credentials)) {
            return redirect()->back()->withInput($request->only('nis', 'name'));
        }
        return $this->authenticated($request);
    }

    /**
     * Handle response after user authenticated
     * 
     * @param SiswaRegisterRequest $request
     * @param Auth $user
     * 
     * @return \Illuminate\Http\Response
     */
    protected function authenticated(FormRequest $request, $user = "")
    {
        return redirect()->intended(route('homepage'));
    }

    public function perform()
    {
        Session::flush();
        Auth::guard('siswa')->logout();
        return redirect()->to(route('homepage'));
    }
}
