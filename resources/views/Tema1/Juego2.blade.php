<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Memograma Imagen - Palabra</title>
  <link rel="stylesheet" href="stylememograma.css" /> 
</head>
<body>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <div class="container">
    <div class="title-container">
      <h1 class="game-title">Memorama Mágico: Imagen y Palabra</h1>
    </div>

    <div class="score-container">
      <h2>Parejas <span>0</span> de <span id="intentos">0</span> intentos
        <button class="pulse" id="escuchar">Sonido: ON</button>
      </h2>
    </div>


    <ul class="cards"></ul>
  </div>


      {{-- <input type="text" id="userId" value="{{ Auth::id() }}"> --}}
            {{-- <button onclick="guardarPuntaje(100)">Presionar</button> --}}
      {{-- <a href="{{route('prueba')}}">Presionar</a> --}}


      <input type="hidden" id="userId" value="{{ Auth::id() }}">


  <div id="modalResultados" class="modal">
    <div class="modal-content">
      <h2>¡Felicidades! 🎉</h2>
      <p id="totalIntentos"></p>
      <button id="btnReintentar">Intentar de nuevo</button>
      <button id="btnSiguiente">Siguiente</button>
    </div>
  </div>

  <input type="hidden" id="userId" value="{{ Auth::id() }}">

    <audio id="fondo" loop src="{{asset('/public/sounds/musica.mp3')}}" type="audio/mpeg"/>
    <audio id="sonidos" src="" type="audio/mpeg"/>
    <script src="{{asset('js/scriptmemograma.js')}}"></script>

  <audio id="fondo" loop src="sounds/musica.mp3" type="audio/mpeg"></audio>
  <audio id="sonidos" src="" type="audio/mpeg"></audio>
  <script src="scriptmemograma.js"></script>
</body>
</html>