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
    "https://cdn.glitch.global/c7b87c3e-1d17-461a-a989-b17e078f89ca/abecedario-01.jpg?v=1745015791082", // GUITARRA
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
let puntajeTotal = 0;
let intentosFallidosActual = 0;

let tiempoInicio;
let tiempoFin;
let intervaloCronometro;

const PUNTOS_TOTALES = 100;
const PUNTOS_POR_PALABRA = PUNTOS_TOTALES / 6;
const PENALIZACION_POR_ERROR = 3.33;

function cargarNuevaPalabra() {
    // Iniciar cronómetro al comienzo del juego
    if (cantPalabrasJugadas === 0) {
        tiempoInicio = new Date();
        iniciarCronometro();
    }

    if (cantPalabrasJugadas > 0) {
        let puntajePalabra = PUNTOS_POR_PALABRA - (intentosFallidosActual * PENALIZACION_POR_ERROR);
        if (puntajePalabra < 0) puntajePalabra = 0;
        puntajeTotal += puntajePalabra;
        console.log(`Puntaje obtenido por palabra: ${puntajePalabra.toFixed(2)} de ${PUNTOS_POR_PALABRA.toFixed(2)}`);
    }

    if (cantPalabrasJugadas >= 6) {
        tiempoFin = new Date();
        clearInterval(intervaloCronometro);
        const duracion = tiempoFin - tiempoInicio;
        const minutos = Math.floor(duracion / 60000);
        const segundos = Math.floor((duracion % 60000) / 1000);
        let puntajeFinal = puntajeTotal.toFixed(2);

        setTimeout(() => {
            alert(`🎉 Juego terminado\nTu puntaje final es: ${puntajeFinal} / 100 puntos\nTiempo: ${minutos}m ${segundos}s`);
            guardarPuntaje(puntajeFinal, minutos, segundos);
        }, 500);

        return;
    }

    intentosFallidosActual = 0;
    cantPalabrasJugadas++;

    posActual = Math.floor(Math.random() * arrayPalabras.length);
    let palabra = arrayPalabras[posActual];
    let ayudaActual = ayudas[posActual];
    let imagenActual = imagenes[posActual];

    totalQueDebeAcertar = palabra.length;
    cantidadAcertadas = 0;
    arrayPalabraActual = palabra.split('');

    document.getElementById("palabra").innerHTML = "";
    document.getElementById("letrasIngresadas").innerHTML = "";

    for (let i = 0; i < palabra.length; i++) {
        let divLetra = document.createElement("div");
        divLetra.className = "letra";
        document.getElementById("palabra").appendChild(divLetra);
    }

    divsPalabraActual = document.getElementsByClassName("letra");
    intentosRestantes = 5;
    document.getElementById("intentos").innerHTML = intentosRestantes;
    document.getElementById("ayuda").innerHTML = ayudaActual;
    document.getElementById("imagenEscritorio").innerHTML = `<img src="${imagenActual}" alt="Imagen" />`;

    arrayPalabras.splice(posActual, 1);
    ayudas.splice(posActual, 1);
    imagenes.splice(posActual, 1);

    generarTecladoVirtual();
}

document.addEventListener("keydown", (event) => {
    if (isLetter(event.key)) {
        manejarLetra(event.key.toUpperCase());
    }
});

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
                mostrarMensaje(`¡Acertaste la palabra! 🎉 (+${(PUNTOS_POR_PALABRA - intentosFallidosActual * PENALIZACION_POR_ERROR).toFixed(2)} pts)`);
                setTimeout(cargarNuevaPalabra, 1000);
            }
        } else {
            intentosRestantes--;
            intentosFallidosActual++;
            document.getElementById("intentos").innerHTML = intentosRestantes;

            if (intentosRestantes <= 0) {
                mostrarMensaje(`¡Ups! Palabra incorrecta 😞 (${(PUNTOS_POR_PALABRA - intentosFallidosActual * PENALIZACION_POR_ERROR).toFixed(2)} pts)`);
                for (let i = 0; i < arrayPalabraActual.length; i++) {
                    divsPalabraActual[i].className = "letra pintarError";
                }
                setTimeout(cargarNuevaPalabra, 1000);
            }
        }

        document.getElementById("letrasIngresadas").innerHTML += letra + " - ";
        let boton = document.getElementById(`btn-${letra}`);
        if (boton) boton.disabled = true;
    }
}

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

function isLetter(str) {
    return str.length === 1 && str.match(/[a-z]/i);
}

function mostrarMensaje(texto, emoji = "") {
    const mensaje = document.createElement("div");
    mensaje.classList.add("mensaje");
    mensaje.innerHTML = `<span class="emoji">${emoji}</span>${texto}`;
    document.body.appendChild(mensaje);

    setTimeout(() => {
        mensaje.remove();
    }, 2500);
}

function iniciarCronometro() {
    intervaloCronometro = setInterval(() => {
        const ahora = new Date();
        const diferencia = ahora - tiempoInicio;
        const minutos = Math.floor(diferencia / 60000);
        const segundos = Math.floor((diferencia % 60000) / 1000);
        document.getElementById("cronometro").innerHTML = `${minutos}m ${segundos}s`;
    }, 1000);
}

const guardarPuntaje = (calificacion, minutos, segundos) => {
    const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    const nombreUsuario = localStorage.getItem("nombre") || 'Jugador1'; // Mejor aún: desde localStorage
    const tema = "Numeros";
    const actividad = "Juego 2";

    fetch('/guardar-puntaje', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': token,
        },
        body: JSON.stringify({
            nombre_usuario: nombreUsuario,
            calificacion: Math.floor(calificacion),
            minutos: minutos,
            segundos: segundos,
            tema: tema,
            actividad: actividad
        }),
    })
    .then(response => {
        if (!response.ok) throw new Error("Fallo en la respuesta del servidor");
        return response.json();
    })
    .then(data => {
        console.log('✅ Puntaje y tiempo guardados correctamente:', data);
    })
    .catch(error => {
        console.error('❌ Error al guardar los datos:', error);
    });
};


// Iniciar juego
cargarNuevaPalabra();
