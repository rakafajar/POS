<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProdukModel extends Model
{
	protected $table = 'produk';
	protected $primaryKey = 'id_produk';

	public function kategori(){
		return $this->belongsTo('App\KategoriModel');
	}
}
