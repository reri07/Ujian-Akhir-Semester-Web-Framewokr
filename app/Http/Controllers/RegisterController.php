<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

use function Ramsey\Uuid\v1;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "Register";
        return view("auth.register", compact("title"));
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
    public function store(Request $request)
    {
        $err = [
            "required" => "Form harus Diisi !",
            "unique" => "Email Sudah Terdaftar !",
            "same" => "Password Harus Sama !",
        ];
        // dd($request);
        $this->validate(
            $request,
            [
                "nama" => "required",
                "email" => "required|unique:users",
                "alamat" => "required",
                "nik" => "required",
                "noHp" => "required",
                "pass" => "required",
                "confirm" => "required|same:pass",
            ],
            $err
        );

        User::create([
            "name" => $request->nama,
            "email" => $request->email,
            "nik" => $request->nik,
            "alamat" => $request->alamat,
            "no_hp" => $request->noHp,
            "role" => 2,
            "password" => Hash::make($request->pass),
        ]);
        return redirect()
            ->route("login.index")
            ->with("sukses", "berhasil");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
