<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use \App\User;
use \App\Utilidades;
use \App\Models\Tipos;
use \App\Models\Configuraciones;
use Validator;

class ConfiguracionesController extends Controller
{
    public function index(){
        $user = Auth::user();
        $tipos = Tipos::all()->where('procesoId', 9);//id proceso de modulos
        return view('cms.configuraciones', compact('tipos', 'user'));
    }

    public function save(Request $r){
        $niceName= array(
            "nombre"=>"Nombre",
            "tiposId"=>"Tipos",
            "valor"=>"Valor",

        );
        $rules = array(
            "nombre"=>"required",
            "tiposId"=>"required",
            "valor"=>"required",
        );

        $validator = Validator::make($r->all(), $rules, Utilidades::MensajesValidacion(), $niceName);
        if(!$validator->passes()){
            return response()->json(["code"=>400, "msj"=>"Verifique que la información ingresada sea correcta.", "validations"=>$validator->errors()]);
        }
        if($r->tiposId<=0){
            return response()->json(["code"=>401, "msj"=>"Verifique que la información ingresada sea correcta.", "ctrl"=>"tiposId", "msg"=>"Elija un TIPO de valor."]);
        }
        
        try{
            $user = Auth::user();
            $data = array(
                "nombre" => $r->nombre,              
                "tiposId"=>$r->tiposId,
                "valor"=>$r->valor,
                "usersIdCreo"=>$user->id,
            );

            if($r->op=='M'){
                Configuraciones::where('id', $r->id)->update($data);
                return response()->json(["code"=>200, "msj"=>"Registro modificado correctamente."]);
            }else{
                Configuraciones::Create($data);
                return response()->json(["code"=>200, "msj"=>"Registro guardado correctamente."]);
            }
        }catch(Exception $ex){

        }
    }

    public function listar(){
        return Configuraciones::all();
    }
    public function listarDataT(){
        return Configuraciones::ListarDataT();
    }
    public function get($id){
        return Configuraciones::where('id', $id)->first();
    }
}
