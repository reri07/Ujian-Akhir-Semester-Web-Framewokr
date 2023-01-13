<?php

namespace App\Http\Controllers;

use App\Models\Login;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "Login";
        return view("auth.login", compact("title"));
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function auth(Request $request)
    {
        // dd(Auth::attempt(['email' =>  $request->input('email'), 'password' => $request->input('password')]));
        $data = [
            "email" => $request->input("email"),
            "password" => $request->input("password"),
        ];
        if (Auth::Attempt($data)) {
            session::put("id_user", Auth::user()->id_user);
            session::put("logged_in", true);
            session::put("name", Auth::user()->name);
            session::put("no_hp", Auth::user()->no_hp);
            session::put("email", Auth::user()->email);
            session::put("role", Auth::user()->role);

            return redirect()->route("space.index");
        } else {
            // return redirect()->route('/');
            return redirect()
                ->route("login.index")
                ->with("fail", "Email atau Password Salah!");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route("login.index");
    }
}
