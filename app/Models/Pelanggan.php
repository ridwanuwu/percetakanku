<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Pelanggan
 * 
 * @property string $NO_PELANGGAN
 * @property int $ID_KELURAHAN
 * @property string $NAMA_PELANGGAN
 * @property string $ALAMAT_PELANGGAN
 * @property string $NOMOR_PELANGGAN
 * @property string|null $EMAIL_PELANGGAN
 * 
 * @property Kelurahan $kelurahan
 * @property Collection|Pemesanan[] $pemesanans
 *
 * @package App\Models
 */
class Pelanggan extends Model
{
	protected $table = 'pelanggan';
	protected $primaryKey = 'NO_PELANGGAN';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'ID_KELURAHAN' => 'int'
	];

	protected $fillable = [
		'ID_KELURAHAN',
		'NAMA_PELANGGAN',
		'ALAMAT_PELANGGAN',
		'NOMOR_PELANGGAN',
		'EMAIL_PELANGGAN'
	];

	public function kelurahan()
	{
		return $this->belongsTo(Kelurahan::class, 'ID_KELURAHAN');
	}

	public function pemesanans()
	{
		return $this->hasMany(Pemesanan::class, 'NO_PELANGGAN');
	}
}
