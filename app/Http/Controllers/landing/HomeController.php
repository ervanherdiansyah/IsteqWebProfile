<?php

namespace App\Http\Controllers\landing;

use App\Http\Controllers\Controller;
use App\ModelAlumi;
use Illuminate\Http\Request;
use App\ModelHome;
use App\ModelHeader;
use App\ModelKotak;
use App\User;
use App\ModelBerita;
use App\ModelBeritaKategori;
use App\ModelBackground;
use App\ModelDivisi;
use App\ModelLogo;
use App\ModelPDMts;
use App\ModelPDPesantren;
use App\ModelPDSma;
use App\ModelProgramUnggulan;
use App\ModelSambutan;
use App\ModelTeam;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $home = ModelHome::first();
        $background = ModelBackground::first();
        $header = ModelHeader::first();
        $kotak = ModelKotak::get();
        $berita = ModelBerita::where('is_active', 1)->get();
        $kategori = ModelBeritaKategori::get();
        $sambutan = ModelSambutan::first();
        $pdmts = ModelPDMts::select('pdlaki','pdperempuan')->selectRaw('(pdlaki + pdperempuan) as total')->first();
        $pdsma = ModelPDSma::select('pdlaki','pdperempuan')->selectRaw('(pdlaki + pdperempuan) as total')->first();
        $pdpesantren = ModelPDPesantren::select('pdlaki','pdperempuan')->selectRaw('(pdlaki + pdperempuan) as total')->first();
        $alumi = ModelAlumi::get();
        $logo = ModelLogo::get();
        $program = ModelProgramUnggulan::get();
        $socials = ModelHeader::first();
        return view('home.index',compact('home','program','header','kotak','berita','kategori','background','sambutan','pdmts','pdsma','pdpesantren','alumi','logo', 'socials'));
    }

    public function showMaintenance()
    {
        return view('home.maintenance');
    }

    public function showBerita()
    {
        return view('home.akses-cepat.berita.index');
    }

    public function showSelayangPandang(){
        return view('home.tentang.selayangpandang.index');
    }

    public function showPendaftaran()
    {
        return view('home.pendaftaran.index');
    }

    public function showVideoProfil()
    {
        $home = ModelHome::first();
        $background = ModelBackground::first();
        $header = ModelHeader::first();
        $kotak = ModelKotak::get();
        $berita = ModelBerita::where('is_active', 1)->get();
        $kategori = ModelBeritaKategori::get();
        return view('home.vidprofil',compact('home','header','kotak','berita','kategori','background'));
    }

    public function showUnitSiswa()
    {
        return view('home.akses-cepat.unit.index');
    }

    public function showTentang()
    {
        return view('home.tentang.index');
    }

    public function showAksesCepat()
    {
        return view('home.akses-cepat.index');
    }

    public function showOrganisasi()
    {
        return view('home.tentang.organisasi.index');
    }

    public function showDivisi()
    {
        $divisi = ModelDivisi::get();
        return view('home.tentang.divisi.index', compact('divisi'));
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
