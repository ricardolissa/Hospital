<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use Exception;

class LoginController extends Controller
{

    /**
     * Display a listing of the medicos.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {

        return view('login.login');
    }
 }   