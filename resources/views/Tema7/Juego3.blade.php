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

    <!-- Script del juego -->
    <script src="{{ asset('js/scriptAdivinanza7.js') }}"></script>
</body>
</html>
