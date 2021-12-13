<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Pemesanan
 * 
 * @property int $ID_PEMESANAN
 * @property int $ID_PEGAWAI
 * @property int $NO_PELANGGAN
 * @property string|null $ALAMAT_KIRIM
 * @property Carbon $TANGGAL_PEMESANAN
 * @property bool $METODE_PEMBAYARAN
 * @property float|null $DP_PEMESANAN
 * @property float|null $TOTAL_PEMESANAN
 * @property string|null $KETERANGAN_PEMESANAN
 * @property bool $STATUS_PEMESANAN
 * 
 * @property Pegawai $pegawai
 * @property Pelanggan $pelanggan
 * @property Collection|DetailPemesanan[] $detail_pemesanans
 * @property Collection|Pembayaran[] $pembayarans
 *
 * @package App\Models
 */
class Pemesanan extends Model
{
	protected $table = 'pemesanan';
	protected $primaryKey = 'ID_PEMESANAN';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'ID_PEMESANAN' => 'int',
		'ID_PEGAWAI' => 'int',
		'NO_PELANGGAN' => 'int',
		'METODE_PEMBAYARAN' => 'bool',
		'DP_PEMESANAN' => 'float',
		'TOTAL_PEMESANAN' => 'float',
		'STATUS_PEMESANAN' => 'bool'
	];

	protected $dates = [
		'TANGGAL_PEMESANAN'
	];

	protected $fillable = [
		'ID_PEMESANAN',
		'ID_PEGAWAI',
		'NO_PELANGGAN',
		'ALAMAT_KIRIM',
		'TANGGAL_PEMESANAN',
		'METODE_PEMBAYARAN',
		'DP_PEMESANAN',
		'TOTAL_PEMESANAN',
		'KETERANGAN_PEMESANAN',
		'STATUS_PEMESANAN'
	];

	public function pegawai()
	{
		return $this->belongsTo(Pegawai::class, 'ID_PEGAWAI');
	}

	public function pelanggan()
	{
		return $this->belongsTo(Pelanggan::class, 'NO_PELANGGAN');
	}

	public function detail_pemesanans()
	{
		return $this->hasMany(DetailPemesanan::class, 'ID_PEMESANAN');
	}

	public function pembayarans()
	{
		return $this->hasMany(Pembayaran::class, 'ID_PEMESANAN');
	}
}
