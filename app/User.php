<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use DB;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'remember_token', 'tiposId', 'estadoId' 
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static function ListarDataT(){
        return DB::table('users as us')
        ->join('estados as edo', 'us.estadoId','edo.id')
        ->join('tipos as tip', 'us.tiposId', 'tip.id')
        ->select('us.id', 'us.name','us.email','tip.nombre as tipo', 'edo.nombre as estado')
        ->get();
    }
}
