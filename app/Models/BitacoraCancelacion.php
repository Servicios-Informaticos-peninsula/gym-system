<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BitacoraCancelacion extends Model
{
    use HasFactory;
    protected $fillable = [
        'motivo',
        'carts_id',
        'userCreator',
        'cSistema',


    ];
    protected $table = "bitacora_cancelacions";
}
