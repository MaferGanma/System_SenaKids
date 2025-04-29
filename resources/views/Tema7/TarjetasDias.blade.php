<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Slider</title>

    <!-- Usamos asset() para cargar el archivo CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
    <div class="container">
        <div class="slider">
            <div class="item">
                <h1>Seña: Viernes</h1>
                <p>Viernes en lengua de señas.</p>
                <img src="{{ asset('/images/Tema7_Dias/viernes.gif')}}" alt="viernes">
            </div>
            
            <div class="item">
                <h1>Seña: Sábado</h1>
                <p>Sábado en lengua de señas.</p>
                <img src="{{ asset('/images/Tema7_Dias/sabado.gif')}}" alt="sabado">
            </div>
            
            <div class="item">
                <h1>Seña: Domingo</h1>
                <p>Domingo en lengua de señas.</p>
                <img src="{{ asset('/images/Tema7_Dias/domingo.gif')}}" alt="domingo">
            </div>
            {{-- Aca comenzamos --}}
            <div class="item">
                <h1>Seña: Días de la semana</h1>
                <p>Días de la semana en lengua de señas.</p>
                <img src="{{ asset('/images/Tema7_Dias/dias_semana.gif')}}" alt="Días de la semana">
            </div>
            
            <div class="item">
                <h1>Seña: Lunes</h1>
                <p>Lunes en lengua de señas.</p>
                <img src="{{ asset('/images/Tema7_Dias/lunes.gif')}}" alt="lunes">
            </div>
            
            <div class="item">
                <h1>Seña: Martes</h1>
                <p>Martes en lengua de señas.</p>
                <img src="{{ asset('/images/Tema7_Dias/martes.gif')}}" alt="martes">
            </div>
            
            <div class="item">
                <h1>Seña: Miércoles</h1>
                <p>Miércoles en lengua de señas.</p>
                <img src="{{ asset('/images/Tema7_Dias/miercoles.gif')}}" alt="miercoles">
            </div>
            
            <div class="item">
                <h1>Seña: Jueves</h1>
                <p>Jueves en lengua de señas.</p>
                <img src="{{ asset('/images/Tema7_Dias/jueves.gif')}}" alt="jueves">
            </div>
            
            <button id="next">></button>
            <button id="prev"><</button>
        </div>
    </div>
    <!-- Botones controladores de la música-->
    <div style="position: fixed; bottom: 10px; right: 10px; z-index: 1000;">
        <button onclick="document.getElementById('background-music').play()" title="Reproducir música">🔈</button>
        <button onclick="document.getElementById('background-music').pause()" title="Pausar música">🔇</button>
    </div>

    <!-- Botones controladores de la música-->
    <audio id="background-music" autoplay loop>
        <source src="{{ asset('sounds/dashboard.mp3') }}" type="audio/mpeg">
        Tu navegador no soporta el audio HTML5.
    </audio>
    <!-- Usamos asset() para cargar el archivo JS -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>
