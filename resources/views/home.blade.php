@extends('layouts.main')

@section('content')
<div class="container">
    <div class="col-8" >   
      </div>
        <div class="col-10">
        <table class="table">
            <thead>
              <tr>
                @if(auth::user()->role==7)
                <form action="{{route('peliculas.agregar')}}" method="POST">
                  @csrf
                  
                  <hr>
                  <input type="text" name="nombre" placeholder="Pelicula" class="form-control mb-2">
                  <input type="text" name="genero" placeholder="Genero" class="form-control mb-2">
                  <button class="btn btn-primary" type="submit">Agregar</button>
                  <hr>
                  <form action="{{route('busqueda')}}" method="GET" class="d-flex form-inline">
                  
              </form>
                @endif
                    
                <th scope="col">Nombre</th>
                <th scope="col">Genero</th>
                @if(auth::user()->role==7)
                <th scope="col">Acción</th>
                @endif
              </tr>
            </thead>
            <tbody>
                @foreach($peliculas as $cine)
              <tr>
                <td>{{$cine->nombre}}</td>
                <td>{{$cine->genero}}</td>
                <td>
                  @if(auth::user()->role==7)
                  <form action="{{ route('peliculas.eliminar', $cine) }}" class="d-inline" method="POST">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                </form>
                  @endif
                </td>
              </tr>
            </div>
                @endforeach()
            </tbody>
          </table>
          {{$peliculas->links()}}
</div>
@endsection
