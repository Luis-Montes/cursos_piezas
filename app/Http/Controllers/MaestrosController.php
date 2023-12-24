<?php

namespace App\Http\Controllers;

use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Request;

class MaestrosController extends Controller
{
    public function index(){
        return view('acciones.maestros');
    }

    public function store(Response $response) {
        
    }
}
