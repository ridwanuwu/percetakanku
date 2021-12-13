<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Bahan
 * 
 * @property int $ID_BAHAN
 * @property string $NAMA_BAHAN
 * 
 * @property Collection|MenuLayanan[] $menu_layanans
 *
 * @package App\Models
 */
class Bahan extends Model
{
	protected $table = 'bahan';
	protected $primaryKey = 'ID_BAHAN';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'ID_BAHAN' => 'int'
	];

	protected $fillable = [
		'NAMA_BAHAN'
	];

	public function menu_layanans()
	{
		return $this->hasMany(MenuLayanan::class, 'ID_BAHAN');
	}
}
