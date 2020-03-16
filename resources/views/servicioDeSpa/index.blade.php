@extends('app')@section('content')
<h1 class="text-primary">Listado de Servicios de Spa</h1>

<br>

<div class="container">
    <div class="row">
        <div class="col-9  ">
            <a type="button" class="btn btn-outline-success" href="{{ route('servicioDeSpa.create') }}">Añadir un nuevo servicio de Spa</a>
        </div>        
    </div>
</div>

<br>

@if (session('success'))
    <div class="alert alert-success">    
        {{ session('success') }}
    </div>
@endif

<br>

<table class="table table-bordered" id="tableServicios">
    <thead>
        <tr>
            <th class="text-center">Nº</th>
            <th class="text-center">Nombre</th>
            <th class="text-center">Descripción</th>
            <th class="text-center">Precio</th>
            <th colspan="2"  class="text-center">Acciones</th>
        </tr>
    </thead>

    <tbody>
        @foreach($servicioDeSpa as $servicio)
        <tr>
            <td class="text-center">{{ $servicio->servicio_id }}</td>
            <td class="text-center">{{ $servicio->nombre }}</td>
            <td class="text-center">{{ $servicio->descripcion }}</td>
            <td class="text-center">{{ $servicio->precio }} €</td>
            <td class="text-center"><a href="{{ route('servicioDeSpa.edit', $servicio->servicio_id) }}" class="btn btn-outline-warning">Editar</a></td>
            <td class="text-center">
                <form action="{{ route('servicioDeSpa.destroy', $servicio->servicio_id) }}" method="post">                   
                    @csrf
                    @method('DELETE')
                    <input type="submit" class="btn btn-outline-danger" value="Borrar" onclick="return confirm('Va a eliminar el curso {{ $servicio->nombre }} ¿Está usted seguro?')">
                </form>
            </td>
        </tr>
        @endforeach        
    </tbody>  
</table>
<br><br>
<div class="container"> 
    <div class="row justify-content-around">
        <div class="font-italic row justify-content-md-center">
            <div class="pagination">
                {!! $servicioDeSpa->links() !!}
            </div>  
        </div>
    </div>
    <div class="row justify-content-around">
        <div class="font-italic row justify-content-md-center">
            <div class="pagination">
    
            @if($servicioDeSpa->total()<$servicioDeSpa->perPage())
                {{ $currentPaginationResult = $servicioDeSpa->total() }}
            @elseif($servicioDeSpa->count() >= $servicioDeSpa->total())
                {{ $currentPaginationResult = $servicioDeSpa->currentPage() * $servicioDeSpa->perPage() }}
            @else
                {{ $currentPaginationResult = ($servicioDeSpa->currentPage()-1) * $servicioDeSpa->perPage() + $servicioDeSpa->count()}}
             @endif
    
                <p>&nbsp; de &nbsp;</p> 
                     
                    {{ $servicioDeSpa->total() }}
                     
                    <p>&nbsp; servicios</p>
    
            </div>
        </div>
    </div>
</div>

@stop