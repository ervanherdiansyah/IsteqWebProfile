<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
Use Alert;
use App\ModelAlumi;
use Illuminate\Support\Facades\Storage;

class AdminAlumiController extends Controller
{
    public function index()
    {
        $alumi = ModelAlumi::get();
        return view('dashboard.home.alumi',compact('alumi'));
    }

    public function store(Request $request)
    {
        Request()->validate([
            'gambar' => 'required',
            'nama' => 'required',
            'angkatan' => 'required',
            'title' => 'required',
            'quotes' => 'required',
        ], [
            'gambar.required' => 'Wajib diisi!!!',
            'nama.required' => 'Wajib diisi!!!',
            'angkatan.required' => 'Wajib diisi!!!',
            'title.required' => 'Wajib diisi!!!',
            'quotes.required' => 'Wajib diisi!!!',
        ]);

        $file_name = $request->gambar->getClientOriginalName();
        $image = $request->gambar->storeAs('public/gambar', $file_name);
            // $image = $request->poto->store('thumbnail');
        ModelAlumi::create([
            'gambar' => "gambar/".$file_name,
            'nama' => $request->nama,
            'angkatan' => $request->angkatan,
            'title' => $request->title,
            'quotes' => $request->quotes,
        ]);
        Alert::success('Data berhasil ditambahkan', 'Success Message');
        return redirect("/admin/alumi");
    }

    public function update(Request $request, $id)
    {
        Request()->validate([
            'nama' => 'required',
            'angkatan' => 'required',
            'title' => 'required',
            'quotes' => 'required',
        ], [
            'nama.required' => 'Wajib diisi!!!',
            'angkatan.required' => 'Wajib diisi!!!',
            'title.required' => 'Wajib diisi!!!',
            'quotes.required' => 'Wajib diisi!!!',
        ]);

        $home = ModelAlumi::find($id);
        if (Request()->hasFile('gambar')) {
            if (Storage::exists($home->gambar)) {
                Storage::delete($home->gambar);
            }
            $file_name = $request->gambar->getClientOriginalName();
            $image = $request->gambar->storeAs('public/gambar', $file_name);
                // $image = $request->poto->store('thumbnail');
            $home->update([
                'gambar' => "gambar/".$file_name,
                'nama' => $request->nama,
                'angkatan' => $request->angkatan,
                'title' => $request->title,
                'quotes' => $request->quotes,
            ]);
        } else {
            $home->update([
                'nama' => $request->nama,
                'angkatan' => $request->angkatan,
                'title' => $request->title,
                'quotes' => $request->quotes,
            ]);
        }
        
        Alert::success('Data berhasil diubah', 'Berhasil');
        return redirect("/admin/alumi");
    }

    public function destroy($id)
    {
        ModelAlumi::find($id)->delete();
        Alert::success('Data berhasil dihapus', 'Berhasil');
        return redirect('/admin/alumi');
    }
}
