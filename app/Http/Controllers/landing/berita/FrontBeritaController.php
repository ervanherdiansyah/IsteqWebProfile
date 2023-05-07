<?php

namespace App\Http\Controllers\landing\berita;

use App\Http\Controllers\Controller;
use App\ModelBerita;
use App\ModelBeritaKategori;
use Illuminate\Http\Request;

class FrontBeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $berita = ModelBerita::where('is_active', 1)->get();
        $kategori = ModelBeritaKategori::get();
        return view('home.akses-cepat.berita.index', compact('berita', 'kategori'));
    }

    public function DetailBerita($id)
    {
        $berita = ModelBerita::find($id);
        $recent = ModelBerita::where('is_active', 1)->get();
        $kategori = ModelBeritaKategori::get();
        return view('home.akses-cepat.berita.detail', compact('berita','recent','kategori'));
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
