<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Opiniones;
use App\Blog;
use App\Administradores;

use Illuminate\Support\Facades\DB;
use App\Articulos;

class OpinionesController extends Controller
{
    public function index(){

    	 $join = DB::table('opiniones')
         ->join('users','opiniones.id_adm','=','users.id')
         ->join('articulos', 'opiniones.id_art', '=', 'articulos.id_articulo')
         ->select('opiniones.*','users.*','articulos.*')->get();   

        if(request()->ajax()){

            return datatables()->of($join)
            ->addColumn('aprobacion_opinion', function($data){

                if($data->aprobacion_opinion == 1){

                    $aprobacion = '<button class="btn btn-success btn-sm">Aprobado</button>';

                }else{

                    $aprobacion = '<button class="btn btn-danger btn-sm">Por Aprobar</button>';

                }
               
                return $aprobacion;

            })
            ->addColumn('acciones', function($data){

                $acciones = '<div class="btn-group">
                            <a href="'.url()->current().'/'.$data->id_opinion.'" class="btn btn-warning btn-sm">
                              <i class="fas fa-pencil-alt text-white"></i>
                            </a>

                            <button class="btn btn-danger btn-sm eliminarRegistro" action="'.url()->current().'/'.$data->id_opinion.'" method="DELETE" token="'.csrf_token().'" pagina="opiniones"> 
                            <i class="fas fa-trash-alt"></i>
                            </button>

                          </div>';
               
                return $acciones;

            })
            ->rawColumns(['aprobacion_opinion','acciones'])
            ->make(true);

        }

		$blog = Blog::all();
		$administradores = Administradores::all();

		return view("paginas.opiniones", array("blog"=>$blog, "administradores"=>$administradores));

	}
}
