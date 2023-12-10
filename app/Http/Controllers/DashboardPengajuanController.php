<?php

namespace App\Http\Controllers;

use App\Models\Pengajuan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class DashboardPengajuanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        if(auth()->user()->level === "mahasiswa")
        {
            $pengajuans = Pengajuan::with(["mahasiswa", "lpj"])->where('mahasiswa_id',auth()->user()->id)->orderByDesc('updated_at')->get();
            
            return view("dashboard.index",[
                "titile" => "Pengajuan",
                "pengajuans" => $pengajuans,
            ]);
        }
        $pengajuans = Pengajuan::with(["mahasiswa", "lpj"])->orderByDesc('updated_at')->get();

        return view("dashboard.index",[
            "titile" => "Pengajuan",
            "pengajuans" => $pengajuans,
        ]);
        
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

                // Get File
                $file1 = $request->file("upload_kendali");
                $file2 = $request->file("upload_acc_keuangan");
                $file3 = $request->file("upload_lpj");
                $file4 = $request->file("upload_sertifikat_lomba");

                $path1 = $file1 ? $file1->storeAs('lpj-doc', str_replace(' ', '-', $file1->getClientOriginalName())) : null;
                $path2 = $file2 ? $file2->storeAs('lpj-doc', str_replace(' ', '-', $file2->getClientOriginalName())) : null;
                $path3 = $file3 ? $file3->storeAs('lpj-doc', str_replace(' ', '-', $file3->getClientOriginalName())) : null;
                $path4 = $file4 ? $file4->storeAs('lpj-doc', str_replace(' ', '-', $file4->getClientOriginalName())) : null;
            
              
                $pengajuan->lpj()->update([
                    "upload_kendali" => $path1,
                    "upload_acc_keuangan" => $path2,
                    "upload_lpj" => $path3,
                    "upload_sertifikat_lomba" => $path4,
                ]);
    
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
        if(auth()->user()->level == "mahasiswa")
        {
            

            // dd($request);
            $credentials = $request->validate([
                "tipe"=>["required"],
            ]);
    
            $credentials_lpj = $request->validate([
                "upload_kendali"=>["file"],
                "upload_acc_keuangan"=>["file"],
                "upload_lpj"=>["file"],
                "upload_sertifikat_lomba"=>["file"],
            ]);
    
            $credentials["mahasiswa_id"] = auth()->user()->mahasiswa->id;
            try {
                $pengajuan->update(['tipe' => $credentials["tipe"]]);
                $file1 = $request->file("upload_kendali");
                $file2 = $request->file("upload_acc_keuangan");
                $file3 = $request->file("upload_lpj");
                $file4 = $request->file("upload_sertifikat_lomba");

                collect([
                    'upload_kendali',
                    'upload_acc_keuangan',
                    'upload_lpj',
                    'upload_sertifikat_lomba',
                ])->each(function ($field) use ($pengajuan) {
                    if ($pengajuan->lpj->$field) {
                        Storage::delete($pengajuan->lpj->$field);
                    }
                });
            
                // Check if files exist in the request
                $path1 = $file1 ? $file1->storeAs('lpj-doc', str_replace(' ', '-', $file1->getClientOriginalName())) : null;
                $path2 = $file2 ? $file2->storeAs('lpj-doc', str_replace(' ', '-', $file2->getClientOriginalName())) : null;
                $path3 = $file3 ? $file3->storeAs('lpj-doc', str_replace(' ', '-', $file3->getClientOriginalName())) : null;
                $path4 = $file4 ? $file4->storeAs('lpj-doc', str_replace(' ', '-', $file4->getClientOriginalName())) : null;


                // if($pengajuan->lpj->upload)

                // Update the lpj relationship
                $pengajuan->lpj()->update([
                    "upload_kendali" => $path1,
                    "upload_acc_keuangan" => $path2,
                    "upload_lpj" => $path3,
                    "upload_sertifikat_lomba" => $path4,
                ]);
                $pengajuan->update([
                    "status" => "diproses"
                ]);
                $pengajuan->touch();
        
                return back()->with('success', 'Pengajuan barhasil di update!');
            } catch (\Exception $e) {
                return back()->withErrors('Pengajuan gagal di edit' . $e->getMessage());
            }
        }
        $credentials = $request->validate([
            "status"=>["required"],
            "catatan"=>[""],
        ]);

        try{
            $pengajuan->update([
                "status"=> $credentials["status"],
                "catatan"=> $credentials["catatan"] ? $credentials["catatan"] : null,
            ]);
            return back()->with('success', 'Pengajuan barhasil di update!');
        } catch (\Exception $e) {
            return back()->withErrors('Pengajuan gagal di edit' . $e->getMessage());
        }


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pengajuan $pengajuan)
    {
        //
    }

    public function download($filepath)
    {
        // dd($filepath);
        return Storage::download($filepath);
    }
}
