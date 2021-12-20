<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use \App\User;
use \App\Utilidades;
use \App\Models\Estados;
use \App\Models\Proceso;
use \App\Models\Modulos;
use Validator;

class ModulosController extends Controller
{
    public function index(){
        $user = Auth::user();
        $estados = Estados::all()->where('procesoId', 10);//id proceso de modulos
        $procesos = Proceso::all();
        $modulos = Modulos::all()->where('estadosid', 5);//id estado activo de modulos  
        return view('cms.modulo', compact('procesos', 'estados', 'modulos', 'user'));
    }

    public function save(Request $r){
        $niceName= array(
            "nombre"=>"Usuario",
            "procesoId"=>"Correo electronico",
            "estadoId"=>"Estado",

        );
        $rules = array(
            "nombre"=>"required",
            "procesoId"=>"required",
            "estadoId"=>"required",
        );

        $validator = Validator::make($r->all(), $rules, Utilidades::MensajesValidacion(), $niceName);
        if(!$validator->passes()){
            return response()->json(["code"=>400, "msj"=>"Verifique que la información ingresada sea correcta.", "validations"=>$validator->errors()]);
        }
        if($r->procesoId<=0){
            return response()->json(["code"=>401, "msj"=>"Verifique que la información ingresada sea correcta.", "ctrl"=>"procesoId", "msg"=>"Elija un tipo de PROCESO."]);
        }
        if($r->estadoId <=0){
            return response()->json(["code"=>401, "msj"=>"Verifique que la información ingresada sea correcta.", "ctrl"=>"estadoId", "msg"=>"Elija un ESTADO de usuario."]);
        }
        
        try{
            $data = array(
                "nombre" => $r->nombre,
                "icono" => $r->icono,              
                "procesoId"=>$r->procesoId,
                "modulosIdPadre"=>$r->modulosId,
                "estadosId"=>$r->estadoId
            );

            if($r->op=='M'){
                Modulos::where('id', $r->id)->update($data);
                return response()->json(["code"=>200, "msj"=>"Registro modificado correctamente."]);
            }else{
                Modulos::Create($data);
                return response()->json(["code"=>200, "msj"=>"Registro guardado correctamente."]);
            }
        }catch(Exception $ex){

        }
    }

    public function baja($id){
        Modulos::where('id', $id)->delete();
        return response()->json(["code"=>200, "msj"=>"Registro eliminado correctamente."]);
    }

    public function listar(){
        return Modulos::all();
    }
    public function listarDataT(){
        return Modulos::ListarDataT();
    }
    public function get($id){
        return Modulos::where('id', $id)->first();
    }
}
