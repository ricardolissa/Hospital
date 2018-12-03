<?php
namespace App\Http\Controllers;

class ReportController extends Controller{


/**
 *
 *
 *@return void
 *
 */

public function __construct(){
	$this->middleware('guest');
}

/**
 *
 *@return Response
 *
 */
public function generar(){
	
	return view('reports.report');
}










}