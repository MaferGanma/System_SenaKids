<!DOCTYPE html>
<html lang="en">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Drag and Drop</title>
    <!-- Google Fonts -->
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap"
      rel="stylesheet"
    />
    <!-- Stylesheet -->
    <link rel="stylesheet" href="{{ asset('css/styleDragAndDrop.css') }}" />
  </head>
  <body>
    <!-- partial:index.partial.html -->
    <section class="score">
        <span class="correct">0</span>/<span class="total">0</span>
        <button id="play-again-btn">Jugar de Nuevo</button>
      </section>
      <section class="draggable-items">
        <!-- Will be dynamically populated - Example Element: -->
        <!-- <i class="fab fa-codepen draggable" draggable="true" style="color: #111111;" id="codepen"></i> -->
      </section>
      <section class="matching-pairs">
        <!-- Will be dynamically populated - Example Element: -->
        <!-- <div class="matching-pair">
          <span class="label">Codepen</span><span class="droppable" data-brand="codepen"></span>
        </div> -->
      </section>
      <div id="end-message" class="end-message">
        <div class="end-message-content">
          <h2>🎉 ¡Bien hecho!</h2>
          <p id="final-score"></p>
          <button onclick="closeEndMessage()">Cerrar</button>
        </div>
      </div>
    <!-- Script -->
    <script src="{{ asset('js/scriptDragAndDrop5.js') }}"></script>
  </body>
</html>
