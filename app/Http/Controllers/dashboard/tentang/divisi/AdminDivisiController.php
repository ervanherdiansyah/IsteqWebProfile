<?php

namespace App\Http\Controllers\dashboard\tentang\divisi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Alert;
use App\ModelDivisi;
use App\ModelTeam;
use Illuminate\Support\Facades\Storage;

class AdminDivisiController extends Controller
{
    //Divisi
    public function index()
    {
        $divisi = ModelDivisi::get();
        $team = ModelTeam::get();
        return view('dashboard.tentangisteq.divisi.divisi', compact('divisi', 'team'));
    }
    public function storedivisi(Request $request)
    {
        Request()->validate(
            [
                'nama' => 'required',
            ],
            [
                'nama.required' => 'Wajib diisi!!!',
            ],
        );

        $file_name = $request->gambar->getClientOriginalName();
        $image = $request->gambar->storeAs('public/gambar', $file_name);
        // $image = $request->poto->store('thumbnail');
        ModelDivisi::create([
            'gambar' => 'gambar/' . $file_name,
            'nama' => $request->nama,
        ]);
        Alert::success('Data berhasil ditambahkan', 'Success Message');
        return redirect('/admin/tentang/divisi');
    }

    public function updatedivisi(Request $request, $id)
    {
        Request()->validate(
            [
                'nama' => 'required',
            ],
            [
                'nama.required' => 'Wajib diisi!!!',
            ],
        );

        $divisi = ModelDivisi::find($id);
        if (Request()->hasFile('gambar')) {
            if (Storage::exists($divisi->gambar)) {
                Storage::delete($divisi->gambar);
            }
            $file_name = $request->gambar->getClientOriginalName();
            $image = $request->gambar->storeAs('public/gambar', $file_name);
            // $image = $request->poto->store('thumbnail');
            $divisi->update([
                'gambar' => 'gambar/' . $file_name,
                'nama' => $request->nama,
            ]);
        } else {
            $divisi->update([
                'nama' => $request->nama,
            ]);
        }

        Alert::success('Data berhasil diubah', 'Berhasil');
        return redirect('/admin/tentang/divisi');
    }
    public function destroydivisi($id)
    {
        ModelDivisi::find($id)->delete();
        Alert::success('Data berhasil dihapus', 'Berhasil');
        return redirect('/admin/tentang/divisi');
    }

    //Our Team
    public function storeteam(Request $request)
    {
        Request()->validate(
            [
                'nama' => 'required',
            ],
            [
                'nama.required' => 'Wajib diisi!!!',
            ],
        );

        $file_name = $request->gambar->getClientOriginalName();
        $image = $request->gambar->storeAs('public/gambar', $file_name);
        // $image = $request->poto->store('thumbnail');
        ModelTeam::create([
            'divisi_id' => $request->divisi_id,
            'gambar' => 'gambar/' . $file_name,
            'nama' => $request->nama,
            'jabatan' => $request->jabatan,
            'status' => $request->status,
        ]);
        Alert::success('Data berhasil ditambahkan', 'Success Message');
        return redirect('/admin/tentang/divisi');
    }

    public function updateteam(Request $request, $id)
    {
        Request()->validate(
            [
                'nama' => 'required',
            ],
            [
                'nama.required' => 'Wajib diisi!!!',
            ],
        );

        $team = ModelTeam::find($id);
        if (Request()->hasFile('gambar')) {
            if (Storage::exists($team->gambar)) {
                Storage::delete($team->gambar);
            }
            $file_name = $request->gambar->getClientOriginalName();
            $image = $request->gambar->storeAs('public/gambar', $file_name);
            // $image = $request->poto->store('thumbnail');
            $team->update([
                'divisi_id' => $request->divisi_id,
                'gambar' => 'gambar/' . $file_name,
                'nama' => $request->nama,
                'jabatan' => $request->jabatan,
                'status' => $request->status,
            ]);
        } else {
            $team->update([
                'divisi_id' => $request->divisi_id,
                'nama' => $request->nama,
                'jabatan' => $request->jabatan,
                'status' => $request->status,
            ]);
        }

        Alert::success('Data berhasil diubah', 'Berhasil');
        return redirect('/admin/tentang/divisi');
    }
    public function destroyteam($id)
    {
        ModelTeam::find($id)->delete();
        Alert::success('Data berhasil dihapus', 'Berhasil');
        return redirect('/admin/tentang/divisi');
    }
}
