<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Articulos;
use App\Blog;

class ArticulosController extends Controller
{
    public function index(){

		$articulos = Articulos::all();
		$blog = Blog::all();

		return view("paginas.articulos", array("articulos"=>$articulos, "blog"=>$blog));

	}
}
