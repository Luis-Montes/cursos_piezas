<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use App\Models\Maestro;
use Illuminate\Http\Request;

class CursosController extends Controller
{
    public function index(Request $request) {
        $search = $request->input('search');
        $query = Curso::query();
        $maestros = Maestro::all();

        if ($search) {
            $query->where('nombre', 'LIKE', '%' . $search . '%')
                ->orWhere('nivel', 'LIKE', '%' . $search . '%');
        }
        $cursos = $query->simplePaginate(8);

        return view('acciones.cursos', compact('cursos'), ['cursos' => $cursos, 'search' => $search, 'maestros' => $maestros]);
    }

    public function store(Request $request) {
        $this->validate($request, [
            'nombre' => 'required',
            'nivel' => 'required',
            'duracion' => 'required',
            'descripcion' => 'max:230',
            'precio' => 'required',
            
        ]);


        Curso::create([
            'nombre' => $request->nombre,
            'nivel' => $request->nivel,
            'duracion' => $request->duracion,  
            'precio' => $request->precio,
            'descripcion' => $request->descripcion,
            'imagen' => $request->imagen,
            'maestro_id' => $request->maestro_id
        ]);

        return redirect()->route('cursos');
    }

    // public function lista(){
    //     $cursoslista = Curso::all();

    //     return  response()->json(['lista' => $cursoslista]);
    // }

    // public function crear(Request $request){
    //     $curso = new Curso();
    //     $curso->nombre->$request->nombre;
    //     $curso->nivel->$request->nivel;
    //     $curso->duracion->$request->duracion;
    //     $curso->descripcion->$request->descripcion;
    //     $curso->imagen->$request->imagen;
    //     $curso->maestro_id->$request->maestro_id;

    //     $curso->save();
    // }
    // public function buscarCursoMaestro(){
    //     $nombreMaestro = 'aqui pondrias el nombre';
    //     $cursoMaestro = DB::table('curso')
    //         ->join('maestro_id'. 'curso.id', '=', 'maestros_id.curso_id')
    //         ->select('nombre', 'nombre_curso')
    //         ->where('maestro.nombre', 'like', '%' . $nombreMaestro . '%')
    //         ->get();
    // }
}

        // echo "<pre>";
        // var_dump($_POST);
        // echo "</pre>";
        // echo "<pre>";
        // var_dump($_FILES);
        // echo "</pre>";
        // exit();