<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Bachillerato Digital Num. 24</title>
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    </head>
    <body class="inicio">
      <div class="barraInicio">
        <nav>
                <ul>
                    <li><a href="{{route('inicio')}}">Inicio</a></li>
                    <li ><a href="{{ route('docentes') }}">Docentes</a></li>
                    <li><a href="{{ route('calendario') }}">Calendario</a></li>
                    <li class="iniciar"><a href="{{ route('login') }}">Iniciar Sesión</a></li>
                </ul>
        </nav>
      </div>

      <div class="contenido">
       <img src="{{asset('img/loginAlum.png')}}" alt="">
       <div class="card">
            <h3 class="titulo">Iniciar Sesión</h3>
            <p>Por favor complete su información a continuación:</p>
            <img src="{{asset('img/user.png')}}" alt="">
                
            <form action="POST">
                <div class="correo">
                    <input type="email" placeholder="Correo">
                </div>
                <br>
                <div class="pass">
                    <input type="password" placeholder="Contraseña">
                </div>
            </form>
            <br>
            <div class="d-grid mx-auto">
                <button type="submit" class="enviar">Enviar</button>
            </div>
            <br>
            <div class="olvido">
                <a href="">¿Olvidaste la contraseña?</a>
            </div>
        </div>
      </div>
    </body>
</html>
