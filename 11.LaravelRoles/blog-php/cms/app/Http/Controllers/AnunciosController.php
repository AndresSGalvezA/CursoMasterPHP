<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Anuncios;
use App\Blog;
use App\Administradores;

class AnunciosController extends Controller
{
    public function index(){

		$anuncios = Anuncios::all();
		$blog = Blog::all();
		$administradores = Administradores::all();

		return view("paginas.anuncios", array("anuncios"=>$anuncios, "blog"=>$blog, , "administradores"=>$administradores));

	}
}
