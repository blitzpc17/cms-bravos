<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;

class AdminController extends Controller
{
    public function login(){
        if(Auth::check()){
            return redirect('/');
        }else{
           return view('cms.login');
        }
        
    }

    public function index(){
        $user = Auth::user();;
        return view('cms.home', compact('user'));
    }

    public function Autenticacion(Request $r){
        if(Auth::attempt(["name"=>$r->name, "password"=>$r->password, "estadoId"=>4],($r->remember==true?true:false))){
            return redirect('/');
        }else{
            return redirect()->back()->with('error', 'Los datos ingresados no coinciden <br>con nuestros registros.');
        }
    }
    public function logout()
    {
        Auth::logout();
        Session::flush();
        return redirect('/login')->with('status','Su sesión ha sido cerrada.');
    }
    

}
