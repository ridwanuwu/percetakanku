<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Kecamatan
 * 
 * @property int $ID_KECAMATAN
 * @property int $ID_KOTA
 * @property string $NAMA_KECAMATAN
 * 
 * @property Kotum $kotum
 * @property Collection|Kelurahan[] $kelurahans
 *
 * @package App\Models
 */
class Kecamatan extends Model
{
	protected $table = 'kecamatan';
	protected $primaryKey = 'ID_KECAMATAN';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'ID_KECAMATAN' => 'int',
		'ID_KOTA' => 'int'
	];

	protected $fillable = [
		'ID_KOTA',
		'NAMA_KECAMATAN'
	];

	public function kotum()
	{
		return $this->belongsTo(Kotum::class, 'ID_KOTA');
	}

	public function kelurahans()
	{
		return $this->hasMany(Kelurahan::class, 'ID_KECAMATAN');
	}
}
