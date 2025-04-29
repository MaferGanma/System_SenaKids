<!-- resources/views/final.blade.php -->
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
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

        <main class="final">
            <h2>CUESTIONARIO FINALIZADO</h2>

            <div class="medalla">
                <img src="{{ asset('images/Desafio/medalla.png') }}" alt="">
                <h3 id="nombre-jugador" class="nombre">Marcos</h3>
            </div>

            <span id="puntaje-final" class="puntaje-final">10,000 Puntos</span>

            <h2>ACERTADAS: <span id="total-acertadas" class="final-score">20</span></h2>
            <h2>INCORRECTAS: <span id="total-no-acertadas" class="final-score">5</span></h2>
            <button class="btn" id="btn-comenzar">Comenzar de Nuevo</button>
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
        <source src="{{ asset('sounds/Win.mp3') }}" type="audio/mpeg">
        Tu navegador no soporta el audio HTML5.
    </audio>
    <script src="{{ asset('js/final.js') }}"></script>
</body>

</html>
