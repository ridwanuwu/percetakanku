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
        
        $pesans = Pemesanan::with('pegawai','pelanggan')->paginate(5);
        $menu = MenuLayanan::all();
        return view('pemesanan.index', compact('pesans','menu','nomerdet','jmlpesan','jmlpelanggan','selesai'));
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
    
        return view('pemesanan.create', compact('pesans','pegawai','pelanggan','nomer'));
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

        return redirect()->route('pesan.index')->with('success','Data Berhasil di Input');
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

    public function status($ID_PEMESANAN){
        $data = DB::table('pemesanan')->where('ID_PEMESANAN',$ID_PEMESANAN)->first();
 
        $status_sekarang = $data->STATUS_PEMESANAN;
 
        if($status_sekarang == 1){
            \DB::table('pemesanan')->where('ID_PEMESANAN',$ID_PEMESANAN)->update([
                'STATUS_PEMESANAN'=>0
            ]);
        }else{
            \DB::table('pemesanan')->where('ID_PEMESANAN',$ID_PEMESANAN)->update([
                'STATUS_PEMESANAN'=>1
            ]);
        }
        \Session::flash('sukses','Status berhasil di ubah');
 
        return redirect('admin/pesan');
    }

    function getPDF($type){
        $data = [
            // 'Invoice' => $ID_PEMESANAN,
            // 'Pesan' => ,
            // 'date' => date('m/d/Y')
        ];


        // $data = DB::table('pemesanan')->where('ID_PEMESANAN',$ID_PEMESANAN)->first();
        $pdf = app('dompdf.wrapper')->loadView('invoice',$data);

    
        if ($type == 'stream') {
            return $pdf->stream('invoice.pdf');
        }
    
        if ($type == 'download') {
            return $pdf->download('invoice.pdf');
        }
    }

    public function cetak_pdf(Request $request)
    {
        $id = $request->query('ID_PEMESANAN');
    	$pemesanan = Pemesanan::where('ID_PEMESANAN', $id)->first();
 
        // return view('permohonan_pdf',['permohonan'=>$permohonan]);
    	$pdf = app('dompdf.wrapper')->loadview('invoice');
    	return $pdf->stream('invoice-'.$id.'.pdf');
    }

    public function export($ID_PEMESANAN)
    {
        $pdf = PDF::loadView('invoice', compact('ID_PEMESANAN'));
    
       return $pdf->download('invoice-'.$ID_PEMESANAN.'.pdf');
    }
}
