<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Desafio del Aprendizaje</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.3/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 flex justify-center items-center h-screen">

    <div class="bg-white p-8 rounded shadow-lg max-w-sm text-center">
        <h1 class="text-2xl font-semibold text-gray-700 mb-4">Instrucciones del Juego</h1>
        <p class="text-gray-600 mb-6">
            Aquí colocare las instrucciones, se vera mejor confia en el proceso.
        </p>

        <form action="{{ route('indexjuego') }}" method="GET">
            <button type="submit" class="px-6 py-3 bg-blue-600 text-white rounded-full hover:bg-blue-700">
                Comenzar Juego
            </button>
        </form>
    </div>

</body>
</html>
