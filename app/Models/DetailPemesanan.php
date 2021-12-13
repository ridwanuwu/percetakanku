<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class DetailPemesanan
 * 
 * @property int $ID_PEMESANAN
 * @property int $ID_MENU
 * @property int $ID_DETAIL_PESAN
 * @property int $QTY
 * @property int $JUMLAHHALAMAN
 * @property boolean $DESAIN
 * @property float|null $HARGABAYAR
 * @property string|null $KETERANGANDETAIL
 * 
 * @property Pemesanan $pemesanan
 * @property MenuLayanan $menu_layanan
 *
 * @package App\Models
 */
class DetailPemesanan extends Model
{
	protected $table = 'detail_pemesanan';
	public $incrementing = true;
	public $timestamps = false;

	protected $casts = [
		'ID_DETAIL_PESAN' => 'int',
		'ID_PEMESANAN' => 'int',
		'ID_MENU' => 'int',
		'QTY' => 'int',
		'JUMLAHHALAMAN' => 'int',
		'DESAIN' => 'boolean',
		'HARGABAYAR' => 'float'
	];

	protected $fillable = [
		'ID_DETAIL_PESAN',
		'ID_PEMESANAN',
		'ID_MENU',
		'QTY',
		'JUMLAHHALAMAN',
		'DESAIN',
		'HARGABAYAR',
		'KETERANGANDETAIL'
	];

	public function pemesanan()
	{
		return $this->belongsTo(Pemesanan::class, 'ID_PEMESANAN');
	}

	public function menu_layanan()
	{
		return $this->belongsTo(MenuLayanan::class, 'ID_MENU');
	}
}
