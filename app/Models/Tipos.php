<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Tipos extends Model
{
    protected $table = "tipos";
    protected $fillable = [
        'clave',
        'nombre',
        'procesoId'
    ];
    public $timestamps = false;



    public static function ListarDataT(){
        return DB::table('tipos as t')
        ->join('proceso as p', 't.procesoId','p.id')
        ->select('t.id', 't.nombre','t.clave','p.nombre as nombreProceso')
        ->get();
    }
}
