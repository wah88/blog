<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegistrationRequest;
use App\Mail\Welcome;
use Hash;
use Illuminate\Http\Request;
use App\User;

class RegistrationController extends Controller
{
   public function create()
   {
        return view('registration.create');
   }

   public function store(RegistrationRequest $request)
   {

       //Validar el formulario en RegistrationRequest



       //Crear y guardar el usuario

      // $user = User::create(request(['name', 'email', 'password']));

       //Redireccionar a la pagina de inicio

       $request->persist();



       session()->flash('message', 'Thanks so mush for signing up!');

       return redirect()->home();

   }
}
