<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    <h1><center>¡ADIVINA EL TRABAJO!</center></h1>

    <!-- Pantalla inicial -->
    <div id="pantalla-inicial">
        <p>¿Qué trabajo está representado en esta seña? Mira bien la imagen y elige la ocupación correcta.</p>
        <button class="btn" onclick="comenzarJuego()">COMENZAR A JUGAR</button>
    </div>

    <!-- Pantalla juego -->
    <div class="pantalla-juego" id="pantalla-juego">
        <img src="{{ asset('img/tema8/ad.svg') }}" alt="" id="imgBandera">
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
        <button class="btn" onclick="volverAlInicio()">VOLVER AL INICIO</button>
    </div>

    <!-- Aquí inyectamos la URL base para las imágenes -->
    <script>
        window.assetUrl = "{{ asset('img/tema8') }}";
    </script>

    <script src="{{ asset('js/scriptQuizz8.js') }}"></script>
</body>

</html>
