<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Proceso extends Model
{
    protected $table = "Proceso";
    protected $fillable = [
        'nombre',
    ];
    public $timestamps = false;
}
