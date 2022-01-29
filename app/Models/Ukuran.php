<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Ukuran
 * 
 * @property string $ID_UKURAN
 * @property string $UKURAN
 * 
 * @property Collection|MenuLayanan[] $menu_layanans
 *
 * @package App\Models
 */
class Ukuran extends Model
{
	protected $table = 'ukuran';
	protected $primaryKey = 'ID_UKURAN';
	public $incrementing = false;
	public $timestamps = false;

	protected $fillable = [
		'UKURAN'
	];

	public function menu_layanans()
	{
		return $this->hasMany(MenuLayanan::class, 'ID_UKURAN');
	}
}
