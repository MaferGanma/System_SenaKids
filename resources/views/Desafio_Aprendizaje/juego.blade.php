<!-- resources/views/juego.blade.php -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/estilo.css') }}">
    <title>Cuestionario</title>
</head>
<body>
    <div class="container">
        <img src="{{ asset('images/Desafio/auris.png') }}" alt="" class="img">
        <header>
            <div class="puntaje">
                <img src="{{ asset('images/Desafio/puntos.png') }}" alt="">
                <span class="puntos" id="puntos">0</span>
            </div>
            <h1>QUIZ</h1>
            <div class="jugador">
                <span class="nombre" id="nombre">Martín</span>
                <img src="{{ asset('images/Desafio/user.png') }}" alt="">
            </div>
        </header>

        <main class="juego">
            <div class="contador-pregunta">
                <span id="num-pregunta" class="num-pregunta">01</span>
                /
                <span> 5</span>
            </div>
            <p id="txt-pregunta" class="pregunta">
                ¿Texto de la pregunta 1?
            </p>

            <div class="opciones" id="opciones">
                <button class="opcion" id="a">Opcion A</button>
                <button class="opcion" id="b">Opcion B</button>
                <button class="opcion" id="c">Opcion C</button>
                <button class="opcion" id="d">OPCION D</button>
            </div>

            <button class="btn" id="siguiente">Siguiente</button>
        </main>
    </div>

    <script src="{{ asset('js/juego.js') }}"></script>
</body>
</html>
