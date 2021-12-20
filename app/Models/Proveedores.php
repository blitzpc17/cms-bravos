<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Proveedores extends Model
{
    protected $table = "Proveedores";
    protected $fillable = [
        'nombreNegocio',
        'razonSocial',
        'rfc',
        'telefono',
        'email',
        'calle',
        'noext',
        'noint',
        'referencias',
        'cp',
        'estadosId',
        'solicitudProveedorId',        
        'evFotoEstablecimiento',
        'evLogoEstablecimiento',
        'usersId',
        'horarios',
    ];
}
