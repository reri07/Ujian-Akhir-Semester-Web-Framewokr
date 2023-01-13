<?php

namespace App\Http\Controllers;

use App\Models\Spacework;
use App\Models\boking;
use App\Models\Fasilitas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class ManageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Spacework $spacework)
    {
        // dd($space);
        $spacework = DB::table("spaceworks")
            ->leftJoin(
                "fasilitas",
                "spaceworks.id_fasilitas",
                "=",
                "fasilitas.id_fasilitas"
            )
            ->orderByDesc("id_space")
            ->where("id_pemilik", Session::get("id_user"))
            ->paginate(6);
        // dd($spacework);
        $history = DB::table("bokings")
            ->join("users", "bokings.id_user", "=", "users.id_user")
            ->join("spaceworks", "bokings.id_space", "=", "spaceworks.id_space")
            ->where("id_pemilik", Session::get("id_user"))
            ->get();
        // dd($history);
        $sum = DB::table("bokings")
            ->join("spaceworks", "bokings.id_space", "=", "spaceworks.id_space")
            ->where("id_pemilik", Session::get("id_user"));
        $harga = $sum->sum("satuan_harga");
        $jml_orang = $sum->sum("jml_orang");
        $title = "Tempat Saya";
        return view(
            "content.manage",
            compact("title", "spacework", "history", "harga", "jml_orang")
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Tambah Space";
        return view("content.addSpace", compact("title"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $error = [
            "required" => "Kolom Tidak Boleh Kosong!",
            "image" => "File Harus Berupa Gambar!",
            "mimes" => "Bukan Format Gambar!",
            "max" => "Max. 2MB!",
            "unique" => "Data Sudah Ada!",
        ];
        $this->validate(
            $request,
            [
                "image" => "required|image|mimes:jpeg,png,jpg,gif,svg|max:2048",
                "pemilik" => "required",
                "nama_space" => "required|unique:spaceworks",
                "harga" => "required",
                "no_rek" => "required",
                "location" => "required",
            ],
            $error
        );

        // SIMPAN GAMBAR KEDALAM FOLDER PUBLIK
        $image = $request->file("image");
        $image->storeAs("public/storage", $image->hashName());

        // Menyimpan data
        Spacework::create([
            "image" => $image->hashName(),
            "pemilik_space" => $request->pemilik,
            "nama_space" => $request->nama_space,
            "lokasi" => $request->location,
            "harga" => $request->harga,
            "no_rek" => $request->no_rek,
            "id_pemilik" => Session::get("id_user"),
            "rate" => 0,
        ]);
        return redirect()
            ->route("manage.index")
            ->with("success", "Data Berhasil Di Posting!");
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
    public function edit(Spacework $spacework, $id_space)
    {
        $title = "Edit Space";
        $spacework = DB::table("spaceworks")
            ->leftjoin(
                "fasilitas",
                "spaceworks.id_fasilitas",
                "=",
                "fasilitas.id_fasilitas"
            )
            ->where("id_space", $id_space)
            ->get();
        // dd($spacework);
        return view("content.update", compact("spacework", "title"));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_space)
    {
        // $fasilitas = Fasilitas::find($id_space);

        // dd($spacework);
        // dd($fasilitas);
        $error = [
            "required" => "Data Tidak Boleh Kosong !",
            "image" => "File Harus Berupa Gambar!",
            "mimes" => "Bukan Format Gambar!",
            "max" => "Max. 2MB!",
            "unique" => "Data Sudah Ada!",
        ];
        $this->validate(
            $request,
            [
                "image" => "image|mimes:jpeg,png,jpg,gif,svg|max:2048",
                "pemilik" => "required",
                "nama_space" => "required",
                "location" => "required",
                "harga" => "required",
            ],
            $error
        );

        $fasilitas = Fasilitas::find($id_space);
        if ($fasilitas == null) {
            Fasilitas::create([
                "id_fasilitas" => $id_space,
                "fasilitas_1" => $request->fas1,
                "fasilitas_2" => $request->fas2,
                "fasilitas_3" => $request->fas3,
                "fasilitas_4" => $request->fas4,
            ]);
        } else {
            $fasilitas->fasilitas_1 = $request->fas1;
            $fasilitas->fasilitas_2 = $request->fas2;
            $fasilitas->fasilitas_3 = $request->fas3;
            $fasilitas->fasilitas_4 = $request->fas4;
            $fasilitas->save();
        }

        $spacework = Spacework::find($id_space);
        // dd($spacework->image);
        //check if image is uploaded
        if ($request->hasFile("image")) {
            //upload new image
            $upload = $request->file("image");
            $upload->storeAs("public/storage", $upload->hashName());

            //delete old image
            Storage::delete("public/storage/" . $spacework->image);
            $spacework->image = $upload->hashName();
        }

        $spacework->pemilik_space = $request->pemilik;
        $spacework->nama_space = $request->nama_space;
        $spacework->lokasi = $request->location;
        $spacework->harga = $request->harga;
        $spacework->id_pemilik = Session::get("id_user");
        $spacework->id_fasilitas = $id_space;
        $spacework->rate = 0;
        $spacework->save();

        //redirect to index
        return redirect()
            ->route("manage.index")
            ->with("success", "Data Berhasil Diubah!");
    }

    public function payment(Request $request, $id_bokiing)
    {
        $boking = boking::find($id_bokiing);
        $boking->status = "sukses";
        $boking->save();

        return redirect()
            ->route("manage.index")
            ->with("success", "Pembayaran Diterima!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_space)
    {
        $spacework = Spacework::find($id_space);
        Storage::delete("public/storage/" . $spacework->image);
        $spacework->delete();
        return redirect()
            ->route("manage.index")
            ->with("success", "Data Berhasil Dihapus!");
    }
}
