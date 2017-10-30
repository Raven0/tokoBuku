<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kasir extends Model
{
    //
    protected $table = 'kasir';
    public $timestamps = false;
    protected $primaryKey = 'id_kasir';
}
