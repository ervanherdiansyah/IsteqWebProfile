<?php

namespace App\Http\Controllers\dashboard\sma;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Alert;
use App\ModelAdminSma;
use App\ModelSambutanSma;
use App\ModelStrukturSma;
use App\ModelVisiMisiSma;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class SmaAdminController extends Controller
{
    public function index()
    {
        $sma = ModelAdminSma::get();
        $sambutan = ModelSambutanSma::get();
        $visimisi = ModelVisiMisiSma::get();
        $struktur = ModelStrukturSma::get();
        return view('dashboard.sma.sma', compact('sma','sambutan','visimisi','struktur'));
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
        ModelAdminSma::create([
            'judul' => $request->judul,
            'body' => $request->body,
            'gambar' => 'gambar/' . $file_name,
            'nama' => $request->nama,
            'jabatan' => $request->jabatan,
        ]);
        Alert::success('Data berhasil ditambahkan', 'Success Message');
        return redirect('/admin/sma');
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

        $sma = ModelAdminSma::find($id);
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
        return redirect('/admin/sma');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ModelAdminSma::find($id)->delete();
        Alert::success('Data berhasil dihapus', 'Berhasil');
        return redirect('/admin/sma');
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
        ModelSambutanSma::create([
            'gambar' => 'gambar/' . $file_name,
            'nama' => $request->nama,
            'sambutan' => $request->sambutan,
        ]);
        Alert::success('Data berhasil ditambahkan', 'Success Message');
        return redirect('/admin/sma');
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

        $sambutan = ModelSambutanSma::find($id);
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
        return redirect('/admin/sma');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroysambutan($id)
    {
        ModelSambutanSma::find($id)->delete();
        Alert::success('Data berhasil dihapus', 'Berhasil');
        return redirect('/admin/sma');
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
        ModelVisiMisiSma::create([
            'visi' => $request->visi,
            'misi' => $request->misi,
            'tujuan' => $request->tujuan,
        ]);
        Alert::success('Data berhasil ditambahkan', 'Success Message');
        return redirect('/admin/sma');
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
        ModelVisiMisiSma::find($id)->update($data);

        Alert::success('Data berhasil diubah', 'Berhasil');
        return redirect('/admin/sma');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyvisimisi($id)
    {
        ModelVisiMisiSma::find($id)->delete();
        Alert::success('Data berhasil dihapus', 'Berhasil');
        return redirect('/admin/sma');
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
        ModelStrukturSma::create([
            'gambar' => "gambar/".$file_name,
            'tahun_periode' => $request->tahun_periode,
        ]);
        Alert::success('Data berhasil ditambahkan', 'Success Message');
        return redirect("/admin/sma");
    }

    public function updatestruktur(Request $request, $id)
    {
        Request()->validate([
            'tahun_periode' => 'required',
        ], [
            'tahun_periode.required' => 'Wajib diisi!!!',
        ]);

        $struktur = ModelStrukturSma::find($id);
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
        return redirect("/admin/sma");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroystruktur($id)
    {
        ModelStrukturSma::find($id)->delete();
        Alert::success('Data berhasil dihapus', 'Berhasil');
        return redirect('/admin/sma');
    }
}
