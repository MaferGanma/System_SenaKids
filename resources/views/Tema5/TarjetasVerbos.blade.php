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
                <h1>Seña: Practicar</h1>
                <p>Practicar en lengua de señas.</p>
                <img src="{{ asset('/images/Tema5_Verbos/practicar.gif')}}" alt="practicar">
            </div>
            
            <div class="item">
                <h1>Seña: Dormir</h1>
                <p>Domir en lengua de señas.</p>
                <img src="{{ asset('/images/Tema5_Verbos/dormir.gif')}}" alt="dormir">
            </div>
            
            <div class="item">
                <h1>Seña: Pintar</h1>
                <p>Pintar en lengua de señas.</p>
                <img src="{{ asset('/images/Tema5_Verbos/pintar.gif')}}" alt="pintar">
            </div>

            <div class="item">
                <h1>Seña: Verbos</h1>
                <p>Verbos en lengua de señas.</p>
                <img src="{{ asset('/images/Tema5_Verbos/verbos.gif')}}" alt="verbos">
            </div>
            
            <div class="item">
                <h1>Seña: Cocinar</h1>
                <p>Cocinar en lengua de señas.</p>
                <img src="{{ asset('/images/Tema5_Verbos/cocinar.gif')}}" alt="cocinar">
            </div>
            
            <div class="item">
                <h1>Seña: Comprar</h1>
                <p>Comprar en lengua de señas.</p>
                <img src="{{ asset('/images/Tema5_Verbos/comprar.gif')}}" alt="comprar">
            </div>
            
            <div class="item">
                <h1>Seña: Vender</h1>
                <p>Vender en lengua de señas.</p>
                <img src="{{ asset('/images/Tema5_Verbos/vender.gif')}}" alt="vender">
            </div>
            
            <div class="item">
                <h1>Seña: Aprender</h1>
                <p>Aprender en lengua de señas.</p>
                <img src="{{ asset('/images/Tema5_Verbos/aprender.gif')}}" alt="aprender">
            </div>
            
            <div class="item">
                <h1>Seña: Abrir</h1>
                <p>Abrir en lengua de señas.</p>
                <img src="{{ asset('/images/Tema5_Verbos/abrir.gif')}}" alt="abrir">
            </div>
            
            <div class="item">
                <h1>Seña: Hablar</h1>
                <p>Hablar en lengua de señas.</p>
                <img src="{{ asset('/images/Tema5_Verbos/hablar.gif')}}" alt="hablar">
            </div>
            
            <div class="item">
                <h1>Seña: Comer</h1>
                <p>Comer en lengua de señas.</p>
                <img src="{{ asset('/images/Tema5_Verbos/comer.gif')}}" alt="comer">
            </div>
            
            <div class="item">
                <h1>Seña: Dibujar</h1>
                <p>Dibujar en lengua de señas.</p>
                <img src="{{ asset('/images/Tema5_Verbos/dibujar.gif')}}" alt="dibujar">
            </div>
            
            <div class="item">
                <h1>Seña: Copiar</h1>
                <p>Copiar en lengua de señas.</p>
                <img src="{{ asset('/images/Tema5_Verbos/copiar.gif')}}" alt="copiar">
            </div>
            
            <div class="item">
                <h1>Seña: Pedir</h1>
                <p>Pedir en lengua de señas.</p>
                <img src="{{ asset('/images/Tema5_Verbos/pedir.gif')}}" alt="pedir">
            </div>
            
            <div class="item">
                <h1>Seña: Escribir</h1>
                <p>Escribir en lengua de señas.</p>
                <img src="{{ asset('/images/Tema5_Verbos/escribir.gif')}}" alt="escribir">
            </div>
            
            <div class="item">
                <h1>Seña: Ver</h1>
                <p>Ver en lengua de señas.</p>
                <img src="{{ asset('/images/Tema5_Verbos/ver.gif')}}" alt="ver">
            </div>
            
            <div class="item">
                <h1>Seña: Venir</h1>
                <p>Venir en lengua de señas.</p>
                <img src="{{ asset('/images/Tema5_Verbos/venir.gif')}}" alt="venir">
            </div>
            
            <div class="item">
                <h1>Seña: Ir</h1>
                <p>Ir en lengua de señas.</p>
                <img src="{{ asset('/images/Tema5_Verbos/ir.gif')}}" alt="ir">
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
