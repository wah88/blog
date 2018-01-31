<?php

namespace App\Http\Controllers;

use Hash;
use Illuminate\Http\Request;
use App\User;

class RegistrationController extends Controller
{
   public function create()
   {
        return view('registration.create');
   }

   public function store()
   {

       //Validar el formulario
        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required|email',
            'password'=> 'required|confirmed'
        ]);



       //Crear y guardar el usuario

      // $user = User::create(request(['name', 'email', 'password']));

       $user = User::create([

           'name' => request('name'),

           'email' => request('email'),

           'password' => Hash::make(request('password'))

       ]);

       //Iniciar sesion


       auth()->login($user);


       //Redireccionar a la pagina de inicio

       return redirect()->home();

   }
}
