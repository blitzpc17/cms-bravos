<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Configuraciones extends Model
{
    protected $table = "Configuraciones";
    protected $fillable = [
        'nombre',
        'tiposId',
        'valor',
        'usersIdCreo',     
    ];

    public static function ListarDataT(){
        return DB::table('Configuraciones as config')
                ->join('tipos as tip', 'config.tiposId', 'tip.id')
                ->join('users as us', 'config.usersIdCreo','us.id')
                ->select('config.id', 'config.nombre', 'config.created_at as fechaCreacion', 'tip.nombre as tipo', 'us.name as usuario')
                ->get();
    }
}
