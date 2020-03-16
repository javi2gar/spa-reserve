@extends('app')@section('content')
<h1 class="text-primary">Listado de Horarios de servicios</h1>

<br>

<div class="container">
    <div class="row">
        <div class="col-9  ">
            <a type="button" class="btn btn-outline-success" href="{{ route('horarioDeServicio.create') }}">Añadir nuevo horario de servicio</a>
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

<table class="table table-bordered" id="tableHoras">
    <thead>
        <tr>
            <th class="text-center">Servicio</th>
            <th class="text-center">Día</th>
            <th class="text-center">Inicio</th>
            <th class="text-center">Fin</th>
            <th colspan="2"  class="text-center">Acciones</th>
        </tr>
    </thead>

    <tbody>       

        @foreach($horarioDeServicio as $horario)
        <?php 
            $nombreServicio = App\ServicioDeSpa::find($horario->servicio_id)->nombre;
            $dia = date('d/m/Y', strtotime($horario->dia));
            $inicio = date('H:i', strtotime($horario->inicio));      
            $fin = date('H:i', strtotime($horario->fin));
        ?>
        <tr>            
            <td class="text-center">{{ $nombreServicio }}</td>
            <td class="text-center">{{ $dia }}</td>
            <td class="text-center">{{ $inicio }}</td>            
            <td class="text-center">{{ $fin }}</td>
            <td class="text-center"><a href="{{ route('horarioDeServicio.edit', $horario->horario_id) }}" class="btn btn-outline-warning">Editar</a></td>
            <td class="text-center">
                <form action="{{ route('horarioDeServicio.destroy', $horario->horario_id) }}" method="post">                   
                    @csrf
                    @method('DELETE')
                    <input type="submit" class="btn btn-outline-danger" value="Borrar" onclick="return confirm('Va a eliminar la hora {{ $inicio }}-{{ $fin }} del servicio {{ $nombreServicio }} el día {{ $dia }} ¿Está usted seguro?')">
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
                {!! $horarioDeServicio->links() !!}
            </div>  
        </div>
    </div>
    <div class="row justify-content-around">
        <div class="font-italic row justify-content-md-center">
            <div class="pagination">
    
            @if($horarioDeServicio->total()<$horarioDeServicio->perPage())
                {{ $currentPaginationResult = $horarioDeServicio->total() }}
            @elseif($horarioDeServicio->count() >= $horarioDeServicio->total())
                {{ $currentPaginationResult = $horarioDeServicio->currentPage() * $horarioDeServicio->perPage() }}
            @else
                {{ $currentPaginationResult = ($horarioDeServicio->currentPage()-1) * $horarioDeServicio->perPage() + $horarioDeServicio->count()}}
             @endif
    
                <p>&nbsp; de &nbsp;</p> 
                     
                    {{ $horarioDeServicio->total() }}
                     
                    <p>&nbsp; horas de servicios</p>
    
            </div>
        </div>
    </div>
</div>

@stop