<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Layanan
 * 
 * @property string $ID_LAYANAN
 * @property string $NAMA_LAYANAN
 * 
 * @property Collection|MenuLayanan[] $menu_layanans
 *
 * @package App\Models
 */
class Layanan extends Model
{
	protected $table = 'layanan';
	protected $primaryKey = 'ID_LAYANAN';
	public $incrementing = false;
	public $timestamps = false;

	protected $fillable = [
		'NAMA_LAYANAN'
	];

	public function menu_layanans()
	{
		return $this->hasMany(MenuLayanan::class, 'ID_LAYANAN');
	}
}
