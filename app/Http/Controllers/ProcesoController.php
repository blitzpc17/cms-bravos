<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use \App\Models\Proceso;
use \App\Utilidades;
use Validator;

class ProcesoController extends Controller
{
    public function index(){
        $user = Auth::user();
        return view('cms.proceso', compact('user'));
    }

    public function save(Request $r){
        $niceName= array(
            "nombre"=>"Nombre",
        );

        $rules = array(
            "nombre"=>"required",
        );

        $validator = Validator::make($r->all(), $rules, Utilidades::MensajesValidacion(), $niceName);
        if(!$validator->passes()){
            return response()->json(["code"=>400, "msj"=>"Verifique que la información ingresada sea correcta.", "validations"=>$validator->errors()]);
        }  
        try{
            $data = array(
                "nombre" => $r->nombre,
            );

            if($r->op=='M'){
                Proceso::where('id', $r->id)->update($data);
                return response()->json(["code"=>200, "msj"=>"Registro modificado correctamente."]);
            }else{
                Proceso::Create($data);
                return response()->json(["code"=>200, "msj"=>"Registro guardado correctamente."]);
            }
        }catch(Exception $ex){

        }
    }

    public function delete($id){
        Proceso::where('id', $id)->delete();
        return response()->json(["code"=>200, "msj"=>"Registro eliminado correctamente."]);
    }

    public function listar(){
        return Proceso::all();
    }
    public function get($id){
        return Proceso::where('id', $id)->first();
    }
}
