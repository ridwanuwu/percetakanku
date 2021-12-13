<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use App\Models\Pelanggan;
use App\Models\Pemesanan;
use Illuminate\Http\Request;

class pemesananCon extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $pesans = Pemesanan::with('pegawai','pelanggan')->paginate(15);
        return view('pemesanan.index', compact('pesans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pesans = Pemesanan::with('pelanggan')->paginate(15);
        $pegawai = Pegawai::all();
        $pelanggan = Pelanggan::all();
        return view('pemesanan.create', compact('pesans','pegawai','pelanggan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'ID_PEMESANAN' => 'required',
            'ID_PEGAWAI' => 'required',
            'NO_PELANGGAN' => 'required',
 
        ]);
        Pemesanan::create($request->all());

        return redirect()->route('detail.create')->with('success','Data Berhasil di Input');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pemesanan  $pemesanan
     * @return \Illuminate\Http\Response
     */
    public function show(Pemesanan $pemesanan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pemesanan  $pemesanan
     * @return \Illuminate\Http\Response
     */
    public function edit(Pemesanan $pemesanan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pemesanan  $pemesanan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pemesanan $pemesanan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pemesanan  $pemesanan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pemesanan $pemesanan)
    {
        //
    }
}
