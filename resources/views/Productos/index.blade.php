@extends('layouts.principal')

@section('contenido')
  <div class="row">
      <h1> Catalogo de Productos </h1>
    
    </div> 
    @foreach($productos as $producto)


    <div class="row">
    <div class="col s12 m7">
      <div class="card">
        <div class="card-image">
          <img widht="500px" height="400px" src="{{ asset('img/'.$producto->imagen) }}">
          <span class="card-title">Card Title</span>
        </div>
        <div class="card-content">
          <ul>
              <li> Descripcion:{{ $producto->desc }}</li>
              <li> Precio: {{ $producto->precio }}</li>
          </ul>
        </div>
        <div class="card-action">
          <a href="" target="_blank">Ver detalles</a>
        </div>
      </div>
    </div>
  </div>

    @endforeach

@endsection