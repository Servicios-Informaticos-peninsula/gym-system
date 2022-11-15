<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Carts extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [

        'clients_id',
        'numero_venta',


    ];
    protected $table = "carts";
//    // protected $dates = ['deleted_at'];

}
