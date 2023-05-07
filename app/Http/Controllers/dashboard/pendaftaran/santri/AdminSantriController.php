<?php

namespace App\Http\Controllers\dashboard\pendaftaran\santri;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
Use Alert;
use App\ModelBiayaPendaftaranSantri;
use App\ModelPendaftaranSantri;
use Illuminate\Support\Facades\Storage;

class AdminSantriController extends Controller
{
    public function index()
    {
        $pendaftaran = ModelPendaftaranSantri::get();
        $biaya = ModelBiayaPendaftaranSantri::get();
        return view('dashboard.pendaftaran.santri.pendaftaran',compact('pendaftaran','biaya'));
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
        Request()->validate([
            'gambar' => 'required',
            'tahun_ajaran' => 'required',
        ], [
            'gambar.required' => 'Wajib diisi!!!',
            'tahun_ajaran.required' => 'Wajib diisi!!!',
        ]);

        $file_name = $request->gambar->getClientOriginalName();
        $image = $request->gambar->storeAs('public/gambar', $file_name);
            // $image = $request->poto->store('thumbnail');
        ModelPendaftaranSantri::create([
            'gambar' => "gambar/".$file_name,
            'tahun_ajaran' => $request->tahun_ajaran,
        ]);
        Alert::success('Data berhasil ditambahkan', 'Success Message');
        return redirect("/admin/pendaftaran/santri");
    }

    public function update(Request $request, $id)
    {
        Request()->validate([
            'tahun_ajaran' => 'required',
        ], [
            'tahun_ajaran.required' => 'Wajib diisi!!!',
        ]);

        $home = ModelPendaftaranSantri::find($id);
        if (Request()->hasFile('gambar')) {
            if (Storage::exists($home->gambar)) {
                Storage::delete($home->gambar);
            }
            $file_name = $request->gambar->getClientOriginalName();
            $image = $request->gambar->storeAs('public/gambar', $file_name);
                // $image = $request->poto->store('thumbnail');
            $home->update([
                'gambar' => "gambar/".$file_name,
                'tahun_ajaran' => $request->tahun_ajaran,
            ]);
        } else {
            $home->update([
                'tahun_ajaran' => $request->tahun_ajaran,
            ]);
        }
        
        Alert::success('Data berhasil diubah', 'Berhasil');
        return redirect("/admin/pendaftaran/santri");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ModelPendaftaranSantri::find($id)->delete();
        Alert::success('Data berhasil dihapus', 'Berhasil');
        return redirect('/admin/pendaftaran/santri');
    }

    // Biaya Pendaftaran

    public function storebiaya(Request $request)
    {
        Request()->validate([
            'nama' => 'required',
            'harga' => 'required',
        ], [
            'nama.required' => 'Wajib diisi!!!',
            'harga.required' => 'Wajib diisi!!!',
        ]);

        ModelBiayaPendaftaranSantri::create([
            'nama' => $request->nama,
            'harga' => $request->harga,
        ]);
        Alert::success('Data berhasil ditambahkan', 'Success Message');
        return redirect("/admin/pendaftaran/santri");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showbiaya($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editbiaya($id)
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
    public function updatebiaya(Request $request, $id)
    {
        Request()->validate([
            'nama' => 'required',
            'harga' => 'required',
        ], [
            'nama.required' => 'Wajib diisi!!!',
            'harga.required' => 'Wajib diisi!!!',
        ]);

        $data = [
            'nama' => $request->nama,
            'harga' => $request->harga,
        ];
        ModelBiayaPendaftaranSantri::find($id)->update($data);
        
        Alert::success('Data berhasil diubah', 'Berhasil');
        return redirect("/admin/pendaftaran/santri");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroybiaya($id)
    {
        ModelBiayaPendaftaranSantri::find($id)->delete();
        Alert::success('Data berhasil dihapus', 'Berhasil');
        return redirect('/admin/pendaftaran/santri');
    }
}
