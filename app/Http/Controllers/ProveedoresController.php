<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class ProveedoresController extends Controller
{
    public function index(){
        $user = Auth::user();
        return view('cms.proveedores', compact('user'));
    }
}
