<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Provinsi
 * 
 * @property int $ID_PROVINSI
 * @property string $NAMA_PROVINSI
 * @property string|null $ID_LOKASI
 * @property string|null $STATUS
 * 
 * @property Collection|Kotum[] $kota
 *
 * @package App\Models
 */
class Provinsi extends Model
{
	protected $table = 'provinsi';
	protected $primaryKey = 'ID_PROVINSI';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'ID_PROVINSI' => 'int'
	];

	protected $fillable = [
		'NAMA_PROVINSI',
		'ID_LOKASI',
		'STATUS'
	];

	public function kota()
	{
		return $this->hasMany(Kotum::class, 'ID_PROVINSI');
	}
}
