<?php

namespace App\Http\Controllers\dashboard\mts;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Alert;
use App\ModelAdminMts;
use App\ModelSambutanMtTs;
use App\ModelStrukturMtTs;
use App\ModelStrukturSma;
use App\ModelVisiMisiMtTs;

class MtsAdminController extends Controller
{
    public function index()
    {
        $mts = ModelAdminMts::get();
        $sambutan = ModelSambutanMtTs::get();
        $visimisi = ModelVisiMisiMtTs::get();
        $struktur = ModelStrukturMtTs::get();
        return view('dashboard.mts.mts', compact('mts','sambutan','visimisi','struktur'));
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
        Request()->validate(
            [
                'judul' => 'required',
            ],
            [
                'judul.required' => 'Wajib diisi!!!',
            ],
        );

        $file_name = $request->gambar->getClientOriginalName();
        $image = $request->gambar->storeAs('public/gambar', $file_name);
        // $image = $request->poto->store('thumbnail');
        ModelAdminMts::create([
            'judul' => $request->judul,
            'body' => $request->body,
            'gambar' => 'gambar/' . $file_name,
            'nama' => $request->nama,
            'jabatan' => $request->jabatan,
        ]);
        Alert::success('Data berhasil ditambahkan', 'Success Message');
        return redirect('/admin/mts');
    }

    public function update(Request $request, $id)
    {
        Request()->validate(
            [
                'judul' => 'required',
            ],
            [
                'judul.required' => 'Wajib diisi!!!',
            ],
        );

        $sma = ModelAdminMts::find($id);
        if (Request()->hasFile('gambar')) {
            if (Storage::exists($sma->gambar)) {
                Storage::delete($sma->gambar);
            }
            $file_name = $request->gambar->getClientOriginalName();
            $image = $request->gambar->storeAs('public/gambar', $file_name);
            // $image = $request->poto->store('thumbnail');
            $sma->update([
                'judul' => $request->judul,
                'body' => $request->body,
                'gambar' => 'gambar/' . $file_name,
                'nama' => $request->nama,
                'jabatan' => $request->jabatan,
            ]);
        } else {
            $sma->update([
                'judul' => $request->judul,
                'body' => $request->body,
                'nama' => $request->nama,
                'jabatan' => $request->jabatan,
            ]);
        }

        Alert::success('Data berhasil diubah', 'Berhasil');
        return redirect('/admin/mts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ModelAdminMts::find($id)->delete();
        Alert::success('Data berhasil dihapus', 'Berhasil');
        return redirect('/admin/mts');
    }

    //Sambutan

    public function storesambutan(Request $request)
    {
        Request()->validate(
            [
                'gambar' => 'required',
                'nama' => 'required',
                'sambutan' => 'required',
            ],
            [
                'gambar.required' => 'Wajib diisi!!!',
                'nama.required' => 'Wajib diisi!!!',
                'sambutan.required' => 'Wajib diisi!!!',
            ],
        );

        $file_name = $request->gambar->getClientOriginalName();
        $image = $request->gambar->storeAs('public/gambar', $file_name);
        // $image = $request->poto->store('thumbnail');
        ModelSambutanMtTs::create([
            'gambar' => 'gambar/' . $file_name,
            'nama' => $request->nama,
            'sambutan' => $request->sambutan,
        ]);
        Alert::success('Data berhasil ditambahkan', 'Success Message');
        return redirect('/admin/mts');
    }

    public function updatesambutan(Request $request, $id)
    {
        Request()->validate(
            [
                'nama' => 'required',
                'sambutan' => 'required',
            ],
            [
                'nama.required' => 'Wajib diisi!!!',
                'sambutan.required' => 'Wajib diisi!!!',
            ],
        );

        $sambutan = ModelSambutanMtTs::find($id);
        if (Request()->hasFile('gambar')) {
            if (Storage::exists($sambutan->gambar)) {
                Storage::delete($sambutan->gambar);
            }
            $file_name = $request->gambar->getClientOriginalName();
            $image = $request->gambar->storeAs('public/gambar', $file_name);
            // $image = $request->poto->store('thumbnail');
            $sambutan->update([
                'gambar' => 'gambar/' . $file_name,
                'nama' => $request->nama,
                'sambutan' => $request->sambutan,
            ]);
        } else {
            $sambutan->update([
                'nama' => $request->nama,
                'sambutan' => $request->sambutan,
            ]);
        }

        Alert::success('Data berhasil diubah', 'Berhasil');
        return redirect('/admin/mts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroysambutan($id)
    {
        ModelSambutanMtTs::find($id)->delete();
        Alert::success('Data berhasil dihapus', 'Berhasil');
        return redirect('/admin/mts');
    }

    // Visi Misi

    public function storevisimisi(Request $request)
    {
        Request()->validate(
            [
                'visi' => 'required',
                'misi' => 'required',
            ],
            [
                'visi.required' => 'Wajib diisi!!!',
                'misi.required' => 'Wajib diisi!!!',
            ],
        );
        ModelVisiMisiMtTs::create([
            'visi' => $request->visi,
            'misi' => $request->misi,
            'tujuan' => $request->tujuan,
        ]);
        Alert::success('Data berhasil ditambahkan', 'Success Message');
        return redirect('/admin/mts');
    }

    public function updatevisimisi(Request $request, $id)
    {
        Request()->validate(
            [
                'visi' => 'required',
                'misi' => 'required',
            ],
            [
                'visi.required' => 'Wajib diisi!!!',
                'misi.required' => 'Wajib diisi!!!',
            ],
        );

        $data = [
            'visi' => $request->visi,
            'misi' => $request->misi,
            'tujuan' => $request->tujuan,
        ];
        ModelVisiMisiMtTs::find($id)->update($data);

        Alert::success('Data berhasil diubah', 'Berhasil');
        return redirect('/admin/mts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyvisimisi($id)
    {
        ModelVisiMisiMtTs::find($id)->delete();
        Alert::success('Data berhasil dihapus', 'Berhasil');
        return redirect('/admin/mts');
    }

    // Organigram

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
        ModelStrukturMtTs::create([
            'gambar' => "gambar/".$file_name,
            'tahun_periode' => $request->tahun_periode,
        ]);
        Alert::success('Data berhasil ditambahkan', 'Success Message');
        return redirect("/admin/mts");
    }

    public function updatestruktur(Request $request, $id)
    {
        Request()->validate([
            'tahun_periode' => 'required',
        ], [
            'tahun_periode.required' => 'Wajib diisi!!!',
        ]);

        $struktur = ModelStrukturMtTs::find($id);
        if (Request()->hasFile('gambar')) {
            if (Storage::exists($struktur->gambar)) {
                Storage::delete($struktur->gambar);
            }
            $file_name = $request->gambar->getClientOriginalName();
            $image = $request->gambar->storeAs('public/gambar', $file_name);
                // $image = $request->poto->store('thumbnail');
            $struktur->update([
                'gambar' => "gambar/".$file_name,
                'tahun_periode' => $request->tahun_periode,
            ]);
        } else {
            $struktur->update([
                'tahun_periode' => $request->tahun_periode,
            ]);
        }
        
        Alert::success('Data berhasil diubah', 'Berhasil');
        return redirect("/admin/mts");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroystruktur($id)
    {
        ModelStrukturMtTs::find($id)->delete();
        Alert::success('Data berhasil dihapus', 'Berhasil');
        return redirect('/admin/mts');
    }
}
