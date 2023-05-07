<?php

namespace App\Http\Controllers\landing\unit;

use App\Http\Controllers\Controller;
use App\ModelEkstrakurikuler;
use App\ModelEkstrakurikulermts;
use App\ModelEkstrakurikulerpondok;
use Illuminate\Http\Request;

class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ekskulsma = ModelEkstrakurikuler::get();
        $ekskulmts = ModelEkstrakurikulermts::get();
        $ekskulpondok = ModelEkstrakurikulerpondok::get();
        return view('home.unit.detail', compact('ekskulsma','ekskulmts','ekskulpondok'));
    }

    public function ShowAllUnit()
    {
        $ekskulsma = ModelEkstrakurikuler::get();
        $ekskulmts = ModelEkstrakurikulermts::get();
        $ekskulpondok = ModelEkstrakurikulerpondok::get();
        return view('home.unit.index',compact('ekskulsma','ekskulmts','ekskulpondok'));
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
