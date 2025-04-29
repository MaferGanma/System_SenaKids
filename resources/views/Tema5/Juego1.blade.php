<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Drag and Drop 5</title>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet" />
    <!-- Stylesheet -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/styleDragAndDrop.css') }}" />
</head>

<body>

    {{-- <a href="{{route('prueba')}}">Presiona</a> --}}
    <section class="score">
        <span class="correct">0</span>/<span class="total">0</span>
        <div id="timer-display" style="font-size: 1.2em; margin: 10px 0;"></div>

        <button id="play-again-btn">Jugar de Nuevo</button>
    </section>
    <section class="draggable-items">
    </section>
    <section class="matching-pairs">
    </section>
    <div id="end-message" class="end-message">
        <div class="end-message-content">
            <h2>🎉 ¡Bien hecho!</h2>
            <p id="final-score"></p>
            <button onclick="closeEndMessage()">Cerrar</button>
        </div>
    </div>
    <!-- Botones controladores de la música-->
    <div style="position: fixed; bottom: 10px; right: 10px; z-index: 1000;">
        <button onclick="document.getElementById('background-music').play()" title="Reproducir música">🔈</button>
        <button onclick="document.getElementById('background-music').pause()" title="Pausar música">🔇</button>
    </div>

    <!-- Botones controladores de la música-->
    <audio id="background-music" autoplay loop>
        <source src="{{ asset('sounds/minigame1.mp3') }}" type="audio/mpeg">
        Tu navegador no soporta el audio HTML5.
    </audio>
    <!-- Script -->
    <script src="{{ asset('js/scriptDragAndDrop5.js') }}"></script>
</body>

</html>
