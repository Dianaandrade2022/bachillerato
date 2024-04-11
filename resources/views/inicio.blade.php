@extends('app')
@section('title','Inicio')

@section('estilo')
<link rel="stylesheet" href="{{asset('css/nav2.css')}}">
<link rel="stylesheet" href="{{ asset('css/info.css') }}">

@endsection
<div class="barraInicio">
    @section('navbar')
    @parent
    @endsection

</div>
@section('content')

<div class="">

    <div class="pt-1">
        <div id="carouselExampleCaptions" class="carousel slide mt-2">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active" data-bs-interval="3000">
                    <img src="{{ asset('img/1c.png')}}" class="w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                    </div>
                </div>
                <div class="carousel-item" data-bs-interval="3000">
                    <img src="{{ asset('img/2c.png')}}" class="w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5 class="ins">Inscripcciones</h5>
                        <button type="button" class="btn btn-primary">Ver más</button>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>

    <div class="container">
        <div id="carouselExampleInterval" class="carousel slide my-2 bg-fondo p-5 rounded-3 text-center" data-bs-ride="carousel" style="height:30vh; max-height:35vh;">
            <div class="carousel-inner">
                <div class="carousel-item active" data-bs-interval="3000">
                    <h5>Misión</h5>
                    <p>Servir a la comunidad formando
                        alumnos con habilidades y competencias que les permitan desarrollarse
                        profesionalmente para enfrentar los retos y desafíos del entorno local,
                        regional y nacional; orientado por profesores íntegros y de calidad en la
                        enseñanza.</p>
                </div>
                <div class="carousel-item" data-bs-interval="4000">
                    <h5>Valores</h5>
                    <p>Responsabilidad, Respeto, Armonía,
                        Amistad, Honestidad, Lealtad, Cooperación.</p>
                </div>
                <div class="carousel-item" data-bs-interval="4000">
                    <h5>Visión</h5>
                    <p>Posicionarse como centro educativo
                        de referencia y ser un instrumento de colaboración, participación y desarrollo
                        que facilite un proceso de enseñanza-aprendizaje de excelencia, creativa e innovadora
                        que permita continuar con estudios superiores y/o integrarse al ámbito laboral.</p>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
        <div class="galeria my-5">
            <h1>Galería</h1>
            <div class="contenedor-imagenes">
                <div class="imagen">
                    <img src="{{ asset('img/1.png')}}" alt="">
                    <div class="overlay">
                        <h2>Bachillerato 24</h2>
                    </div>
                </div>
                <div class="imagen">
                    <img src="{{ asset('img/2.png')}}" alt="">
                    <div class="overlay">
                        <h2>Bachillerato 24</h2>
                    </div>
                </div>
                <div class="imagen">
                    <img src="{{ asset('img/3.png')}}" alt="">
                    <div class="overlay">
                        <h2>Bachillerato 24</h2>
                    </div>
                </div>
                <div class="imagen">
                    <img src="{{ asset('img/4.png')}}" alt="">
                    <div class="overlay">
                        <h2>Bachillerato 24</h2>
                    </div>
                </div>

            </div>
        </div>
        <div class="border-top border-secondary py-4">
        <h2>Formulario de Contacto</h2>
        <form action="" method="POST">
            <div class="form-group">
                <label for="name">Nombre:</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="email">Correo electrónico:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="message">Mensaje:</label>
                <textarea id="message" name="message" required></textarea>
            </div>
            <div class="form-group">
                <button type="submit" class="btn bg-fondo">Enviar Mensaje</button>
            </div>
        </form>
        </div>
    </div>
</div>
<footer class="row row-cols-1 row-cols-sm-2 row-cols-md-3 py-5 my-5 border-top border-secondary">
    <div class="">
        <h3>¿Estas interesado? </h3>
        <p>Conoce nuestra oferta educativa</p>
    </div>
    <div class="col-6">
        <h3>Contactanos</h3><br>
        <p><i class="fi fi-rr-marker"></i> Ubicación: </p>
        <p>Carretera federal Tehuacán. Orizaba km. 11.5 Col. Francisco I. Madero, Chapulco, Puebla. C.P. 75810</p>

        <p><i class="fi fi-rr-phone-flip"></i> Télefono: </p>
        <p>(+52) 238 100 1660</p>
        <p><i class="fi fi-rr-envelope"></i> Correo: </p>
        <p>21ebh0999q@seppue.gob.mx</p>
    </div>
</footer>
</div>
</div>
</div>
@endsection
