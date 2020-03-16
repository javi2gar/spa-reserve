@extends('app')@section('content')

<!--<div class="container-fluid"> -->
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <br><br>
            <h1>Spa Reserve</h1>
            <br>
            <h2>Disfruta de nuestros servicios</h2>
            <br><br>
            <h4>Nada mejor que un espacio privado y tranquilo para disfrutar con tu pareja. Colores tenues y aromas suaves te envuelven en este lugar. 
                El escenario perfecto para un día inolvidable que marcar en el calendario. Una hora de circuito de spa que puede completarse con un masaje corporal 
                para nutrir tu piel y la de tu pareja.
            </h4>
            <br><br>
            <h5>Descubre nuestros <a href="{{ url('/servicioDeSpa') }}"> {{ App\ServicioDeSpa::count() }} </a> <strong> servicios</strong>
            que tenemos disponibles actualmente en nuestras instalaciones.</h5>
            <br><br>
            <br><br>
            <a href="{{ url('/servicioDeSpa') }}">Listado de servicios</a>
        </div>
    </div>
</div>
@yield('content')                
           