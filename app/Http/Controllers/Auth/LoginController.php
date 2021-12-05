<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{

public function login(){

$credentials =  $this->validate(request(),[

    $email = 'email' => 'email|required|string',
    $password ='password' => 'required|string'

]); 



	if(Auth::attempt($credentials)){

	return redirect('/home');

	} return back()->withErrors(['email'=> trans('auth.failed')]);
		
}

public function logout(){
	
	//Auth::logout();

	return redirect('/login')->with(Auth::logout());
}

public function __construct()
    {

        $this->Middleware('guest', ['only'=> 'showLoginForm']);

    }

 public function showLoginForm()
 {
 return view('auth.login');
 }


}