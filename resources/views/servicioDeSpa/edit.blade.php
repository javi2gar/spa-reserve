@extends('app')@section('content')

<h1 class="text-primary">Actualizar servicio con número: {{ $servicioDeSpa->servicio_id }} </h1><br>


<br>

@if ($errors->any())  
    <div class="alert alert-danger">
        @foreach ($errors->all() as $error)
           {{ $error }}
        @endforeach        
    </div>
    <br />
@endif

<div class="container">
    <div class="row justify-content-around">
        <form action="{{ route('servicioDeSpa.update', $servicioDeSpa->servicio_id) }}" method="post">
            @csrf
            @method('PATCH')

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Nombre</span>
                </div>
                    <input  type="text" class="form-control" name="nombre"  aria-label="nombre" aria-describedby="basic-addon1" value = "{{ $servicioDeSpa->nombre }}"  required>
            </div>

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"  id="basic-addon1">Descripción</span>
                </div>
                <input type="text" class="form-control" name="descripcion" aria-label="descripcion" aria-describedby="basic-addon1"value = "{{ $servicioDeSpa->descripcion }}">
            </div>

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"  id="basic-addon1">Precio (€)</span>
                </div>
                <input type="text" class="form-control" name="precio" aria-label="precio" aria-describedby="basic-addon1"value = "{{ $servicioDeSpa->precio }} ">
            </div> 

            <input type="submit" class="btn btn-outline-success" value="Actualizar servicio">
        </form>
    </div>     
</div>    


@endsection





                
           
            
       