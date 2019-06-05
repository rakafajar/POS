<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MemberModel extends Model
{
    protected $table = 'member';
    protected $primaryKey = 'id_member';

    public function penjualan(){
        return $this->hasyMany('App\PenjualanModel', 'id_supplier');
    }
}
