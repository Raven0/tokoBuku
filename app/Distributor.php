<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Distributor extends Model
{
    //
    protected $table = 'distributor';
    public $timestamps = false;
    protected $primaryKey = 'id_distributor';
}
