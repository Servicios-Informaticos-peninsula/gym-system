<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carts_has_products extends Model
{
    use HasFactory;

    protected $fillable = [
        'carts_id',
        'products_id',
        'quantity',
        'lMembresia',


    ];
    protected $table = "carts_has_products";
}
