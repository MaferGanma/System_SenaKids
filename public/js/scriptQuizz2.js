// cargo en un arreglo las imganes de las banderas. Este sera el orden que se mostrarán
let banderas = ["pa.svg", "bo.svg", "ad.svg", "gb.svg", "na.svg"];

// arreglo que guardara la opcion correcta
let correcta = [2, 2, 1, 1, 0];

//variables para el tiempo:
let tiempoInicio;
let tiempoFin;

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

function comenzarJuego() {
    //Iniciar tiempo al comenzar
    tiempoInicio = new Date();
    // reseteamos las variables
    posActual = 0;
    cantidadAcertadas = 0;
    // activamos las pantallas necesarias
    document.getElementById("pantalla-inicial").style.display = "none";
    document.getElementById("pantalla-juego").style.display = "block";
    cargarBandera();
}

// funcion que carga la siguiente seña y sus opciones
function cargarBandera() {
    // controlo si se acabaron las señas
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

function limpiarOpciones() {
    document.getElementById("n0").className = "nombre";
    document.getElementById("n1").className = "nombre";
    document.getElementById("n2").className = "nombre";

    document.getElementById("l0").className = "letra";
    document.getElementById("l1").className = "letra";
    document.getElementById("l2").className = "letra";
}

function comprobarRespuesta(opElegida) {
    if (opElegida == correcta[posActual]) { // acertó
        // agregamos las clases para colocar el color verde a la opcion elegida
        document.getElementById("n" + opElegida).className = "nombre nombreAcertada";
        document.getElementById("l" + opElegida).className = "letra letraAcertada";
        cantidadAcertadas++;
    } else { // no acerto
        // agramos las clases para colocar en rojo la opcion elegida
        document.getElementById("n" + opElegida).className = "nombre nombreNoAcertada";
        document.getElementById("l" + opElegida).className = "letra letraNoAcertada";

        // opcion que era correcta
        document.getElementById("n" + correcta[posActual]).className = "nombre nombreAcertada";
        document.getElementById("l" + correcta[posActual]).className = "letra letraAcertada";
    }
    posActual++;
    // Esperamos 1 segundo y pasamos mostrar la siguiente señas y sus opciones
    setTimeout(cargarBandera, 1000);
}

function terminarJuego() {
    // ocultamos las pantallas y mostramos la pantalla final
    document.getElementById("pantalla-juego").style.display = "none";
    document.getElementById("pantalla-final").style.display = "block";
    // agregamos los resultados
    document.getElementById("numCorrectas").innerHTML = cantidadAcertadas;
    document.getElementById("numIncorrectas").innerHTML = banderas.length - cantidadAcertadas;
     // Tiempo
     tiempoFin = new Date();
     const duracion = Math.floor((tiempoFin - tiempoInicio) / 1000); // en segundos
     const minutos = Math.floor(duracion / 60);
     const segundos = duracion % 60;
 
     // Nota sobre 100 (por ejemplo: 5 preguntas, cada una vale 20 puntos)
     const notaFinal = Math.round((cantidadAcertadas * 100) / banderas.length);

     // Aquí actualizas el contenido de la etiqueta con el puntaje
    document.getElementById("notaFinal").innerHTML = `${notaFinal} / 100`;
 
     // Llamamos a guardar el puntaje
     guardarPuntaje(notaFinal, minutos, segundos, banderas.length - cantidadAcertadas);
}

function volverAlInicio() {
    // ocultamos las pantallas y activamos la inicial
    document.getElementById("pantalla-final").style.display = "none";
    document.getElementById("pantalla-inicial").style.display = "block";
    document.getElementById("pantalla-juego").style.display = "none";
}

function guardarPuntaje(calificacion, minutos, segundos, intentos) {
    const nombreUsuario = localStorage.getItem("nombre") || "Jugador";
    const tema = "Numero";
    const actividad = "Cuestionario";

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
