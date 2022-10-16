<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carts extends Model
{
    use HasFactory;
    protected $fillable = [
        'clients_id',
        'numero_venta',


    ];
    protected $table = "carts";
//    // protected $dates = ['deleted_at'];

}
