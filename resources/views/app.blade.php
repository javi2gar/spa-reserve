<!doctype html>
<html lang="es">

<head>
    <!--Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!--Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!--Fonts -->
    <link href='//fonts.googleapis.com/css?family=PT Sans:400,700' rel='stylesheet' type='text/css'>
           <!-- Styles -->
           <style>
            html, body, footer, .table-bordered {
                background-color: #343a40;
                color: #ffffff;
                font-family: 'PT Sans', sans-serif;
                font-weight: 200;
                margin: 0;
            }
            th {
                background-color: #007bff;;
                color: #ffffff; ;
                font-family: 'Nunito', sans-serif;
                font-weight: 600;
            }


            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

        </style>
    <title>Spa Reserve</title>
</head>

<body>
    <!--Fixed navbar -->
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark"><a class="navbar-brand" href="{{ url('/') }}">Spa Reserve</a><button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item"><a class="nav-link" href="{{ url('/servicioDeSpa') }}">Servicios</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('/horarioDeServicio') }}">Horarios</a></li>
                <li class="nav-item"><a class="nav-link" href="">Reservas</a></li>
            </ul>
        </div>
    </nav><br><br><br><br>
    <!--<div class="container-fluid"> -->
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <!--Aquí incluiremos el contenido de nuestra aplicación -->
                @yield('content')
                
                <footer> 
                    <br>
                    <hr>
                    <div class="container"> 
                        <div class="row justify-content-around">
                            <div class="font-italic row justify-content-md-center">
                                by javi2gar
                            </div>            
                        </div>
                    </div>
                    <br>
                </footer>
            </div>    
        </div>
    </div>
    <!--</div> -->
    <!--Optional JavaScript -->
    <!--jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html