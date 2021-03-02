<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Opiniones;
use App\Blog;
use App\Administradores;

class OpinionesController extends Controller
{
    public function index(){

		$opiniones = Opiniones::all();
		$blog = Blog::all();
		$administradores = Administradores::all();

		return view("paginas.opiniones", array("opiniones"=>$opiniones, "blog"=>$blog, "administradores"=>$administradores));

	}
}
