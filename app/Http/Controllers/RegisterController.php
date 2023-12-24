<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index(){
        return view('auth.register');
    }

    public function store(Request $request){
        $request->request->add(['matricula' => Str::slug($request->matricula)]);

        $this->validate($request, [
            'name' => 'required|max:50',
            'matricula' => 'required|unique:users|min:5|max:30',
            'email' => 'required|unique:users|email|max:60',
            'password' => 'required|min:8'
        ]);

        User::create([
            'name' => $request->name,
            'matricula' => $request->matricula,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);
        // dd($request);

        auth()->attempt($request->only('matricula', 'password'));
        return redirect()->route('inicio');
    }
}
