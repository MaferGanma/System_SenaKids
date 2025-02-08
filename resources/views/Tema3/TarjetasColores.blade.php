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
                <h1>Rojo</h1>
                <p>Este es el color Rojo</p>
                <img src="https://via.placeholder.com/400x500/FF0000/FFFFFF?text=Rojo" alt="Rojo">
            </div>
            <div class="item">
                <h1>Verde</h1>
                <p>Este es el color Verde</p>
                <img src="https://via.placeholder.com/400x500/00FF00/FFFFFF?text=Verde" alt="Verde">
            </div>
            <div class="item">
                <h1>Azul</h1>
                <p>Este es el color Azul</p>
                <img src="https://us.123rf.com/450wm/luismolinero/luismolinero1610/luismolinero161001099/64903614-hombre-saludando-científico.jpg" alt="Azul">
            </div>
            <div class="item">
                <h1>Amarillo</h1>
                <p>Este es el color Rojo</p>
                {{-- Este es el color Amarillo --}}
                <img src="https://img.freepik.com/foto-gratis/hombre-guapo-saludando_1368-9465.jpg" alt="Amarillo">
            </div>
            <div class="item">
                <h1>Fucsia</h1>
                <p>Este es el color Fucsia</p>
                <img src="https://via.placeholder.com/400x500/FF00FF/FFFFFF?text=Fucsia" alt="Fucsia">
            </div>
            <div class="item">
                <h1>Cian</h1>
                <p>Este es el color Cian</p>
                <img src="https://via.placeholder.com/400x500/00FFFF/FFFFFF?text=Cian" alt="Cian">
            </div>
            <div class="item">
                <h1>Negro</h1>
                <p>Este es el color Negro</p>
                <img src="https://via.placeholder.com/400x500/000000/FFFFFF?text=Negro" alt="Negro">
            </div>
            <div class="item">
                <h1>Hola</h1>
                <p>Este es el color Negro</p>
                <img src="https://via.placeholder.com/400x500/000000/FFFFFF?text=Negro" alt="Negro">
            </div>
            <button id="next">></button>
            <button id="prev"><</button>
        </div>
    </div>

    <!-- Usamos asset() para cargar el archivo JS -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
