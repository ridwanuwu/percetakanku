<?php

namespace App\Http\Controllers;

use App\Models\DetailPemesanan;
use Illuminate\Support\Carbon;
use App\Models\Pegawai;
use App\Models\Pelanggan;
use App\Models\Pemesanan;
use App\Models\Pembayaran;
use App\Models\MenuLayanan;
use Carbon\Carbon as CarbonCarbon;
use Illuminate\Http\Request;

class pembayaranCon extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $tanggals = Carbon::now()->format('Y-m-d');
        $now = Carbon::now();
        $thnBulan = $now->year .'.'. $now->month .'.'. $now->day. '.';
        $cek = Pembayaran::count();
        if($cek == 0) {
            $urut = 10001;
            $nomerdet = 'DT-' . $thnBulan . $urut;
            // dd($nomer);
        } else {
            $ambil = Pembayaran::all()->last();
            $urut = (int)substr($ambil->ID_PEMBAYARAN, -5) +1;
            $nomerdet = 'DT-' . $thnBulan . $urut;
        }

        $bayars = Pembayaran::with('pegawai','pemesanan')->paginate(15);
        $menu = MenuLayanan::all();
        return view('pembayaran.index', compact('bayars','menu','nomerdet'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tanggals = Carbon::now()->format('Y-m-d');
        $now = Carbon::now();
        $thnBulan = $now->year .'.'. $now->month .'.'. $now->day. '.';
        $cek = Pembayaran::count();
        if($cek == 0) {
            $urut = 10001;
            $nomer = 'BY-' . $thnBulan . $urut;
            // dd($nomer);
        } else {
            $ambil = Pembayaran::all()->last();
            $urut = (int)substr($ambil->ID_PEMBAYARAN, -5) +1;
            $nomer = 'BY-' . $thnBulan . $urut;
        }

        $bayars = Pembayaran::paginate(15);
        $pegawai = Pegawai::all();
        $pelanggan = Pelanggan::all();
        // $pesans = Pemesanan::where("select") {
        //                     ->where('BAYAR', '=', null)
        //                     ->orWhere('BAYAR', '=', 0);
        $pesans = Pemesanan::all();
    
        return view('pembayaran.create', compact('bayars','pegawai','pelanggan','nomer','pesans'));
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
            'ID_PEMBAYARAN' => 'required',
            'ID_PEGAWAI' => 'required',
 
        ]);
        Pembayaran::create($request->all());

        return redirect()->route('bayar.index')->with('success','Data Berhasil di Input');
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

    public function status($ID_PEMBAYARAN){
        $data = \DB::table('pembayaran')->where('ID_PEMBAYARAN',$ID_PEMBAYARAN)->first();
 
        $status_sekarang = $data->STATUS_BAYAR;
 
        if($status_sekarang == 1){
            \DB::table('pembayaran')->where('ID_PEMBAYARAN',$ID_PEMBAYARAN)->update([
                'STATUS_BAYAR'=>0
            ]);
        }else{
            \DB::table('pembayaran')->where('ID_PEMBAYARAN',$ID_PEMBAYARAN)->update([
                'STATUS_BAYAR'=>1
            ]);
        }
        \Session::flash('sukses','Status berhasil di ubah');
 
        return redirect('admin/bayar');
    }
}
