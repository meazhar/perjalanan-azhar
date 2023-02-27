<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use App\Models\auth\User;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\SessionGuard;

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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUserRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\auth\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\auth\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateUserRequest  $request
     * @param  \App\Models\auth\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\auth\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }


    public function cekLogin(AuthRequest $request)
    {
        $credential = $request->only('email', 'password');

        $request->session()->regenerate();
        if (Auth::attemp($credential)) {
            $user = Auth::user();
            switch ($user->level) {
                case '1':
                   return redirect('/');
                    break;

                case '2':
                   return redirect()->intended('pembelian');
                    break;
            }
        }
    }
}
