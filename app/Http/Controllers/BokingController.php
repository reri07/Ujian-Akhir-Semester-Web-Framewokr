<?php

namespace App\Http\Controllers;

use App\Models\boking;
use Illuminate\Http\Request;
use App\Models\Spacework;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class BokingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $spacework = Spacework::where('id_user', Session::get('id_user'))->get();
        $spacework = Spacework::latest()->paginate(9);
        $title = "Boking Space";
        return view("content.boking", compact("spacework", "title"));
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
    public function store(Request $request, $id_space)
    {
        // dd($request);
        $error = [
            "required" => "Kolom Tidak Boleh Kosong!",
        ];
        $this->validate(
            $request,
            [
                // 'noHp' => 'required',
                "no_rek" => "required",
                "tgl_boking" => "required",
                "jam_boking" => "required",
                "jam_keluar" => "required",
                // 'harga' => 'required',
            ],
            $error
        );
        $spacework = Spacework::find($id_space);
        boking::create([
            "no_rek" => $request->no_rek,
            // 'no_hp' => $request->noHp,
            "jml_orang" => $request->jml_orang,
            "kd_boking" =>
                "SP" . Session::get("id_user") . $id_space . date("YmHs"),
            "tgl_boking" => $request->tgl_boking,
            "jam_boking" => $request->jam_boking,
            "jam_keluar" => $request->jam_keluar,
            "satuan_harga" => $spacework->harga,
            "status" => "pending",
            "id_user" => Session::get("id_user"),
            "id_space" => $id_space,
        ]);
        return redirect()
            ->route("history.index")
            ->with("success", "Silahkan Melakukan pembayaran.");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\boking  $boking
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $spacework = DB::table("spaceworks")
            ->leftjoin(
                "fasilitas",
                "spaceworks.id_fasilitas",
                "=",
                "fasilitas.id_fasilitas"
            )
            ->where("id_space", $id)
            ->get();
        // dd($spacework);
        $title = "Boking Space";
        return view("content.checkout", compact("title", "spacework", "id"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\boking  $boking
     * @return \Illuminate\Http\Response
     */
    public function edit(boking $boking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\boking  $boking
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, boking $boking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\boking  $boking
     * @return \Illuminate\Http\Response
     */
    public function destroy(boking $boking)
    {
        //
    }
}
