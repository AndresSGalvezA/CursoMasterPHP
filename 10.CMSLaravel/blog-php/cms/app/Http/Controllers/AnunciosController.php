<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Anuncios;
use App\Blog;

class AnunciosController extends Controller
{
    public function index(){

		$anuncios = Anuncios::all();
		$blog = Blog::all();

		return view("paginas.anuncios", array("anuncios"=>$anuncios, "blog"=>$blog));

	}
}
