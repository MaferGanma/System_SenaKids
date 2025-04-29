<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/estiloQuizz.css') }}">
    <title>QUIZZ UNIDAD</title>
    <style>
        body {
            background: url("{{ asset('img/fondo.jpg') }}") ;
            background-size: cover;
            margin: 0;
        }
    </style>
</head>

<body>
    <h1><center>¡ADIVINA LA SEÑA DEL ABECEDARIO!</center></h1>

    <!-- Pantalla inicial -->
    <div id="pantalla-inicial">
        <p>¿Puedes adivinar qué letra es esta? Mira la seña y elige la letra correcta. ¡Vamos, demuestra todo lo que sabes del abecedario!</p>
        <button class="btn" onclick="comenzarJuego()">COMENZAR A JUGAR</button>
    </div>

    <!-- Pantalla juego -->
    <div class="pantalla-juego" id="pantalla-juego">
        <img src="{{ asset('img/tema1/ad.svg') }}" alt="" id="imgBandera">
        <div class="opciones">
            <div class="opcion" id="op0" onclick="comprobarRespuesta(0)">
                <div class="letra" id="l0">A</div>
                <div class="nombre" id="n0">OPCION A</div>
            </div>
            <div class="opcion" id="op1" onclick="comprobarRespuesta(1)">
                <div class="letra" id="l1">B</div>
                <div class="nombre" id="n1">OPCION B</div>
            </div>
            <div class="opcion" id="op2" onclick="comprobarRespuesta(2)">
                <div class="letra" id="l2">C</div>
                <div class="nombre" id="n2">OPCION C</div>
            </div>
        </div>
    </div>

    <!-- Pantalla final -->
    <div id="pantalla-final">
        <h2>CORRECTAS: <span id="numCorrectas">3</span></h2>
        <h2>INCORRECTAS: <span id="numIncorrectas">2</span></h2>
        <h2>🎯TU NOTA FINAL: <span id="notaFinal">0</span></h2>
        <button class="btn" onclick="volverAlInicio()">VOLVER AL INICIO</button>
    </div>

    <!-- Aquí inyectamos la URL base para las imágenes -->
    <script>
        window.assetUrl = "{{ asset('img/tema1') }}";
    </script>

    <!-- Botones controladores de la música-->
    <div style="position: fixed; bottom: 10px; right: 10px; z-index: 1000;">
        <button onclick="document.getElementById('background-music').play()" title="Reproducir música">🔈</button>
        <button onclick="document.getElementById('background-music').pause()" title="Pausar música">🔇</button>
    </div>

    <!-- Botones controladores de la música-->
    <audio id="background-music" autoplay loop>
        <source src="{{ asset('sounds/miniQuizz.mp3') }}" type="audio/mpeg">
        Tu navegador no soporta el audio HTML5.
    </audio>

    <script src="{{ asset('js/scriptQuizz1.js') }}"></script>
</body>

</html>
