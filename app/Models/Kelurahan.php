<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Kelurahan
 * 
 * @property int $ID_KELURAHAN
 * @property int $ID_KECAMATAN
 * @property string $NAMA_KELURAHAN
 * 
 * @property Kecamatan $kecamatan
 * @property Collection|Pelanggan[] $pelanggans
 *
 * @package App\Models
 */
class Kelurahan extends Model
{
	protected $table = 'kelurahan';
	protected $primaryKey = 'ID_KELURAHAN';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'ID_KELURAHAN' => 'int',
		'ID_KECAMATAN' => 'int'
	];

	protected $fillable = [
		'ID_KECAMATAN',
		'NAMA_KELURAHAN'
	];

	public function kecamatan()
	{
		return $this->belongsTo(Kecamatan::class, 'ID_KECAMATAN');
	}

	public function pelanggans()
	{
		return $this->hasMany(Pelanggan::class, 'ID_KELURAHAN');
	}
}
