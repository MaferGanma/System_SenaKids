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
            <div class="contenedor-pregunta">
                <img id="imagen-pregunta" src="" alt="Imagen de la pregunta" class="imagen-pregunta">
            </div>
            <button class="btn" id="siguiente">Siguiente</button>
        </main>
    </div>
    </div> <!-- Fin del contenedor -->
    <!-- Botones controladores de la música-->
    <div style="position: fixed; bottom: 10px; right: 10px; z-index: 1000;">
        <button onclick="document.getElementById('background-music').play()" title="Reproducir música">🔈</button>
        <button onclick="document.getElementById('background-music').pause()" title="Pausar música">🔇</button>
    </div>

    <!-- Botones controladores de la música-->
    <audio id="background-music" autoplay loop>
        <source src="{{ asset('sounds/FinalQuizz.mp3') }}" type="audio/mpeg">
        Tu navegador no soporta el audio HTML5.
    </audio>
    <script src="{{ asset('js/juego.js') }}"></script>
</body>

</html>
