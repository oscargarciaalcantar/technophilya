<?php 

namespace App\Http\Controllers;

/**
* Controlador para las paginas
*/
class PagesController extends Controller
{
	public function getIndex(){
		return view('pages.welcome');
	}

	public function getAcerca(){
		return view('pages.acerca');
	}

	public function getContacto(){
		return view('pages.contacto');
	}
}