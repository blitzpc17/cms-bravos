<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Excepciones extends Model
{
    protected $table = "Modulos";
    protected $fillable = [
        'nombre',
        'icono',
        'procesoId',
        'modulosIdPadre',
        'estadosId',        
    ];


     public static function ListarDataT(){
        return DB::table('modulos as mod')
                ->join('proceso as pro', 'mod.procesoId', 'pro.id')
                ->join('estados as edo', 'mod.estadosid', 'edo.id')
                ->leftjoin('modulos as mod2', 'mod.modulosIdPadre', 'mod2.id')
                ->select('mod.id','mod.nombre', 'mod.icono', 'mod.created_at as fechaProduccion', 'pro.nombre as proceso', 'mod2.nombre as moduloPadre', 'edo.nombre as estado')
                ->get();
    }
}
