<?php

namespace App\Http\Controllers;

use App\Http\Requests\SiswaRegisterRequest;
use App\Models\Siswa;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class SiswaController extends Controller
{

    public function register(SiswaRegisterRequest $request)
    {
        $siswa = Siswa::create($request->validated());
        if (!Auth::guard('siswa')->attempt(['nis' => $siswa->nis, 'password' => $request->input('password')])) {
            return redirect()->back()->withInput($request->only('nis', 'name'));
        }
        return redirect()->intended(route('homepage'));
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
    public function login(SiswaRegisterRequest $request)
    {
        $credentials = $request->getCredentials();

        if (!Auth::validate($credentials)) :
            return redirect()->to('login')
                ->withErrors(trans('auth.failed'));
        endif;

        $user = Auth::getProvider()->retrieveByCredentials($credentials);

        Auth::login($user);

        return $this->authenticated($request, $user);
    }

    /**
     * Handle response after user authenticated
     * 
     * @param SiswaRegisterRequest $request
     * @param Auth $user
     * 
     * @return \Illuminate\Http\Response
     */
    protected function authenticated(SiswaRegisterRequest $request, $user)
    {
        return redirect()->intended();
    }

    public function perform()
    {
        Session::flush();
        Auth::logout();
        return redirect('login');
    }
}
