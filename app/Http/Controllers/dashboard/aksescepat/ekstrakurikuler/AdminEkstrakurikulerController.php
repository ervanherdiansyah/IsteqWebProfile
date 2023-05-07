<?php

namespace App\Http\Controllers\dashboard\aksescepat\ekstrakurikuler;

use App\Http\Controllers\Controller;
use App\ModelEkstrakurikuler;
use Illuminate\Http\Request;
use Alert;
use App\ModelEkstrakurikulermts;
use App\ModelEkstrakurikulerpondok;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class AdminEkstrakurikulerController extends Controller
{
    public function indexekskul()
    {
        
        $ekskul = ModelEkstrakurikuler::get();
        $ekskulmts = ModelEkstrakurikulermts::get();
        $ekskulpondok = ModelEkstrakurikulerpondok::get();
        return view('dashboard.aksescepat.ekstrakurikuler',compact('ekskul','ekskulmts','ekskulpondok'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createekskul()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeekskul(Request $request)
    {
        Request()->validate([
            'gambar' => 'required',
            'judul' => 'required',
        ], [
            'gambar.required' => 'Wajib diisi!!!',
            'judul.required' => 'Wajib diisi!!!',
        ]);

        $file_name = $request->gambar->getClientOriginalName();
        $image = $request->gambar->storeAs('public/gambar', $file_name);
            // $image = $request->poto->store('thumbnail');
        ModelEkstrakurikuler::create([
            'gambar' => "gambar/".$file_name,
            'judul' => $request->judul,
        ]);
        Alert::success('Data berhasil ditambahkan', 'Success Message');
        return redirect("/admin/aksescepat/ekskul");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showekskul($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editekskul($id)
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
    public function updateekskul(Request $request, $id)
    {
        Request()->validate([
            'judul' => 'required',
        ], [
            'judul.required' => 'Wajib diisi!!!',
        ]);

        $ekskul = ModelEkstrakurikuler::find($id);
        if (Request()->hasFile('gambar')) {
            if (Storage::exists($ekskul->gambar)) {
                Storage::delete($ekskul->gambar);
            }
            $file_name = $request->gambar->getClientOriginalName();
            $image = $request->gambar->storeAs('public/gambar', $file_name);
                // $image = $request->poto->store('thumbnail');
            $ekskul->update([
                'gambar' => "gambar/".$file_name,
                'judul' => $request->judul,
            ]);
        } else {
            $ekskul->update([
                'judul' => $request->judul,
            ]);
        }
        
        Alert::success('Data berhasil diubah', 'Berhasil');
        return redirect("/admin/aksescepat/ekskul");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyekskul($id)
    {
        ModelEkstrakurikuler::find($id)->delete();
        Alert::success('Data berhasil dihapus', 'Berhasil');
        return redirect('/admin/aksescepat/ekskul');
    }

    //Mts
    public function storeekskulmts(Request $request)
    {
        Request()->validate([
            'gambar' => 'required',
            'judul' => 'required',
        ], [
            'gambar.required' => 'Wajib diisi!!!',
            'judul.required' => 'Wajib diisi!!!',
        ]);

        $file_name = $request->gambar->getClientOriginalName();
        $image = $request->gambar->storeAs('public/gambar', $file_name);
            // $image = $request->poto->store('thumbnail');
        ModelEkstrakurikulermts::create([
            'gambar' => "gambar/".$file_name,
            'judul' => $request->judul,
        ]);
        Alert::success('Data berhasil ditambahkan', 'Success Message');
        return redirect("/admin/aksescepat/ekskul");
    }
    public function updateekskulmts(Request $request, $id)
    {
        Request()->validate([
            'judul' => 'required',
        ], [
            'judul.required' => 'Wajib diisi!!!',
        ]);

        $ekskul = ModelEkstrakurikulermts::find($id);
        if (Request()->hasFile('gambar')) {
            if (Storage::exists($ekskul->gambar)) {
                Storage::delete($ekskul->gambar);
            }
            $file_name = $request->gambar->getClientOriginalName();
            $image = $request->gambar->storeAs('public/gambar', $file_name);
                // $image = $request->poto->store('thumbnail');
            $ekskul->update([
                'gambar' => "gambar/".$file_name,
                'judul' => $request->judul,
            ]);
        } else {
            $ekskul->update([
                'judul' => $request->judul,
            ]);
        }
        
        Alert::success('Data berhasil diubah', 'Berhasil');
        return redirect("/admin/aksescepat/ekskul");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyekskulmts($id)
    {
        ModelEkstrakurikulermts::find($id)->delete();
        Alert::success('Data berhasil dihapus', 'Berhasil');
        return redirect('/admin/aksescepat/ekskul');
    }

    //Pondok
    public function storeekskulpondok(Request $request)
    {
        Request()->validate([
            'gambar' => 'required',
            'judul' => 'required',
        ], [
            'gambar.required' => 'Wajib diisi!!!',
            'judul.required' => 'Wajib diisi!!!',
        ]);

        $file_name = $request->gambar->getClientOriginalName();
        $image = $request->gambar->storeAs('public/gambar', $file_name);
            // $image = $request->poto->store('thumbnail');
        ModelEkstrakurikulerpondok::create([
            'gambar' => "gambar/".$file_name,
            'judul' => $request->judul,
        ]);
        Alert::success('Data berhasil ditambahkan', 'Success Message');
        return redirect("/admin/aksescepat/ekskul");
    }

    public function updateekskulpondok(Request $request, $id)
    {
        Request()->validate([
            'judul' => 'required',
        ], [
            'judul.required' => 'Wajib diisi!!!',
        ]);

        $ekskul = ModelEkstrakurikulerpondok::find($id);
        if (Request()->hasFile('gambar')) {
            if (Storage::exists($ekskul->gambar)) {
                Storage::delete($ekskul->gambar);
            }
            $file_name = $request->gambar->getClientOriginalName();
            $image = $request->gambar->storeAs('public/gambar', $file_name);
                // $image = $request->poto->store('thumbnail');
            $ekskul->update([
                'gambar' => "gambar/".$file_name,
                'judul' => $request->judul,
            ]);
        } else {
            $ekskul->update([
                'judul' => $request->judul,
            ]);
        }
        
        Alert::success('Data berhasil diubah', 'Berhasil');
        return redirect("/admin/aksescepat/ekskul");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyekskulpondok($id)
    {
        ModelEkstrakurikulerpondok::find($id)->delete();
        Alert::success('Data berhasil dihapus', 'Berhasil');
        return redirect('/admin/aksescepat/ekskul');
    }
}
