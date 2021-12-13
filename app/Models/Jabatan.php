<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Jabatan
 * 
 * @property int $ID_JABATAN
 * @property string $NAMA_JABATAN
 * 
 * @property Collection|Pegawai[] $pegawais
 *
 * @package App\Models
 */
class Jabatan extends Model
{
	protected $table = 'jabatan';
	protected $primaryKey = 'ID_JABATAN';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'ID_JABATAN' => 'int'
	];

	protected $fillable = [
		'NAMA_JABATAN'
	];

	public function pegawais()
	{
		return $this->hasMany(Pegawai::class, 'ID_JABATAN');
	}
}
