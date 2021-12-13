<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Pembayaran
 * 
 * @property int $ID_PEMBAYARAN
 * @property int $ID_PEMESANAN
 * @property int $ID_PEGAWAI
 * @property Carbon $TANGGAL_PEMBAYARAN
 * @property bool $STATUS_BAYAR
 * @property boolean|null $BUKTI_BAYAR
 * @property string|null $NO_REKENING
 * 
 * @property Pegawai $pegawai
 * @property Pemesanan $pemesanan
 *
 * @package App\Models
 */
class Pembayaran extends Model
{
	protected $table = 'pembayaran';
	protected $primaryKey = 'ID_PEMBAYARAN';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'ID_PEMBAYARAN' => 'int',
		'ID_PEMESANAN' => 'int',
		'ID_PEGAWAI' => 'int',
		'STATUS_BAYAR' => 'bool',
		'BUKTI_BAYAR' => 'boolean'
	];

	protected $dates = [
		'TANGGAL_PEMBAYARAN'
	];

	protected $fillable = [
		'ID_PEMESANAN',
		'ID_PEGAWAI',
		'TANGGAL_PEMBAYARAN',
		'STATUS_BAYAR',
		'BUKTI_BAYAR',
		'NO_REKENING'
	];

	public function pegawai()
	{
		return $this->belongsTo(Pegawai::class, 'ID_PEGAWAI');
	}

	public function pemesanan()
	{
		return $this->belongsTo(Pemesanan::class, 'ID_PEMESANAN');
	}
}
