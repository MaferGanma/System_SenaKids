// cargo en un arreglo las imganes de las banderas. Este sera el orden que se mostrarán
let banderas = ["pa.svg", "bo.svg", "ad.svg", "gb.svg", "na.svg"];

// arreglo que guardara la opcion correcta
let correcta = [2, 2, 1, 1, 0];

// arreglo que guardara los paises a mostrar en cada jugada
let opciones = [];
// cargo en el arreglo opciones las opciones a mostrar en cada jugada
opciones.push(["NÚMERO 8", "NÚMERO 9", "NÚMERO 10"]);
opciones.push(["NÚMERO 5", "NÚMERO 3", "NÚMERO 2"]);
opciones.push(["NÚMERO 7", "NÚMERO 3", "NÚMERO 2"]);
opciones.push(["NÚMERO 8", "NÚMERO 6", "NÚMERO 9"]);
opciones.push(["NÚMERO 8", "NÚMERO 2", "NÚMERO 4"]);

// variable que guarda la posicion actual
let posActual = 0;
// variable que guarda la cantidad acertadas hasta el momento
let cantidadAcertadas = 0;
// variable para contar los intentos
let intentos = 0;

// variables para el cronómetro
let startTime = null;
let timerInterval = null;

// función para comenzar el juego
function comenzarJuego() {
    // reseteamos las variables
    posActual = 0;
    cantidadAcertadas = 0;
    intentos = 0;

    // reiniciamos el cronómetro
    startTime = Date.now();
    startTimer();

    // activamos las pantallas necesarias
    document.getElementById("pantalla-inicial").style.display = "none";
    document.getElementById("pantalla-juego").style.display = "block";
    cargarBandera();
}

// funcion que carga la siguiente bandera y sus opciones
function cargarBandera() {
    // controlo si se acabaron las banderas
    if (banderas.length <= posActual) {
        terminarJuego();
    } else { // cargo las opciones
        // limpiamos las clases que se asignaron
        limpiarOpciones();

        // Asignamos la ruta completa usando window.assetUrl
        document.getElementById("imgBandera").src = window.assetUrl + "/" + banderas[posActual];
        document.getElementById("n0").innerHTML = opciones[posActual][0];
        document.getElementById("n1").innerHTML = opciones[posActual][1];
        document.getElementById("n2").innerHTML = opciones[posActual][2];
    }
}

// función para limpiar las clases de las opciones
function limpiarOpciones() {
    document.getElementById("n0").className = "nombre";
    document.getElementById("n1").className = "nombre";
    document.getElementById("n2").className = "nombre";

    document.getElementById("l0").className = "letra";
    document.getElementById("l1").className = "letra";
    document.getElementById("l2").className = "letra";
}

// función que se ejecuta cuando el jugador selecciona una opción
function comprobarRespuesta(opElegida) {
    intentos++; // incrementamos los intentos

    if (opElegida == correcta[posActual]) { // acertó
        // agregamos las clases para colocar el color verde a la opcion elegida
        document.getElementById("n" + opElegida).className = "nombre nombreAcertada";
        document.getElementById("l" + opElegida).className = "letra letraAcertada";
        cantidadAcertadas++;
    } else { // no acertó
        // agregamos las clases para colocar en rojo la opcion elegida
        document.getElementById("n" + opElegida).className = "nombre nombreNoAcertada";
        document.getElementById("l" + opElegida).className = "letra letraNoAcertada";

        // opción correcta
        document.getElementById("n" + correcta[posActual]).className = "nombre nombreAcertada";
        document.getElementById("l" + correcta[posActual]).className = "letra letraAcertada";
    }
    posActual++;
    // Esperamos 1 segundo y luego pasamos a mostrar la siguiente bandera y sus opciones
    setTimeout(cargarBandera, 1000);
}

// función para terminar el juego
function terminarJuego() {
    // detenemos el cronómetro
    stopTimer();

    // ocultamos las pantallas y mostramos la pantalla final
    document.getElementById("pantalla-juego").style.display = "none";
    document.getElementById("pantalla-final").style.display = "block";

    // mostramos los resultados
    document.getElementById("numCorrectas").innerHTML = cantidadAcertadas;
    document.getElementById("numIncorrectas").innerHTML = banderas.length - cantidadAcertadas;

    // calculamos la nota sobre 100
    let nota = cantidadAcertadas * 20;
    document.getElementById("notaFinal").innerHTML = `${nota}/100`;

    // guardamos el puntaje
    guardarPuntaje(nota);
}

// función para detener el cronómetro
function stopTimer() {
    clearInterval(timerInterval);
    timerInterval = null;
}

// función para iniciar el cronómetro
function startTimer() {
    timerInterval = setInterval(updateTimerDisplay, 1000);
}

// función para actualizar la visualización del cronómetro
function updateTimerDisplay() {
    const now = Date.now();
    const elapsedTime = Math.floor((now - startTime) / 1000); // en segundos

    const minutes = Math.floor(elapsedTime / 60).toString().padStart(2, '0');
    const seconds = (elapsedTime % 60).toString().padStart(2, '0');

    const timerEl = document.getElementById("timer-display");
    if (timerEl) {
        timerEl.textContent = `⏱️ Tiempo: ${minutes}:${seconds}`;
    }
}

// función para guardar el puntaje
// función para guardar el puntaje
function guardarPuntaje(calificacion, minutos, segundos, intentos) {
    const nombreUsuario = localStorage.getItem("nombre") || "Jugador";
    const tema = "Colores"; // Tema del juego
    const actividad = "Cuestionario"; // Tipo de actividad

    fetch("/guardar-puntaje", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content"),
        },
        body: JSON.stringify({
            nombre_usuario: nombreUsuario,
            calificacion: calificacion,
            minutos: minutos,
            segundos: segundos,
            intentos: intentos,
            tema: tema,
            actividad: actividad
        }),
    })
    .then((response) => response.json())
    .then((data) => {
        console.log("✅ Puntaje guardado:", data);
    })
    .catch((error) => {
        console.error("❌ Error al guardar el puntaje:", error);
    });
}

// función para volver al inicio
function volverAlInicio() {
    // ocultamos las pantallas y activamos la inicial
    document.getElementById("pantalla-final").style.display = "none";
    document.getElementById("pantalla-inicial").style.display = "block";
    document.getElementById("pantalla-juego").style.display = "none";
}
