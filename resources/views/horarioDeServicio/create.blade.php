@extends('app')@section('content')

<h1 class="text-primary">Nuevo horario de servicio </h1><br>
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
        <form action="{{ route('horarioDeServicio.store') }}" method="post">
            @csrf
            @method('POST')

            <div class="input-group mb-4">
                <div class="input-group-prepend">
                    <span class="input-group-text"  id="basic-addon1">Servicio</span>
                </div>                
                <div class="input-group-prepend">
                    <select class="custom-select" id="servicio_id" name="servicio_id" aria-label="servicio_id" aria-describedby="basic-addon1" required>
                        @foreach($servicios = App\servicioDeSpa::get() as $servicio) 
                        <option value = "{{ $servicio->servicio_id }}">({{ $servicio->servicio_id }}) {{ $servicio->nombre }} </option>
                        @endforeach 
                    </select>
                </div>
            </div>  
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"  id="basic-addon1">Día</span>
                </div>
                <input type="date" class="form-control" name="dia" aria-label="dia" aria-describedby="basic-addon1"  value= {{ date('d/m/Y', strtotime(Carbon\Carbon::now())) }} requiered>
            </div> 

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"  id="basic-addon1">Inicio</span>
                </div>
                <input type="time" class="form-control" name="inicio" aria-label="inicio" aria-describedby="basic-addon1" value = {{ date('H:00', strtotime(Carbon\Carbon::now()->modify('+1 hours'))) }} requiered>            
                <div class="input-group-prepend">
                    <span class="input-group-text"  id="basic-addon1">Fin</span>
                </div>
                <input type="time" class="form-control" name="fin" aria-label="fin" aria-describedby="basic-addon1"  value = {{ date('H:00', strtotime(Carbon\Carbon::now()->modify('+2 hours'))) }} requiered>                    
            </div>
            <input type="submit" class="btn btn-outline-success" value="Añadir horario">
        </form>
    </div>     
</div>       

@endsection





                
           
            
       