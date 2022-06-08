@extends('layouts.principal')

@section('contenido')
<div class="row">
    <h1>{{ $producto->nombre}}</h1>
</div>
<div class="row">
    <div class="col s8">
        <div class="row">
            <img src="{{ asset('img/'.$producto->imagen) }}">
        </div>
    </div>
    <div class ="row">
        <div class="col s8">
            <ul>
                <li><strong>Marca:</strong>{{ $producto->marca->nombre }} </li>
                <li><strong>Categoria:</strong>{{ $producto->categoria->nombre }} </li>
                <li><strong>Marca:</strong> ${{ $producto->precio }} </li>
                <li><strong>Descripcion:</strong>{{ $producto->desc }} </li>
            </ul>
        </div>
    </div>
    <div class ="col s4">
        <form action="{{ route('cart.store' )}}" method="POST">
            @csrf
            <div class="row">
                <h3>Añadir al carrito</h3>
            </div>
            <input type="hidden" name="pro_id" id="{{ $producto -> id }}">
            <div class="row">
               <select name="cantidad" id="cantidad">
                <option value="1">1</option>
                <option value="1">2</option>
                <option value="1">3</option>
            </select>
            <label for="Cantidad">Cantidad:</label>
            </div>
          </div>
          <div class ="row">
              <button class="btn waves-effect waves-light" type="submit">
                  Añadir
              </button>
              </div>
          </div>
        </form>
    </div>
</div>
@endsection
