<?php

namespace App\Http\Controllers;

use App\Models\DetailPemesanan;
use App\Models\MenuLayanan;
use App\Models\Pemesanan;
use Illuminate\Http\Request;

class detailCon extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $details = DetailPemesanan::with('menu_layanan','pemesanan')->paginate(15);
        return view('detail.index', compact('details'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $menu = MenuLayanan::all();
        $pesans = Pemesanan::with('pegawai','pelanggan')->paginate(15);
        return view('detail.create', compact('menu','pesans'));
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
            // 'ID_PEMESANAN' => 'required',
            'ID_MENU' => 'required',
            'ID_DETAIL_PESAN' => 'required',
 
        ]);
        
        DetailPemesanan::create($request->all());

        return redirect()->route('pesan.index')->with('success','Data Berhasil di Input');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DetailPemesanan  $detailPemesanan
     * @return \Illuminate\Http\Response
     */
    public function show(DetailPemesanan $detailPemesanan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DetailPemesanan  $detailPemesanan
     * @return \Illuminate\Http\Response
     */
    public function edit(DetailPemesanan $detailPemesanan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DetailPemesanan  $detailPemesanan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DetailPemesanan $detailPemesanan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DetailPemesanan  $detailPemesanan
     * @return \Illuminate\Http\Response
     */
    public function destroy(DetailPemesanan $detailPemesanan)
    {
        //
    }
}
