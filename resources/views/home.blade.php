<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lengua de Señas Boliviana</title>
    <!-- Enlazamos el archivo CSS desde la carpeta public -->
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
    <div class="container"> <!-- Nuevo contenedor para el contenido -->
        <main class="grid">
            <section class="content item1">
                <h1>Lengua de Señas Boliviana</h1>
                <p>Ruta del Aprendizaje</p>
            </section>
            {{-- <a href="{{ route('tema1.alfabeto') }}"> --}}
            <a href="http://127.0.0.1:8000/admin/page/verbos-pronombres">
                <section class="card item2">
                    <h2>Verbos y Pronombres</h2>
                    <p>Conoce los verbos y pronombres más comunes en lengua de señas.</p>
                </section>
            </a>
            <section class="card item3">
                <h2>¡Desafío del Aprendizaje!</h2>
                <p>Comprueba tus conocimientos adquiridos en lengua de señas</p>
            </section>
            <section class="card item4">
                <h2>El Abecedario</h2>
                <p>¡El ABC! Aprende las letras en lengua de señas.</p>
            </section>
            <section class="card item5">
                <h2>Los Colores</h2><br>
                <p>Descubre todos los colores con señas.</p>
            </section>
            <section class="card item7">
                <h2>Alimentos y Bebidas</h2>
                <p>¡Descubre el delicioso mundo de los alimentos y bebidas! Aprende a decir los nombres de diferentes alimentos.</p>
            </section>
            <section class="card item8">
                <h2>Los Números</h2>
                <p>¡A contar! Aprende los números en señas.</p>
            </section>
            <section class="card item9">
                <h2>la Familia</h2>
                <p>Los miembros de tu familia.</p>
            </section>
            <section class="card item10">
                <h2>Días de la Semana</h2>
                <p>Conoce los días de la semana en señas.</p>
            </section>
            <section class="card item11">
                <h2>Oficios y Trabajos</h2>
                <p>Aprende los oficios más comunes en lengua de señas.</p>
            </section>
        </main>
    </div> <!-- Fin del contenedor -->

    <!-- Enlazamos el archivo JS desde la carpeta public -->
    {{-- <script src="{{ asset('js/script.js') }}"></script> --}}
</body>
</html>
