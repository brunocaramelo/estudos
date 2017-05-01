<?php

namespace estoque\Http\Controllers;

use Request;
use Auth;

class LoginController extends Controller
{
    
    public function form(){
        // return view('<segu></segu>ranca/login');
        return view('auth/login');
    }

    public function efetuarLogin(){

        $credenciais = Request::only('email','password');
        
        if( Auth::attempt( $credenciais ) ){
            return 'logou sim';
        }
  
        return 'nao logou';
    }

}
