@extends('app')@section('content')

<h1 class="text-primary">Nuevo servicio </h1><br>
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
        <form action="{{ route('servicioDeSpa.store') }}" method="post">
            @csrf
            @method('POST')
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Nombre</span>
                </div>
                    <input  type="text" class="form-control" name="nombre"  aria-label="nombre" aria-describedby="basic-addon1" required>
            </div>

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"  id="basic-addon1">Descripción</span>
                </div>
                <input type="text" class="form-control" name="descripcion" aria-label="descripcion" aria-describedby="basic-addon1">
            </div>

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"  id="basic-addon1">Precio (€)</span>
                </div>
                <input type="text" class="form-control" name="precio" aria-label="precio" aria-describedby="basic-addon1">
            </div> 

            <input type="submit" class="btn btn-outline-success" value="Añadir servicio">
        </form>
    </div>     
</div>       


@endsection





                
           
            
       