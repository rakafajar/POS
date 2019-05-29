<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KategoriModel extends Model
{
    protected $table = 'kategori';
    protected $primaryKey = 'id_kategori';

    public function produk(){
    	return $this->hasMany('App\ProdukModel', 'id_kategori');
    }
}
