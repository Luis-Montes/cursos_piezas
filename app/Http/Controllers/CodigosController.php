<?php

namespace App\Http\Controllers;

use App\Models\Codigo;
use Illuminate\Http\Request;

class CodigosController extends Controller
{
    public function index(){
        $codigos = Codigo::all();

        return view('acciones.codigo', ['codigos' => $codigos]);
    }

    public function store(Request $request){
        $this->validate($request, [
            'nombre' => 'required'
        ]);

        Codigo::create([
            'nombre' => $request->nombre,
            'codigo' => $request->codigo
        ]);

        return redirect()->route('codigos');
    }
}
