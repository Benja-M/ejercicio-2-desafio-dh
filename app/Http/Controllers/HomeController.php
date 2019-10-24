<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pelicula;
use App;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $peliculas = App\Pelicula::paginate(5);
        return view('home', compact('peliculas'));
    }

    public function search(Request $request){
            
        $input = $request->input('busqueda');
        
        $pelicula = Pelicula::where('nombre','LIKE','%'.$input.'%')->paginate(3);
        return view('home')->with('pelicula',$pelicula);
        
    }

    public function inicio()
    {
        $peliculas = App\Pelicula::paginate(5);
        return view('home', compact('peliculas'));
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

}
