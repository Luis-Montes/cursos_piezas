<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index() {
        return view('auth.login');
    }

    public function store(Request $request) {
        $this->validate($request , [
            'matricula' => 'required',
            'password' => 'required'
        ]);
        // dd($request);

        if (!auth()->attempt($request->only('matricula', 'password'))) {
            return back()->with('mensaje', 'Credenciales Incorrectas');
        }

        return redirect()->route('inicio');
    }
}
