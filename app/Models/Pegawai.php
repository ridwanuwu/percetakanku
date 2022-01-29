<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Pegawai
 * 
 * @property string $ID_PEGAWAI
 * @property string $ID_JABATAN
 * @property string $NAMA_PEGAWAI
 * @property string $ALAMAT_PEGAWAI
 * @property Carbon $TGL_LAHIR_PEGAWAI
 * @property string $TELP_PEGAWAI
 * @property string $EMAIL_PEGAWAI
 * @property string $PASSWORD
 * @property bool $STATUS_PEGAWAI
 * 
 * @property Jabatan $jabatan
 * @property Collection|Pembayaran[] $pembayarans
 * @property Collection|Pemesanan[] $pemesanans
 *
 * @package App\Models
 */
class Pegawai extends Model
{
	protected $table = 'pegawai';
	protected $primaryKey = 'ID_PEGAWAI';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'STATUS_PEGAWAI' => 'bool'
	];

	protected $dates = [
		'TGL_LAHIR_PEGAWAI'
	];

	protected $fillable = [
		'ID_JABATAN',
		'NAMA_PEGAWAI',
		'ALAMAT_PEGAWAI',
		'TGL_LAHIR_PEGAWAI',
		'TELP_PEGAWAI',
		'EMAIL_PEGAWAI',
		'PASSWORD',
		'STATUS_PEGAWAI'
	];

	public function jabatan()
	{
		return $this->belongsTo(Jabatan::class, 'ID_JABATAN');
	}

	public function pembayarans()
	{
		return $this->hasMany(Pembayaran::class, 'ID_PEGAWAI');
	}

	public function pemesanans()
	{
		return $this->hasMany(Pemesanan::class, 'ID_PEGAWAI');
	}
}
