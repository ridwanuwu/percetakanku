<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Kotum
 * 
 * @property int $ID_KOTA
 * @property int $ID_PROVINSI
 * @property string $NAMA_KOTA
 * 
 * @property Provinsi $provinsi
 * @property Collection|Kecamatan[] $kecamatans
 *
 * @package App\Models
 */
class Kotum extends Model
{
	protected $table = 'kota';
	protected $primaryKey = 'ID_KOTA';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'ID_KOTA' => 'int',
		'ID_PROVINSI' => 'int'
	];

	protected $fillable = [
		'ID_PROVINSI',
		'NAMA_KOTA'
	];

	public function provinsi()
	{
		return $this->belongsTo(Provinsi::class, 'ID_PROVINSI');
	}

	public function kecamatans()
	{
		return $this->hasMany(Kecamatan::class, 'ID_KOTA');
	}
}
