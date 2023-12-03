<?php

namespace App\Http\Controllers;

use App\Models\Pengajuan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DashboardPengajuanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $pengajuans = Pengajuan::with(["mahasiswa", "lpj"])->where('mahasiswa_id',auth()->user()->id)->orderByDesc('created_at')->get();
        if(auth()->user()->level === "mahasiswa")
        {
            return view("dashboard.index",[
                "titile" => "Pengajuan",
                "pengajuans" => $pengajuans,
            ]);
        }
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("dashboard.pengajuan");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $credentials = $request->validate([
            "no_kendali"=>["required"],
            "judul"=>["required"],
            "jenis"=>["required"],
            "tipe"=>["required"],
            "pendanaan"=>["required"],
            "lembaga"=>["required"],
            "nama_ketua"=>["required"],
            "nim_ketua"=>["required"],
            "no_ketua"=>["required"],
            "bentuk"=>["required"],
            "no_rek"=>["required"],
            "status"=>["required"],
        ]);

        $credentials_lpj = $request->validate([
            "nominal_dana"=>["required"],
            "hasil_kegiatan"=>["required"],
            "email_ketua"=>["required"],
            "upload_kendali"=>["file"],
            "upload_acc_keuangan"=>["file"],
            "upload_lpj"=>["file"],
            "upload_sertifikat_lomba"=>["file"],
        ]);

        $credentials["mahasiswa_id"] = auth()->user()->mahasiswa->id;

        try {
            $pengajuan = Pengajuan::create($credentials);
            $pengajuan->lpj()->create($credentials_lpj);
            // Jika ada gambar yang diunggah, simpan gambar-gambar tersebut
            if ($request->hasFile("upload_kendali")) {
                $path1 = $request->file("upload_kendali")->store('pengajuan-doc');
                $path2 = $request->file("upload_acc_keuangan")->store('pengajuan-doc');
                $path3 = $request->file("upload_lpj")->store('pengajuan-doc');
                $path4 = $request->file("upload_sertifikat_lomba")->store('pengajuan-doc');
                $pengajuan->lpj()->update([
                    "upload_kendali" => $path1,
                    "upload_acc_keuangan" => $path2,
                    "upload_lpj" => $path3,
                    "upload_sertifikat_lomba" => $path4,
                ]);
                // foreach ($request->file("images") as $image) {
                //     $path = $image->store('complaint-images');
                //     // Simpan path gambar ke dalam tabel images
                //     $complaint->images()->create([
                //         "image_path" => $path,
                //     ]);
                // }
            }
    
            return redirect('/dashboard')->with('success', 'Pengajuan kamu berhasil dibuat!');
        } catch (\Exception $e) {
            return redirect('/dashboard')->withErrors('Keluhan kamu gagal dibuat.' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Pengajuan $pengajuan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pengajuan $pengajuan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pengajuan $pengajuan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pengajuan $pengajuan)
    {
        //
    }
}
