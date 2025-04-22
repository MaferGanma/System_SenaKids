let arrayPalabras = ["GUITARRA", "ELEFANTE", "TURQUESA", "MARIELA", "TECLADO", "INGLATERRA"];
let ayudas = [
    "Instrumento Musical",
    "Animal de la selva",
    "Es un color",
    "Nombre de mujer",
    "Hardware de computadora",
    "Es un País"
];

let imagenes = [
    "https://i.imgur.com/CvYvL3v.jpg", // GUITARRA
    "https://i.imgur.com/Z5ZPfWz.jpg", // ELEFANTE
    "https://i.imgur.com/NZVb1U9.jpg", // TURQUESA
    "https://i.imgur.com/Kdp3tq7.jpg", // MARIELA
    "https://i.imgur.com/FzE06Uz.jpg", // TECLADO
    "https://i.imgur.com/HvMKyMx.jpg"  // INGLATERRA
];

let cantPalabrasJugadas = 0;
let intentosRestantes = 5;
let posActual;
let arrayPalabraActual = [];
let cantidadAcertadas = 0;
let divsPalabraActual = [];
let totalQueDebeAcertar;
let puntajeTotal = 0;  // Puntos acumulados
let intentosFallidosActual = 0;  // Intentos fallidos en cada palabra
let nota = 0;

const PUNTOS_TOTALES = 100; // Puntaje máximo
const PUNTOS_POR_PALABRA = PUNTOS_TOTALES / 6; // Puntos disponibles por cada palabra
const PENALIZACION_POR_ERROR = 3.33; // Puntos que se restan por cada error (20% de los puntos por palabra)


// Función para cargar una nueva palabra
function cargarNuevaPalabra() {
    // Si ya se jugó al menos una vez, calculamos puntaje
    if (cantPalabrasJugadas > 0) {
        let puntajePalabra = PUNTOS_POR_PALABRA - (intentosFallidosActual * PENALIZACION_POR_ERROR);
        if (puntajePalabra < 0) puntajePalabra = 0;
        puntajeTotal += puntajePalabra;
        console.log(`Puntaje obtenido por palabra: ${puntajePalabra.toFixed(2)} de ${PUNTOS_POR_PALABRA.toFixed(2)}`);
    }

    // Si ya completó las 6 palabras, muestra el puntaje final
    if (cantPalabrasJugadas >= 6) {
        let puntajeFinal = puntajeTotal.toFixed(2);
        setTimeout(() => {
            alert(`🎉 Juego terminado\nTu puntaje final es: ${puntajeFinal} / 6`);
            guardarPuntaje(puntajeFinal);
        }, 500);
        return; // No generar más palabras
    }

    intentosFallidosActual = 0; // Reiniciar intentos fallidos para la nueva palabra

    cantPalabrasJugadas++;

    posActual = Math.floor(Math.random() * arrayPalabras.length);
    let palabra = arrayPalabras[posActual];
    let ayudaActual = ayudas[posActual];
    let imagenActual = imagenes[posActual]; // Imagen correspondiente

    totalQueDebeAcertar = palabra.length;
    cantidadAcertadas = 0;
    arrayPalabraActual = palabra.split('');

    // Limpiar pantalla
    document.getElementById("palabra").innerHTML = "";
    document.getElementById("letrasIngresadas").innerHTML = "";

    // Crear divs para las letras
    for (let i = 0; i < palabra.length; i++) {
        let divLetra = document.createElement("div");
        divLetra.className = "letra";
        document.getElementById("palabra").appendChild(divLetra);
    }

    divsPalabraActual = document.getElementsByClassName("letra");
    intentosRestantes = 5;
    document.getElementById("intentos").innerHTML = intentosRestantes;
    document.getElementById("ayuda").innerHTML = ayudaActual;

    // Cambiar la imagen en la página
    document.getElementById("imagenEscritorio").innerHTML = `<img src="${imagenActual}" alt="Imagen" />`;

    // Eliminar palabra ya usada
    arrayPalabras.splice(posActual, 1);
    ayudas.splice(posActual, 1);
    imagenes.splice(posActual, 1);

    // Generar teclado
    generarTecladoVirtual();
}

