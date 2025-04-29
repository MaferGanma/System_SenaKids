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
                <h1>Seña: 8</h1>
                <p>Este es el número 8 en lengua de señas.</p>
                <img src="{{ asset('/images/Tema2_Numeros/Numbers-08.jpg')}}" alt="8">
            </div>
            <div class="item">
                <h1>Seña: 9</h1>
                <p>Este es el número 9 en lengua de señas.</p>
                <img src="{{ asset('/images/Tema2_Numeros/Numbers-09.jpg')}}" alt="9">
            </div>
            <div class="item">
                <h1>Seña: 10</h1>
                <p>Este es el número 10 en señas.</p>
                <img src="{{ asset('/images/Tema2_Numeros/Numbers-10.jpg')}}" alt="10">
            </div>
            <div class="item">
                <h1>Seña: 1</h1>
                <p>Este es el número 1 en lengua de señas.</p>
                <img src="{{ asset('/images/Tema2_Numeros/Numbers-01.jpg')}}" alt="1">
            </div>
            <div class="item">
                <h1>Seña: 2</h1>
                <p>Este es el número 2 en lengua de señas.</p>
                <img src="{{ asset('/images/Tema2_Numeros/Numbers-02.jpg')}}" alt="2">
            </div>
            <div class="item">
                <h1>Seña: 3</h1>
                <p>Este es el número 3 en lengua de señas.</p>
                <img src="{{ asset('/images/Tema2_Numeros/Numbers-03.jpg')}}" alt="3">
            </div>
            
            <div class="item">
                <h1>Seña: 4</h1>
                <p>Este es el número 4 en lengua de señas.</p>
                <img src="{{ asset('/images/Tema2_Numeros/Numbers-04.jpg')}}" alt="4">
            </div>
            
            <div class="item">
                <h1>Seña: 5</h1>
                <p>Este es el número 5 en lengua de señas.</p>
                <img src="{{ asset('/images/Tema2_Numeros/Numbers-05.jpg')}}" alt="5">
            </div>
            
            <div class="item">
                <h1>Seña: 6</h1>
                <p>Este es el número 6 en lengua de señas.</p>
                <img src="{{ asset('/images/Tema2_Numeros/Numbers-06.jpg')}}" alt="6">
            </div>
            
            <div class="item">
                <h1>Seña: 7</h1>
                <p>Este es el número 7 en lengua de señas.</p>
                <img src="{{ asset('/images/Tema2_Numeros/Numbers-07.jpg')}}" alt="7">
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

    <!-- Enlazamos el archivo JS desde la carpeta public -->
    {{-- <script src="{{ asset('js/script.js') }}"></script> --}}

    <!-- Botones controladores de la música-->
	<audio id="background-music" autoplay loop>
        <source src="{{ asset('sounds/dashboard.mp3') }}" type="audio/mpeg">
    Tu navegador no soporta el audio HTML5.
    </audio>
    <!-- Usamos asset() para cargar el archivo JS -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
