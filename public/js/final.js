//Para el reto del Aprendizaje
const txtPuntaje = document.querySelector("#puntos");
const nombre = document.querySelector("#nombre");
const nombreJugador = document.querySelector("#nombre-jugador");
const puntajeFinal = document.querySelector("#puntaje-final");
const totalAcertadas = document.querySelector("#total-acertadas");
const totalNoAcertadas = document.querySelector("#total-no-acertadas");
const btnComenzar = document.querySelector("#btn-comenzar");

// Cargar datos del localStorage
const nombreUsuario = localStorage.getItem("nombre") || "Jugador";
const puntajeTotal = parseInt(localStorage.getItem("puntaje-total")) || 0;
const respuestasCorrectas = parseInt(localStorage.getItem("respuestas-correctas")) || 0;
const respuestasTotales = 30; // Total de preguntas

// Calcular respuestas incorrectas
const respuestasIncorrectas = respuestasTotales - respuestasCorrectas;

// Calcular nota sobre 100 (regla de tres)
let notaFinal = Math.round((puntajeTotal * 100) / 3000); 
notaFinal = Math.max(0, Math.min(notaFinal, 100)); // Asegurar que esté entre 0 y 100

// Mostrar los datos en pantalla
nombre.innerHTML = nombreUsuario;
nombreJugador.innerHTML = nombreUsuario;
txtPuntaje.innerHTML = puntajeTotal;
puntajeFinal.innerText = `${puntajeTotal} Puntos - NOTA FINAL: ${notaFinal}`;
puntajeFinal.style.fontSize = "25px"; // diseño del la fuente de nota final
totalAcertadas.innerHTML = respuestasCorrectas;
totalNoAcertadas.innerHTML = respuestasIncorrectas;

// Botón para reiniciar
btnComenzar.addEventListener("click", () => {
    // Limpiar datos si lo deseas
    localStorage.removeItem("puntaje-total");
    localStorage.removeItem("respuestas-correctas");
    localStorage.removeItem("categorias-jugadas");

    // Redirige a la pantalla inicial del juego
    location.href = "/indexjuego"; 
});
let intentos = 0; 

const guardarPuntaje = (minutos, segundos) => {
    // Aquí intentos se usa sin declarar de nuevo
    console.log(intentos); // Esto es válido porque 'intentos' ya fue declarado

    const nombreUsuario = localStorage.getItem("nombre") || "Jugador";
    const puntajeTotal = parseInt(localStorage.getItem("puntaje-total")) || 0;
    
    let notaFinal = Math.round((puntajeTotal * 100) / 3000);
    notaFinal = Math.max(0, Math.min(notaFinal, 100));

    const tema = 'Evaluacion';  
    const actividad = 'Final';

    fetch('/guardar-puntaje', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
        },
        body: JSON.stringify({
            nombre_usuario: nombreUsuario,
            calificacion: notaFinal,
            tema: tema,
            actividad: actividad,
            intentos: intentos,  // Se usa el valor sin redeclararlo
            minutos: minutos,
            segundos: segundos
        }),
    })
    .then(response => response.json())
    .then(data => {
        console.log('Puntaje guardado:', data);
    })
    .catch(error => {
        console.error('Error al guardar el puntaje:', error);
    });
};

// Guardar el puntaje automáticamente al cargar la pantalla de resultados
guardarPuntaje();
