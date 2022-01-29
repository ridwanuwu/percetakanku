<?php
 
namespace App\Http\Controllers;

use App\Models\DetailPemesanan;
use Illuminate\Support\Carbon;
use App\Models\Pegawai;
use App\Models\Pelanggan;
use App\Models\Pemesanan;
use App\Models\MenuLayanan;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon as CarbonCarbon;
use Illuminate\Http\Request;
use PDF;

class pesananUserCon extends Controller
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
        $cek = DetailPemesanan::count();
        if($cek == 0) {
            $urut = 10001;
            $nomerdet = 'DT-' . $thnBulan . $urut;
            // dd($nomer);
        } else {
            $ambil = DetailPemesanan::all()->last();
            $urut = (int)substr($ambil->ID_DETAIL_PESAN, -5) +1;
            $nomerdet = 'DT-' . $thnBulan . $urut;
        }

        $jmlpesan = Pemesanan::count();
        $jmlpelanggan = Pelanggan::count();
        $selesai = Pemesanan::select("*")
                                ->where("STATUS_PEMESANAN", "=", 1)
                                ->count();
        
        $pesans = Pemesanan::latest()->with('pegawai','pelanggan')->paginate(5);
        $menu = MenuLayanan::all();
        return view('pemesananUser.index', compact('pesans','menu','nomerdet','jmlpesan','jmlpelanggan','selesai'));
   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $tanggals = Carbon::now()->format('Y-m-d');
        $now = Carbon::now();
        $thnBulan = $now->year .'.'. $now->month .'.'. $now->day. '.';
        $cek = Pemesanan::count();
        if($cek == 0) {
            $urut = 10001;
            $nomer = 'TR-' . $thnBulan . $urut;
            // dd($nomer);
        } else {
            $ambil = Pemesanan::all()->last();
            $urut = (int)substr($ambil->ID_PEMESANAN, -5) +1;
            $nomer = 'TR-' . $thnBulan . $urut;
        }

        $pesans = Pemesanan::with('pelanggan')->paginate(15);
        $pegawai = Pegawai::all();
        $pelanggan = Pelanggan::all();
    
        return view('pemesananUser.create', compact('pesans','pegawai','pelanggan','nomer'));
   
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
        $request->validate([
            'ID_PEMESANAN' => 'required',
            'ID_PEGAWAI' => 'required',
            'NO_PELANGGAN' => 'required',
 
        ]);
        Pemesanan::create($request->all());

        return redirect()->route('pesanUser.index')->with('success','Data Berhasil di Input');
    
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
