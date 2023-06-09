<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ModelHome;
use App\ModelHeader;
use App\ModelKotak;
Use Alert;
use App\ModelBackground;
use App\ModelLogo;
use App\ModelProgramUnggulan;
use Illuminate\Support\Facades\Storage;

class DashboardController extends Controller
{
    //BackEnd Home
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $home = ModelHome::get();
        $header = ModelHeader::get();
        $kotak = ModelKotak::get();
        $background = ModelBackground::get();
        $logo = ModelLogo::get();
        $program = ModelProgramUnggulan::get();
        return view('dashboard.home.dashboard',compact('home','header','kotak','background','logo','program'));
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
            'judul' => 'required',
            'deskripsi' => 'required',
            'video' => 'required',
        ], [
            'gambar.required' => 'Wajib diisi!!!',
            'judul.required' => 'Wajib diisi!!!',
            'deskripsi.required' => 'Wajib diisi!!!',
            'video.required' => 'Wajib diisi!!!',
        ]);

        $file_name = $request->gambar->getClientOriginalName();
        $image = $request->gambar->storeAs('public/gambar', $file_name);
            // $image = $request->poto->store('thumbnail');
        ModelHome::create([
            'gambar' => "gambar/".$file_name,
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'video' => $request->video,
        ]);
        Alert::success('Data berhasil ditambahkan', 'Success Message');
        return redirect("/admin/dashboard");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
    public function update(Request $request, $id)
    {
        Request()->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'video' => 'required',
        ], [
            'judul.required' => 'Wajib diisi!!!',
            'deskripsi.required' => 'Wajib diisi!!!',
            'video.required' => 'Wajib diisi!!!',
        ]);

        $home = ModelHome::find($id);
        if (Request()->hasFile('gambar')) {
            if (Storage::exists($home->gambar)) {
                Storage::delete($home->gambar);
            }
            $file_name = $request->gambar->getClientOriginalName();
            $image = $request->gambar->storeAs('public/gambar', $file_name);
                // $image = $request->poto->store('thumbnail');
            $home->update([
                'gambar' => "gambar/".$file_name,
                'judul' => $request->judul,
                'deskripsi' => $request->deskripsi,
                'video' => $request->video,
            ]);
        } else {
            $home->update([
                'judul' => $request->judul,
                'deskripsi' => $request->deskripsi,
                'video' => $request->video,
            ]);
        }
        
        Alert::success('Data berhasil diubah', 'Berhasil');
        return redirect("/admin/dashboard");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ModelHome::find($id)->delete();
        Alert::success('Data berhasil dihapus', 'Berhasil');
        return redirect('/admin/dashboard');
    }

    //BackEnd Header

    public function indexheader()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createheader()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeheader(Request $request)
    {
        Request()->validate([
            'email' => 'required',
            'nohp' => 'required',
            'twiter' => 'required',
            'facebook' => 'required',
            'instagram' => 'required',
            'youtube' => 'required',
            'tiktok' => 'required',
        ], [
            'email.required' => 'Wajib diisi!!!',
            'nohp.required' => 'Wajib diisi!!!',
            'twiter.required' => 'Wajib diisi!!!',
            'facebook.required' => 'Wajib diisi!!!',
            'instagram.required' => 'Wajib diisi!!!',
            'youtube.required' => 'Wajib diisi!!!',
            'tiktok.required' => 'Wajib diisi!!!',
        ]);

        ModelHeader::create([
            'email' => $request->email,
            'nohp' => $request->nohp,
            'twiter' => $request->twiter,
            'facebook' => $request->facebook,
            'instagram' => $request->instagram,
            'youtube' => $request->youtube,
            'tiktok' => $request->tiktok,
        ]);
        Alert::success('Data berhasil ditambahkan', 'Success Message');
        return redirect("/admin/dashboard");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showheader($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editheader($id)
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
    public function updateheader(Request $request, $id)
    {
        Request()->validate([
            'email' => 'required',
            'nohp' => 'required',
            'twiter' => 'required',
            'facebook' => 'required',
            'instagram' => 'required',
            'youtube' => 'required',
            'tiktok' => 'required',
        ], [
            'email.required' => 'Wajib diisi!!!',
            'nohp.required' => 'Wajib diisi!!!',
            'twiter.required' => 'Wajib diisi!!!',
            'facebook.required' => 'Wajib diisi!!!',
            'instagram.required' => 'Wajib diisi!!!',
            'youtube.required' => 'Wajib diisi!!!',
            'tiktok.required' => 'Wajib diisi!!!',
        ]);

        $data = [
            'email' => $request->email,
            'nohp' => $request->nohp,
            'twiter' => $request->twiter,
            'facebook' => $request->facebook,
            'instagram' => $request->instagram,
            'youtube' => $request->youtube,
            'tiktok' => $request->tiktok,
        ];
        ModelHeader::find($id)->update($data);
        
        Alert::success('Data berhasil diubah', 'Berhasil');
        return redirect("/admin/dashboard");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyheader($id)
    {
        ModelHeader::find($id)->delete();
        Alert::success('Data berhasil dihapus', 'Berhasil');
        return redirect('/admin/dashboard');
    }

    //BackEnd Kotak

    public function indexkotak()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createkotak()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storekotak(Request $request)
    {
        Request()->validate([
            'judul1' => 'required',
            'judul2' => 'required',
            'judul3' => 'required',
        ], [
            'judul1.required' => 'Wajib diisi!!!',
            'judul2.required' => 'Wajib diisi!!!',
            'judul3.required' => 'Wajib diisi!!!',
        ]);

        ModelKotak::create([
            'judul1' => $request->judul1,
            'judul2' => $request->judul2,
            'judul3' => $request->judul3,
        ]);
        Alert::success('Data berhasil ditambahkan', 'Success Message');
        return redirect("/admin/dashboard");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showkotak($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editkotak($id)
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
    public function updatekotak(Request $request, $id)
    {
        Request()->validate([
            'judul1' => 'required',
            'judul2' => 'required',
            'judul3' => 'required',
        ], [
            'judul1.required' => 'Wajib diisi!!!',
            'judul2.required' => 'Wajib diisi!!!',
            'judul3.required' => 'Wajib diisi!!!',
        ]);

        $data = [
            'judul1' => $request->judul1,
            'judul2' => $request->judul2,
            'judul3' => $request->judul3,
        ];
        ModelKotak::find($id)->update($data);
        
        Alert::success('Data berhasil diubah', 'Berhasil');
        return redirect("/admin/dashboard");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroykotak($id)
    {
        ModelKotak::find($id)->delete();
        Alert::success('Data berhasil dihapus', 'Berhasil');
        return redirect('/admin/dashboard');
    }

    //Background
    public function storebg(Request $request)
    {
        Request()->validate([
            'gambar' => 'required',
        ], [
            'gambar.required' => 'Wajib diisi!!!',
        ]);

        $file_name = $request->gambar->getClientOriginalName();
        $image = $request->gambar->storeAs('public/gambar', $file_name);
            // $image = $request->poto->store('thumbnail');
        ModelBackground::create([
            'gambar' => "gambar/".$file_name,
        ]);
        Alert::success('Data berhasil ditambahkan', 'Success Message');
        return redirect("/admin/dashboard");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showbg($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editbg($id)
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
    public function updatebg(Request $request, $id)
    {
        $background = ModelBackground::find($id);
        if (Request()->hasFile('gambar')) {
            if (Storage::exists($background->gambar)) {
                Storage::delete($background->gambar);
            }
            $file_name = $request->gambar->getClientOriginalName();
            $image = $request->gambar->storeAs('public/gambar', $file_name);
                // $image = $request->poto->store('thumbnail');
            $background->update([
                'gambar' => "gambar/".$file_name,
            ]);
        } else {
            $background->update([
            ]);
        }
        
        Alert::success('Data berhasil diubah', 'Berhasil');
        return redirect("/admin/dashboard");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroybg($id)
    {
        ModelBackground::find($id)->delete();
        Alert::success('Data berhasil dihapus', 'Berhasil');
        return redirect('/admin/dashboard');
    }

    // Logo

    public function storelogo(Request $request)
    {
        Request()->validate([
            'gambar' => 'required',
        ], [
            'gambar.required' => 'Wajib diisi!!!',
        ]);

        $file_name = $request->gambar->getClientOriginalName();
        $image = $request->gambar->storeAs('public/gambar', $file_name);
            // $image = $request->poto->store('thumbnail');
        ModelLogo::create([
            'gambar' => "gambar/".$file_name,
        ]);
        Alert::success('Data berhasil ditambahkan', 'Success Message');
        return redirect("/admin/dashboard");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showlogo($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editlogo($id)
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
    public function updatelogo(Request $request, $id)
    {
        $background = ModelLogo::find($id);
        if (Request()->hasFile('gambar')) {
            if (Storage::exists($background->gambar)) {
                Storage::delete($background->gambar);
            }
            $file_name = $request->gambar->getClientOriginalName();
            $image = $request->gambar->storeAs('public/gambar', $file_name);
                // $image = $request->poto->store('thumbnail');
            $background->update([
                'gambar' => "gambar/".$file_name,
            ]);
        } else {
            $background->update([
            ]);
        }
        
        Alert::success('Data berhasil diubah', 'Berhasil');
        return redirect("/admin/dashboard");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroylogo($id)
    {
        ModelLogo::find($id)->delete();
        Alert::success('Data berhasil dihapus', 'Berhasil');
        return redirect('/admin/dashboard');
    }

    //BackEnd Program

    public function indexprogram()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createprogram()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeprogram(Request $request)
    {
        Request()->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
        ], [
            'judul.required' => 'Wajib diisi!!!',
            'deskripsi.required' => 'Wajib diisi!!!',
        ]);

        ModelProgramUnggulan::create([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
        ]);
        Alert::success('Data berhasil ditambahkan', 'Success Message');
        return redirect("/admin/dashboard");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showprogram($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editprogram($id)
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
    public function updateprogram(Request $request, $id)
    {
        Request()->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
        ], [
            'judul.required' => 'Wajib diisi!!!',
            'deskripsi.required' => 'Wajib diisi!!!',
        ]);

        $data = [
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
        ];
        ModelProgramUnggulan::find($id)->update($data);
        
        Alert::success('Data berhasil diubah', 'Berhasil');
        return redirect("/admin/dashboard");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyprogram($id)
    {
        ModelProgramUnggulan::find($id)->delete();
        Alert::success('Data berhasil dihapus', 'Berhasil');
        return redirect('/admin/dashboard');
    }
}
