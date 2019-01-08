<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
//use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Auth;

class LoginController extends Controller
{
    public function login(){

        $credentials = $this->validate(request(), [

            'email' =>  'email|required|string', 'password' => 'required|string'

        ]);

        //return $credentials;

        if(Auth::attempt( $credentials))
        {
           // return 'Tu has ingresado correctamente';

            return redirect()->route('crud');

        }

        return back()

        ->withErrors(['email' => 'Estos datos no coinciden con nuestros registros']);

    }

    public function logout(){

        Auth::logout();

        return redirect('/');

    }
  
}
