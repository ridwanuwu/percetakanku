<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class MenuLayanan
 * 
 * @property int $ID_MENU
 * @property int $ID_UKURAN
 * @property int $ID_LAYANAN
 * @property int $ID_BAHAN
 * @property string $NAMA_MENU
 * @property float $HARGA_MENU
 * 
 * @property Ukuran $ukuran
 * @property Layanan $layanan
 * @property Bahan $bahan
 * @property Collection|DetailPemesanan[] $detail_pemesanans
 *
 * @package App\Models
 */
class MenuLayanan extends Model
{
	protected $table = 'menu_layanan';
	protected $primaryKey = 'ID_MENU';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'ID_MENU' => 'int',
		'ID_UKURAN' => 'int',
		'ID_LAYANAN' => 'int',
		'ID_BAHAN' => 'int',
		'HARGA_MENU' => 'float'
	];

	protected $fillable = [
		'ID_UKURAN',
		'ID_LAYANAN',
		'ID_BAHAN',
		'NAMA_MENU',
		'HARGA_MENU'
	];

	public function ukuran()
	{
		return $this->belongsTo(Ukuran::class, 'ID_UKURAN');
	}

	public function layanan()
	{
		return $this->belongsTo(Layanan::class, 'ID_LAYANAN');
	}

	public function bahan()
	{
		return $this->belongsTo(Bahan::class, 'ID_BAHAN');
	}

	public function detail_pemesanans()
	{
		return $this->hasMany(DetailPemesanan::class, 'ID_MENU');
	}
}
