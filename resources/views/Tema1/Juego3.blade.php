<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adivina la Palabra</title>

    <!-- Google Fonts (opcional si usás alguno) -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet" />

    <!-- Estilo del juego -->
    <link rel="stylesheet" href="{{ asset('css/styleAdivinanza.css') }}">
</head>
<body>

    <section>
        <div id="cronometro">0m 0s</div>

        <h2>Adivina la Palabra</h2>
        <div id="palabra">
            <div class="letra pintar">G</div>
            <div class="letra">U</div>
            <div class="letra">I</div>
            <div class="letra">T</div>
            <div class="letra">A</div>
            <div class="letra">R</div>
            <div class="letra">R</div>
            <div class="letra">A</div>
            <meta name="csrf-token" content="{{ csrf_token() }}">
        </div>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <h3>Ayuda: <span id="ayuda">Instrumento Musical</span></h3>
        <h3>Intentos restantes: <span id="intentos">5</span></h3>
        <h3>Letras ingresadas: <span id="letrasIngresadas"></span></h3>

        <button id="botonPalabra" onclick="cargarNuevaPalabra()" style="display: none;">Nueva Palabra</button>

        <div id="imagenEscritorio">
            <img id="imagenPalabra" src="" alt="Imagen de la palabra" />
        </div>

        <div id="tecladoVirtual"></div>

    </section>

    <!-- Botones controladores de la música-->
    <div style="position: fixed; bottom: 10px; right: 10px; z-index: 1000;">
        <button onclick="document.getElementById('background-music').play()" title="Reproducir música">🔈</button>
        <button onclick="document.getElementById('background-music').pause()" title="Pausar música">🔇</button>
    </div>

    <!-- Botones controladores de la música-->
    <audio id="background-music" autoplay loop>
        <source src="{{ asset('sounds/minigame3.mp3') }}" type="audio/mpeg">
        Tu navegador no soporta el audio HTML5.
    </audio>

    <!-- Script del juego -->
    <script src="{{ asset('js/scriptAdivinanza1.js') }}"></script>
</body>
</html>
