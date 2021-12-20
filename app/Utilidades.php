<?php

namespace App;
use DB;

class Utilidades
{
    public static function MensajesValidacion(){
        $arrayMsj = array(
            'required'  => 'El campo :attribute es obligatorio.'
        );
        return $arrayMsj;
    }

}
