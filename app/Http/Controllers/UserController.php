<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use App\Models\auth\User;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Auth\SessionGuard;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       if ($user = Auth::user()) {
        switch ($user->level) {
            case '1':
                return redirect()->intended('/');
                break;

            case '2':
                return redirect()->intended('catatan');
                break;
        }
       }
       return view('auth.login',
       [
           "title" => "Login Page"
       ]
       );
    }

    public function create()
    {
        //
    }

    public function store(StoreUserRequest $request)
    {
        //
    }

    public function show(User $user)
    {
        //
    }

    public function edit(User $user)
    {
        //
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        //
    }

    public function cekLogin(AuthRequest $request)
    {
        $credential = $request->only('email', 'password');

        $request->session()->regenerate();
        if (Auth::attempt($credential)) {
            $user = Auth::user();
            switch ($user) {
                case '1':
                    return redirect()->intended('/');
                    break;

                case '2':
                    return redirect()->intended('catatan');
                    break;
            }
            return redirect()->intended('/');
        }

        return back()->withErrors([
        'nofound' => 'Email or password is wrong'])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        // Auth::logout();

        // $request->session()->invalidate();
        // $request->session()->regenerateToken();

        // return redirect('/login');

        Session::flush();

        Auth::logout();

        return redirect('login');
    }
}
