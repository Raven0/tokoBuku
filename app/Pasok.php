<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pasok extends Model
{
    //
    protected $table = 'pasok';
    public $timestamps = false;
    protected $primaryKey = 'id_pasok';

    public function Buku(){
        return $this -> belongsTo('App\Buku', 'id_buku', 'id_buku');
    }

    public function Distributor(){
        return $this -> belongsTo('App\Distributor', 'id_distributor', 'id_distributor');
    }
}
