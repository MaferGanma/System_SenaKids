<!-- resources/views/menu.blade.php -->
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
            <h1>CUESTIONARIO</h1>
            <div class="jugador">
                <span class="nombre" id="nombre">Martín</span>
                <img src="{{ asset('images/Desafio/user.png') }}" alt="">
            </div>
        </header>

        <!-- SECCIÓN MENU DEL JUEGO -->
        <main class="menu">
            <h2>Hola <span id="nombre-jugador">Martín</span></h2>
            <p>Elige un tema con el que deseas comenzar</p>
            <div class="categorias">
                <div class="categoria" id="general">
                    <img src="{{ asset('images/Desafio/general.png') }}" alt="" class="foto-categoria">
                    <h3>Alfabeto</h3>
                </div>
                <div class="categoria" id="musica">
                    <img src="{{ asset('images/Desafio/musica.png') }}" alt="" class="foto-categoria">
                    <h3>Números</h3>
                </div>
                <div class="categoria" id="peliculas">
                    <img src="{{ asset('images/Desafio/peliculas.png') }}" alt="" class="foto-categoria">
                    <h3>Colores</h3>
                </div>
                <div class="categoria" id="deportes">
                    <img src="{{ asset('images/Desafio/deportes.png') }}" alt="" class="foto-categoria">
                    <h3>Familia</h3>
                </div>
                <div class="categoria" id="programacion">
                    <img src="{{ asset('images/Desafio/programacion.png') }}" alt="" class="foto-categoria">
                    <h3>Alimentos</h3>
                </div>
                <div class="categoria" id="juegos">
                    <img src="{{ asset('images/Desafio/juegos.png') }}" alt="" class="foto-categoria">
                    <h3>Trabajos</h3>
                </div>
            </div>
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
    <source src="{{ asset('sounds/Dashboard.mp3') }}" type="audio/mpeg">
Tu navegador no soporta el audio HTML5.
</audio>
    <script src="{{ asset('js/menu.js') }}"></script>
</body>
</html>
