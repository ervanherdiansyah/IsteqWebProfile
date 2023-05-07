<?php

namespace App\Http\Controllers\dashboard\tentang\organisasi;

use App\Http\Controllers\Controller;
use App\ModelProfilePimpinan;
use App\ModelStruktur;
use Illuminate\Http\Request;
Use Alert;
use Illuminate\Support\Facades\Storage;

class AdminOrganisasiController extends Controller
{
    public function index()
    {
        $struktur = ModelStruktur::get();
        // $profile = ModelProfilePimpinan::get();
        return view('dashboard.tentangisteq.organisasi.organisasi',compact('struktur'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createstruktur()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storestruktur(Request $request)
    {
        Request()->validate([
            'gambar' => 'required',
            'tahun_periode' => 'required',
        ], [
            'gambar.required' => 'Wajib diisi!!!',
            'tahun_periode.required' => 'Wajib diisi!!!',
        ]);

        $file_name = $request->gambar->getClientOriginalName();
        $image = $request->gambar->storeAs('public/gambar', $file_name);
            // $image = $request->poto->store('thumbnail');
        ModelStruktur::create([
            'gambar' => "gambar/".$file_name,
            'tahun_periode' => $request->tahun_periode,
        ]);
        Alert::success('Data berhasil ditambahkan', 'Success Message');
        return redirect("/admin/tentang/organisasi");
    }

    public function updatestruktur(Request $request, $id)
    {
        Request()->validate([
            'tahun_periode' => 'required',
        ], [
            'tahun_periode.required' => 'Wajib diisi!!!',
        ]);

        $home = ModelStruktur::find($id);
        if (Request()->hasFile('gambar')) {
            if (Storage::exists($home->gambar)) {
                Storage::delete($home->gambar);
            }
            $file_name = $request->gambar->getClientOriginalName();
            $image = $request->gambar->storeAs('public/gambar', $file_name);
                // $image = $request->poto->store('thumbnail');
            $home->update([
                'gambar' => "gambar/".$file_name,
                'tahun_periode' => $request->tahun_periode,
            ]);
        } else {
            $home->update([
                'tahun_periode' => $request->tahun_periode,
            ]);
        }
        
        Alert::success('Data berhasil diubah', 'Berhasil');
        return redirect("/admin/tentang/organisasi");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroystruktur($id)
    {
        ModelStruktur::find($id)->delete();
        Alert::success('Data berhasil dihapus', 'Berhasil');
        return redirect('/admin/tentang/organisasi');
    }
}