// Detectar teclado físico
document.addEventListener("keydown", (event) => {
    if (isLetter(event.key)) {
        manejarLetra(event.key.toUpperCase());
    }
});

// Función para manejar la letra ingresada
function manejarLetra(letra) {
    let letrasIngresadas = document.getElementById("letrasIngresadas").innerHTML.split('');

    if (letrasIngresadas.lastIndexOf(letra) === -1) {
        let acerto = false;

        for (let i = 0; i < arrayPalabraActual.length; i++) {
            if (arrayPalabraActual[i] === letra) {
                divsPalabraActual[i].innerHTML = letra;
                acerto = true;
                cantidadAcertadas++;
            }
        }

        if (acerto) {
            if (totalQueDebeAcertar === cantidadAcertadas) {
                for (let i = 0; i < arrayPalabraActual.length; i++) {
                    divsPalabraActual[i].className = "letra pintar";
                }
                // Mostrar mensaje de éxito
                mostrarMensaje("¡Acertaste la palabra! 🎉");
                // Mover a la siguiente palabra automáticamente
                setTimeout(cargarNuevaPalabra, 1000); // Pasar a la siguiente palabra después de 1 segundo
            }
        } else {
            intentosRestantes--;
            intentosFallidosActual++;  // Aumentar el contador de intentos fallidos
            document.getElementById("intentos").innerHTML = intentosRestantes;

            if (intentosRestantes <= 0) {
                // Mostrar mensaje de error
                mostrarMensaje("¡Ups!Palabra incorrecta 😞");
                // Pasar a la siguiente palabra automáticamente
                setTimeout(cargarNuevaPalabra, 1000); // Pasar a la siguiente palabra después de 1 segundo
                for (let i = 0; i < arrayPalabraActual.length; i++) {
                    divsPalabraActual[i].className = "letra pintarError";
                }
            }
        }

        document.getElementById("letrasIngresadas").innerHTML += letra + " - ";
        let boton = document.getElementById(`btn-${letra}`);
        if (boton) boton.disabled = true;
    }
}

// Generar teclado virtual
function generarTecladoVirtual() {
    const teclado = document.getElementById("tecladoVirtual");
    teclado.innerHTML = "";
    const letras = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";

    letras.split('').forEach(letra => {
        const btn = document.createElement("button");
        btn.textContent = letra;
        btn.id = `btn-${letra}`;
        btn.onclick = () => manejarLetra(letra);
        teclado.appendChild(btn);
    });
}

// Verificar si es letra
function isLetter(str) {
    return str.length === 1 && str.match(/[a-z]/i);
}

// Función para mostrar mensajes
function mostrarMensaje(texto, emoji = "") {
    const mensaje = document.createElement("div");
    mensaje.classList.add("mensaje");
    mensaje.innerHTML = `<span class="emoji">${emoji}</span>${texto}`;
    document.body.appendChild(mensaje);

    setTimeout(() => {
        mensaje.remove();
    }, 2500); // Duración del mensaje
}


// Iniciar juego
cargarNuevaPalabra();


const guardarPuntaje = (calificacion) => {
    const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    console.log(calificacion)
    const calificacionEntera = Math.floor(calificacion);
    fetch('/guardar-puntaje', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': token
        },
        body: JSON.stringify({
            id_juego: 9, // cambia estos valores por los correctos en tu juego
            calificacion: calificacionEntera
        })
    })
    .then(res => {
        if (!res.ok) throw new Error("Respuesta no OK");
        return res.json();
    })
    .then(data => {
        console.log('Puntaje guardado correctamente:', data);
    })
    .catch(error => {
        console.error('Error al guardar el puntaje:', error);
    });

};

