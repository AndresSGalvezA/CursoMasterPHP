<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categorias;
use App\Blog;
use App\Administradores;

class CategoriasController extends Controller
{
    public function index(){

		$categorias = Categorias::all();
		$blog = Blog::all();
		$administradores = Administradores::all();

		return view("paginas.categorias", array("categorias"=>$categorias, "blog"=>$blog, "administradores"=>$administradores));

	}
}
