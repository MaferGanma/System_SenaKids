<!-- resources/views/index.blade.php -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/estilo.css') }}">
    <title>Prueba de Conocimiento</title>
</head>
<body>
    <div class="container">
        <img src="{{ asset('images/Desafio/auris.png') }}" alt="" class="img">
        <header>
            <div class="puntaje">
                <img src="{{ asset('images/Desafio/puntos.png') }}" alt="">
                <span class="puntos">0</span>
            </div>
            <h1>Cuestionario</h1>
            <div class="jugador">
                <span class="nombre">-</span>
                <img src="{{ asset('images/Desafio/user.png') }}" alt="">
            </div>
        </header>

        <!-- PANTALLA DE BIENVENIDA -->
        <main class="inicio">
            <h2>Bienvenido!!</h2>
            <p>Ingresa tu nombre para iniciar</p>
            <input type="text" id="nombre">
            <button class="btn" id="comenzar">Comenzar</button>
        </main>
    </div>
    
    <script src="{{ asset('js/index.js') }}"></script>
</body>
</html>
