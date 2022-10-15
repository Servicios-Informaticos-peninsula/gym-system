<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
    use HasFactory;

    protected $fillable = [
        'carts_id',
        'quantity',
        'price_total',
        'vendendor',
        'tipo_pago',
        'cantidad_pagada',
        'cambio' ,
        'estatus',


    ];
    protected $table = "vouchers";
//    // protected $dates = ['deleted_at'];
}
