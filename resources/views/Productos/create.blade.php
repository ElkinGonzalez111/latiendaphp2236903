@extends('layouts.principal')

@section('contenido')
<div class="row">
<h1 class="indigo-text text-darken-4"> Nuevo Producto</h1>
</div>

<div class="row">
    <form method="POST"
     action="{{ url('productos') }}"
     class="col s12" 
     enctype="multipart/form-data">
     @csrf
     @if(session('mensaje'))
     <div class="row">
       <div class="col s8">
         <span class="purple-text text-darken-2">
           {{ session('mensaje') }}
         </span>
       </div>
     </div>
     @endif
      <div class="row">
        <div class="input-field col s8">
          <input placeholder="Nombre de Producto"
           id="nombre"
           type="text" 
           class="validate"
           name="nombre">
          <label for="nombre">Nombre de Producto</label>
          <span class="red-text text-darken-1">{{ $errors->first('nombre') }}</span>
        </div>
      </div>

      <div class="row">
        <div class="input-field col s8">
          <textarea class="materialize-textarea"
                     id="desc"
                     name="desc"
          >
          </textarea>
          <label for="desc">Descripcion</label>
          <span class="red-text text-darken-1">{{ $errors->first('desc') }}</span>
        </div>
      </div>

      <div class="row">
        <div class="input-field col s8">
          <input id="precio" 
          name="precio"
          type="text"
          class="validate">
          <label for="precio">Precio</label>
          <span class="red-text text-darken-1">{{ $errors->first('precio') }}</span>
        </div>
      </div>

      <div class="row">
        <div class="file-field input-field col s8">
          <div class="btn">
            <span>Imagn de Producto..</span>
            <input type="file" name="imagen">
          </div>
          <div class="file-path-wrapper">
            <input class="file-path validate" type="text">
          </div>
          <span class="red-text text-darken-1">{{ $errors->first('imagen')}}</span>
        </div>
      </div>

        <div class="row">
          <div class="input-field col s8">
            <select name="categorias" >
            <option value="" disabled selected>Elija Categoria</option>
            @foreach($categorias as $categoria)
               <option value="{{ $categoria->id}}">
                 {{ $categoria->nombre }}
                </option>
            @endforeach
            </select>
            <label>Categorias Disponibles</label>
            <span class="red-text text-darken-1">{{ $errors->first('categorias') }}</span>
          </div>
        </div>

        <div class="row">
          <div class="input-field col s8">
            <select name="marca" >
            <option value=""disabled selected>Elija Marca</option>
            @foreach($marcas as $marca)
               <option value="{{ $marca->id}}">
                 {{ $marca -> nombre }}
                </option>
            @endforeach
            </select>
            <label>Marca Disponibles</label>
            <span class="red-text text-darken-1">{{ $errors->first('marca') }}</span>
          </div>
        </div>


        <button class="btn waves-effect waves-light" 
            type="submit">
            Guardar
        </button><br><br>  
        
    </form>
  </div>

@endsection