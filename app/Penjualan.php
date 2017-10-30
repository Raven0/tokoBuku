<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    //
    protected $table = 'penjualan';
    public $timestamps = false;
    protected $primaryKey = 'id_penjualan';

    public function Buku(){
        return $this -> belongsTo('App\Buku', 'id_buku', 'id_buku');
    }

    public function Kasir(){
        return $this -> belongsTo('App\Kasir', 'id_kasir', 'id_kasir');
    }
}
