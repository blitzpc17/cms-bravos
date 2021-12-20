<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Estados extends Model
{
    protected $table = "Estados";
    protected $fillable = [
        'clave',
        'nombre',
        'procesoId',
    ];
    public $timestamps = false;

    public static function ListarDataT(){
        return DB::table('estados as edo')
                ->join('proceso as p', 'edo.procesoId','p.id')
                ->select('edo.id', 'edo.nombre','edo.clave','p.nombre as nombreProceso')
                ->get();
    }

}
