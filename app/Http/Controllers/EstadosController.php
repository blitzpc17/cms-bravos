<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use \App\Models\Estados;
use \App\Models\Proceso;
use \App\Utilidades;
use Validator;

class EstadosController extends Controller
{
    public function index(){
        $user = Auth::user();
        $procesos = Proceso::all();
        return view('cms.estados', compact('procesos', 'user'));
    }

    public function save(Request $r){
        $niceName= array(
            "nombre"=>"Nombre",
            "clave"=>"Clave",
            "procesoId"=>"Proceso"
        );
        $rules = array(
            "nombre"=>"required",
            "clave"=>"required",
            "procesoId"=>"required"
        );

        $validator = Validator::make($r->all(), $rules, Utilidades::MensajesValidacion(), $niceName);
        if(!$validator->passes()){
            return response()->json(["code"=>400, "msj"=>"Verifique que la información ingresada sea correcta.", "validations"=>$validator->errors()]);
        }

        if($r->procesoId<=0){
            return response()->json(["code"=>401, "msj"=>"Verifique que la información ingresada sea correcta.", "ctrl"=>"procesoId", "msg"=>"Elija un Tipo de PROCESO."]);
        }
        
        try{
            $data = array(
                "nombre" => $r->nombre,
                "clave" => $r->clave,
                "procesoId"=>$r->procesoId
            );

            if($r->op=='M'){
                Estados::where('id', $r->id)->update($data);
                return response()->json(["code"=>200, "msj"=>"Registro modificado correctamente."]);
            }else{
                Estados::Create($data);
                return response()->json(["code"=>200, "msj"=>"Registro guardado correctamente."]);
            }
        }catch(Exception $ex){

        }
    }

    public function delete($id){
        Estados::where('id', $id)->delete();
        return response()->json(["code"=>200, "msj"=>"Registro eliminado correctamente."]);
    }

    public function listar(){
        return Estados::all();
    }
    public function listarDataT(){
        return Estados::ListarDataT();
    }
    public function get($id){
        return Estados::where('id', $id)->first();
    }
}
