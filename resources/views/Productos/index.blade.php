@extends('layouts.principal')

@section('contenido')
  <div class="row">
      <h1> Catalogo de Productos </h1>
    
    </div> 
    @if(session('mensajito'))
    <div class = "row">
      <p>{{ session('mensajito') }} 
        <a href="{{ route('cart.index') }}">
          Ir al carrito
        </a>
      </p>
    </div>
    @endif
    @foreach($productos as $producto)


    <div class="row">
    <div class="col s12 m7">
      <div class="card">
        <div class="card-image">
        <img width="500px" height="400px" src="{{ asset('img/'.$producto->imagen) }}">

          <span class="card-title">Card Title</span>
        </div>
        <div class="card-content">
          <ul>
              <li>  Nombre:{{ $producto->nombre }}</li>
              <li>  Descripcion:{{ $producto->desc }}</li>
              <li>  Precio: {{ $producto->precio }}</li>
          </ul>
        </div>
        <div class="card-action">
        <a href="{{ route('productos.show' , $producto ->id)}}" target="_blank">Ver detalles</a>
        </div>
      </div>
    </div>
  </div>

    @endforeach

@endsection