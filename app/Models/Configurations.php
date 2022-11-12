<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Configurations extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'configurations';
    public static function getConfiguracion($cClave){

    	$valor = Configurations::where('cClave', $cClave)
    							->first();

    	return $valor->cValor;

    }
}
