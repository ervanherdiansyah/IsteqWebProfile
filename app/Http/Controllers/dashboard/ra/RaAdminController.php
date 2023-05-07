<?php

namespace App\Http\Controllers\dashboard\ra;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Alert;
use App\ModelAdminRA;
use App\ModelSambutanRA;
use App\ModelStrukturRA;
use App\ModelVisiMisiRA;

class RaAdminController extends Controller
{
    public function index()
    {
        $ra = ModelAdminRA::get();
        $sambutan = ModelSambutanRA::get();
        $visimisi = ModelVisiMisiRA::get();
        $struktur = ModelStrukturRA::get();
        return view('dashboard.ra.ra', compact('ra','sambutan','visimisi','struktur'));
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
        ModelAdminRA::create([
            'judul' => $request->judul,
            'body' => $request->body,
            'gambar' => 'gambar/' . $file_name,
            'nama' => $request->nama,
            'jabatan' => $request->jabatan,
        ]);
        Alert::success('Data berhasil ditambahkan', 'Success Message');
        return redirect('/admin/ra');
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

        $ra = ModelAdminRA::find($id);
        if (Request()->hasFile('gambar')) {
            if (Storage::exists($ra->gambar)) {
                Storage::delete($ra->gambar);
            }
            $file_name = $request->gambar->getClientOriginalName();
            $image = $request->gambar->storeAs('public/gambar', $file_name);
            // $image = $request->poto->store('thumbnail');
            $ra->update([
                'judul' => $request->judul,
                'body' => $request->body,
                'gambar' => 'gambar/' . $file_name,
                'nama' => $request->nama,
                'jabatan' => $request->jabatan,
            ]);
        } else {
            $ra->update([
                'judul' => $request->judul,
                'body' => $request->body,
                'nama' => $request->nama,
                'jabatan' => $request->jabatan,
            ]);
        }

        Alert::success('Data berhasil diubah', 'Berhasil');
        return redirect('/admin/ra');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ModelAdminRA::find($id)->delete();
        Alert::success('Data berhasil dihapus', 'Berhasil');
        return redirect('/admin/ra');
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
        ModelSambutanRA::create([
            'gambar' => 'gambar/' . $file_name,
            'nama' => $request->nama,
            'sambutan' => $request->sambutan,
        ]);
        Alert::success('Data berhasil ditambahkan', 'Success Message');
        return redirect('/admin/ra');
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

        $sambutan = ModelSambutanRA::find($id);
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
        return redirect('/admin/ra');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroysambutan($id)
    {
        ModelSambutanRA::find($id)->delete();
        Alert::success('Data berhasil dihapus', 'Berhasil');
        return redirect('/admin/ra');
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
        ModelVisiMisiRA::create([
            'visi' => $request->visi,
            'misi' => $request->misi,
            'tujuan' => $request->tujuan,
        ]);
        Alert::success('Data berhasil ditambahkan', 'Success Message');
        return redirect('/admin/ra');
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
        ModelVisiMisiRA::find($id)->update($data);

        Alert::success('Data berhasil diubah', 'Berhasil');
        return redirect('/admin/ra');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyvisimisi($id)
    {
        ModelVisiMisiRA::find($id)->delete();
        Alert::success('Data berhasil dihapus', 'Berhasil');
        return redirect('/admin/ra');
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
        ModelStrukturRA::create([
            'gambar' => "gambar/".$file_name,
            'tahun_periode' => $request->tahun_periode,
        ]);
        Alert::success('Data berhasil ditambahkan', 'Success Message');
        return redirect("/admin/ra");
    }

    public function updatestruktur(Request $request, $id)
    {
        Request()->validate([
            'tahun_periode' => 'required',
        ], [
            'tahun_periode.required' => 'Wajib diisi!!!',
        ]);

        $struktur = ModelStrukturRA::find($id);
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
        return redirect("/admin/ra");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroystruktur($id)
    {
        ModelStrukturRA::find($id)->delete();
        Alert::success('Data berhasil dihapus', 'Berhasil');
        return redirect('/admin/ra');
    }
}
