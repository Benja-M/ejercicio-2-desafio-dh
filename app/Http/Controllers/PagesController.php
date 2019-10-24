<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pelicula;

class PagesController extends Controller
{
     public function inicio(){
        $peliculas = App\Pelicula::paginate(5);
        return view('welcome', compact('peliculas'));

     }

     public function eliminar($id){

      $notaEliminar = App\Pelicula::findOrFail($id);
      $notaEliminar->delete();
  
      return back()->with('mensaje', 'Nota Eliminada');
  }


     public function agregar(Request $request){
        $peliculaNueva = new App\Pelicula;
        $peliculaNueva->nombre = $request->nombre;
        $peliculaNueva->genero = $request->genero;

        $peliculaNueva->save();

        return back()->with('mensaje', 'Pelicula agregada');
     }

     public function search(Request $request){
            
        $buscar = $request->buscar('busqueda');
        
        $pelicula = Pelicula::where('title','LIKE','%'.$input.'%')->paginate(3);
        return view('home')->with('nombre',$nombre);
        
    }

     
}
