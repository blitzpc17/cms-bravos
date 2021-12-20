<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Choferes extends Model
{
    protected $table = "Choferes";
    protected $fillable = [
        'nombres',
        'apellidos',
        'telefono',
        'email',
        'calle',
        'noext',
        'noint',
        'referencias',
        'cp',
        'estadosId',
        'tiposChoferId',
        'solicitudChoferId'      
    ];
}
