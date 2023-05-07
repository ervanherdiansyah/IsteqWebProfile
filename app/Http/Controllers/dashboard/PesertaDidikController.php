<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ModelHome;
use App\ModelHeader;
use App\ModelKotak;
Use Alert;
use App\ModelBackground;
use App\ModelPDMts;
use App\ModelPDPesantren;
use App\ModelPDSma;
use Illuminate\Support\Facades\Storage;

class PesertaDidikController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pdmts = ModelPDMts::select('pdlaki','pdperempuan','id')->selectRaw('(pdlaki + pdperempuan) as total')->get();
        $pdsma = ModelPDSma::select('pdlaki','pdperempuan','id')->selectRaw('(pdlaki + pdperempuan) as total')->get();
        $pdpesantren = ModelPDPesantren::select('pdlaki','pdperempuan','id')->selectRaw('(pdlaki + pdperempuan) as total')->get();
        return view('dashboard.home.pesertadidik',compact('pdmts','pdsma','pdpesantren'));
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
            'pdlaki' => 'required',
            'pdperempuan' => 'required',
        ], [
            'pdlaki.required' => 'Wajib diisi!!!',
            'pdperempuan.required' => 'Wajib diisi!!!',
        ]);

        ModelPDMts::create([
            'pdlaki' => $request->pdlaki,
            'pdperempuan' => $request->pdperempuan,
        ]);
        Alert::success('Data berhasil ditambahkan', 'Success Message');
        return redirect("/admin/siswa");
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
            'pdlaki' => 'required',
            'pdperempuan' => 'required',
        ], [
            'pdlaki.required' => 'Wajib diisi!!!',
            'pdperempuan.required' => 'Wajib diisi!!!',
        ]);

        $data = [
            'pdlaki' => $request->pdlaki,
            'pdperempuan' => $request->pdperempuan,
        ];
        ModelPDMts::find($id)->update($data);
        
        Alert::success('Data berhasil diubah', 'Berhasil');
        return redirect("/admin/siswa");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ModelPDMts::find($id)->delete();
        Alert::success('Data berhasil dihapus', 'Berhasil');
        return redirect('/admin/siswa');
    }

    // SMA

    public function storesma(Request $request)
    {
        Request()->validate([
            'pdlaki' => 'required',
            'pdperempuan' => 'required',
        ], [
            'pdlaki.required' => 'Wajib diisi!!!',
            'pdperempuan.required' => 'Wajib diisi!!!',
        ]);

        ModelPDSma::create([
            'pdlaki' => $request->pdlaki,
            'pdperempuan' => $request->pdperempuan,
        ]);
        Alert::success('Data berhasil ditambahkan', 'Success Message');
        return redirect("/admin/siswa");
    }

    public function updatesma(Request $request, $id)
    {
        Request()->validate([
            'pdlaki' => 'required',
            'pdperempuan' => 'required',
        ], [
            'pdlaki.required' => 'Wajib diisi!!!',
            'pdperempuan.required' => 'Wajib diisi!!!',
        ]);

        $data = [
            'pdlaki' => $request->pdlaki,
            'pdperempuan' => $request->pdperempuan,
        ];
        ModelPDSma::find($id)->update($data);
        
        Alert::success('Data berhasil diubah', 'Berhasil');
        return redirect("/admin/siswa");
    }

    public function destroysma($id)
    {
        ModelPDSma::find($id)->delete();
        Alert::success('Data berhasil dihapus', 'Berhasil');
        return redirect('/admin/siswa');
    }

    // Pesantren

    public function storepesantren(Request $request)
    {
        Request()->validate([
            'pdlaki' => 'required',
            'pdperempuan' => 'required',
        ], [
            'pdlaki.required' => 'Wajib diisi!!!',
            'pdperempuan.required' => 'Wajib diisi!!!',
        ]);

        ModelPDPesantren::create([
            'pdlaki' => $request->pdlaki,
            'pdperempuan' => $request->pdperempuan,
        ]);
        Alert::success('Data berhasil ditambahkan', 'Success Message');
        return redirect("/admin/siswa");
    }

    public function updatepesantren(Request $request, $id)
    {
        Request()->validate([
            'pdlaki' => 'required',
            'pdperempuan' => 'required',
        ], [
            'pdlaki.required' => 'Wajib diisi!!!',
            'pdperempuan.required' => 'Wajib diisi!!!',
        ]);

        $data = [
            'pdlaki' => $request->pdlaki,
            'pdperempuan' => $request->pdperempuan,
        ];
        ModelPDPesantren::find($id)->update($data);
        
        Alert::success('Data berhasil diubah', 'Berhasil');
        return redirect("/admin/siswa");
    }

    public function destroypesantren($id)
    {
        ModelPDPesantren::find($id)->delete();
        Alert::success('Data berhasil dihapus', 'Berhasil');
        return redirect('/admin/siswa');
    }
}
