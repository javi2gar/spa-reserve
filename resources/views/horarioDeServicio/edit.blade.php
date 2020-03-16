@extends('app')@section('content')

<h1 class="text-primary">Actualizar horario de servicio nº  {{ $horarioDeServicio->horario_id }}</nav> </h1><br>
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
        <form action="{{ route('horarioDeServicio.update', $horarioDeServicio->horario_id) }}" method="post">
            @csrf
            @method('PATCH')

            <div class="input-group mb-4">
                <div class="input-group-prepend">
                    <span class="input-group-text"  id="basic-addon1">Servicio</span>
                </div>                
                <div class="input-group-prepend">
                    <select class="custom-select" id="servicio_id" name="servicio_id" aria-label="servicio_id" aria-describedby="basic-addon1" required>
                        @foreach($servicios = App\servicioDeSpa::get() as $servicio) 
                            <option value = "{{ $servicio->servicio_id }}" 
                                @if ($horarioDeServicio->servicio_id == $servicio->servicio_id) 
                                    echo selected 
                                @endif
                            >
                                ({{ $servicio->servicio_id }}) {{ $servicio->nombre }} 
                            </option>
                        @endforeach 
                    </select>
                </div>
            </div>  
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"  id="basic-addon1">Día</span>
                </div>
                <input type="date" class="form-control" name="dia" aria-label="dia" aria-describedby="basic-addon1"  value= "{{ date$horarioDeServicio->dia }}" requiered>
            </div> 

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"  id="basic-addon1">Inicio</span>
                </div>
                <input type="time" class="form-control" name="inicio" aria-label="inicio" aria-describedby="basic-addon1" value = "{{ $horarioDeServicio->inicio }}" requiered>            
                <div class="input-group-prepend">
                    <span class="input-group-text"  id="basic-addon1">Fin</span>
                </div>
                <input type="time" class="form-control" name="fin" aria-label="fin" aria-describedby="basic-addon1"  value = "{{ $horarioDeServicio->fin }}" requiered>                    
            </div>
            <input type="submit" class="btn btn-outline-success" value="Actualizar horario">
        </form>
    </div>     
</div>       

@endsection







                
           
            
       