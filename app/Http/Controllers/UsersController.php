<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use \App\User;
use \App\Utilidades;
use \App\Models\Estados;
use \App\Models\Tipos;
use Validator;

class UsersController extends Controller
{
    public function index(){
        $user = Auth::user();
        $tipos = Tipos::all()->where('procesoId', 4);
        $estados = Estados::all()->where('procesoId', 4);//id proceso de usuarios        
        return view('cms.usuarios', compact('tipos', 'estados', 'user'));
    }

    public function save(Request $r){
        $niceName= array(
            "name"=>"Usuario",
            "email"=>"Correo electronico",
            "estadoId"=>"Estado",
            "tiposId"=>"Tipo",

        );
        $rules = array(
            "name"=>"required",
            "email"=>"required",
            "estadoId"=>"required",
            "tiposId"=>"required",
        );

        $validator = Validator::make($r->all(), $rules, Utilidades::MensajesValidacion(), $niceName);
        if(!$validator->passes()){
            return response()->json(["code"=>400, "msj"=>"Verifique que la información ingresada sea correcta.", "validations"=>$validator->errors()]);
        }
        if($r->op=='I' && empty($r->password)){
            return response()->json(["code"=>401, "msj"=>"Verifique que la información ingresada sea correcta.", "ctrl"=>"password", "msg"=>"Olvidó ingresar su CONTRASEÑA."]);
        }
        if($r->tiposId<=0){
            return response()->json(["code"=>401, "msj"=>"Verifique que la información ingresada sea correcta.", "ctrl"=>"tiposId", "msg"=>"Elija un Tipo de USUARIO."]);
        }
        if($r->estadoId <=0){
            return response()->json(["code"=>401, "msj"=>"Verifique que la información ingresada sea correcta.", "ctrl"=>"estadoId", "msg"=>"Elija un ESTADO de usuario."]);
        }
        
        try{
            $data = array(
                "name" => $r->name,
                "email" => $r->email,              
                "estadoId"=>$r->estadoId,
                "tiposId"=>$r->tiposId
            );

            if($r->op=='M'){
                if(!empty($r->password)){
                    $data = array_merge($data, ["password"=>bcrypt($r->password)]);
                }
                User::where('id', $r->id)->update($data);
                return response()->json(["code"=>200, "msj"=>"Registro modificado correctamente."]);
            }else{
                $data = array_merge($data, ["password"=>bcrypt($r->password)]);
                User::Create($data);
                return response()->json(["code"=>200, "msj"=>"Registro guardado correctamente."]);
            }
        }catch(Exception $ex){

        }
    }

    public function baja($id){
        User::where('id', $id)->delete();
        return response()->json(["code"=>200, "msj"=>"Registro eliminado correctamente."]);
    }

    public function listar(){
        return User::all();
    }
    public function listarDataT(){
        return User::ListarDataT();
    }
    public function get($id){
        return User::where('id', $id)->first();
    }
}
