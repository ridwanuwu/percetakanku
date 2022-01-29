<?php

use App\Http\Controllers\dashboardCont;
use App\Http\Controllers\pelangganpesanCon;
use App\Http\Controllers\detailCon;
use App\Http\Controllers\detailAdminCon;
use App\Http\Controllers\pemesananCon;
use App\Http\Controllers\pembayaranCon;
use App\Http\Controllers\adminCon;
use App\Http\Controllers\userCon;
use App\Http\Controllers\bahanCon;
use App\Http\Controllers\ukuranCon;
use App\Http\Controllers\layananCon;
use App\Http\Controllers\kelurahanCon;
use App\Http\Controllers\kecamatanCon;
use App\Http\Controllers\kotaCon;
use App\Http\Controllers\provinsiCon;
use App\Http\Controllers\jabatanCon;
use App\Http\Controllers\pelangganCon;
use App\Http\Controllers\pegawaiCon;
use App\Http\Controllers\pesananUserCon;
use App\Http\Controllers\pembayaranUserCon;
use Doctrine\DBAL\Driver\Middleware;
use Illuminate\Routing\Route as RoutingRoute;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;
 
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    // return view('welcome');
    return view('dashboard');
});

Route::middleware(['middleware'=>'PreventBackHistory'])->group(function(){
    Auth::routes();
});

Route::get('/dashboard', [dashboardCont::class, 'index']);
Route::resource('custpesan',pelangganpesanCon::class);

// Route::get('print-pdf/{type}/{id}', [pemesananCon::class,'getPDF']);
// Route::get('/pesan/cetak_pdf/', [pemesananCon::class,'cetak_pdf'])->name('pesan.pdf');
// Route::get('/pesan/print/{id}', [pemesananCon::class,'export']); 
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//email:admin@gmail.com pass:admin12345
//email:user@gmail.com pass:user12345

Route::group(['prefix'=>'admin', 'middleware'=>['isAdmin','auth','PreventBackHistory']], function(){
    Route::get('dashboard',[adminCon::class,'index'])->name('admin.dashboard');
    Route::resource('pesan',pemesananCon::class);
    Route::get('pesan/status/{id}',[pemesananCon::class,'status']);
    Route::resource('detailadmin',detailAdminCon::class);
    Route::resource('bayar',pembayaranCon::class);
    Route::get('bayar/status/{id}',[pembayaranCon::class,'status']);
    Route::resource('bahan',bahanCon::class);
    Route::resource('ukuran',ukuranCon::class);
    Route::resource('layanan',layananCon::class);
    Route::resource('kelurahan',kelurahanCon::class);
    Route::resource('kecamatan',kecamatanCon::class);
    Route::resource('kota',kotaCon::class);
    Route::resource('provinsi',provinsiCon::class);
    Route::resource('jabatan',jabatanCon::class);
    Route::resource('pelanggan',pelangganCon::class);
    Route::resource('pegawai',pegawaiCon::class);
});

Route::group(['prefix'=>'user', 'middleware'=>['isUser','auth','PreventBackHistory']], function(){
    Route::get('dashboard',[userCon::class,'index'])->name('user.dashboard');
    Route::resource('pesanUser',pesananUserCon::class);
    Route::get('pesanUser/status/{id}',[pesananUserCon::class,'status']);
    Route::resource('detail',detailCon::class);
    Route::resource('bayarUser',pembayaranUserCon::class);
    // Route::get('bayarUser/status/{id}',[pembayaranUserCon::class,'status']);
});

