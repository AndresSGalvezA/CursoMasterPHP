<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Opiniones;
use App\Blog;

class OpinionesController extends Controller
{
    public function index(){

		$opiniones = Opiniones::all();
		$blog = Blog::all();

		return view("paginas.opiniones", array("opiniones"=>$opiniones, "blog"=>$blog));

	}
}
