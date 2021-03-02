<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Anuncios;
use App\Blog;
use App\Administradores;

class AnunciosController extends Controller
{
    public function index(){

		 if(request()->ajax()){

            return datatables()->of(Anuncios::all())
             ->addColumn('codigo_anuncio', function($data){

                $codigo_anuncio = '<div class="card collapsed-card">

							        <div class="card-header">

							          <h3 class="card-title">Ver Anuncio</h3>

							          <div class="card-tools">

							            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
							              <i class="fas fa-minus"></i>
							            </button>
							           
							          </div>

							        </div>

							        <div class="card-body">'.$data->codigo_anuncio.'</div>

							      </div>';
                
                return $codigo_anuncio;

            })
            ->addColumn('acciones', function($data){

                $acciones = '<div class="btn-group">
                            <a href="'.url()->current().'/'.$data->id_anuncio.'" class="btn btn-warning btn-sm">
                              <i class="fas fa-pencil-alt text-white"></i>
                            </a>
                         
                            <button class="btn btn-danger btn-sm eliminarRegistro" action="'.url()->current().'/'.$data->id_anuncio.'" method="DELETE" token="'.csrf_token().'" pagina="anuncios"> 
                            <i class="fas fa-trash-alt"></i>
                            </button>

                          </div>';
               
                return $acciones;

            })
            ->rawColumns(['codigo_anuncio','acciones'])
            ->make(true);

        };

		$blog = Blog::all();
		$administradores = Administradores::all();

		return view("paginas.anuncios", array("blog"=>$blog, "administradores"=>$administradores));

	}
}
