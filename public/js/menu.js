//MENU DEL DESAFIO DEL APRENDIZAJE
// Tomamos los elementos html
const txtPuntaje = document.querySelector("#puntos");
const nombre = document.querySelector("#nombre");
const nombreJugador = document.querySelector("#nombre-jugador");

nombre.innerHTML = localStorage.getItem("nombre");
nombreJugador.innerHTML = localStorage.getItem("nombre");

// Recupero el puntaje en caso que ya esté jugando
let puntajeTotal = 0;
if (!localStorage.getItem("puntaje-total")) {
    puntajeTotal = 0;
    txtPuntaje.innerHTML = puntajeTotal;
} else {
    puntajeTotal = parseInt(localStorage.getItem("puntaje-total"));
    txtPuntaje.innerHTML = puntajeTotal;
}

// Necesito una estructura para guardar las categorías ya jugadas
let categoriasJugadas;
// Controlo si ya hay algo cargado en el localStorage cuando vuelvo de jugar
const categoriasJugadasLS = JSON.parse(localStorage.getItem("categorias-jugadas"));
if (categoriasJugadasLS) {
    categoriasJugadas = categoriasJugadasLS;
} else { // Empiezo con un arreglo vacío
    categoriasJugadas = [];
}

console.log(categoriasJugadas);

// Agrego un event listener click a todas las opciones de categoría
function agregarEventListenerOpciones() {
    const categorias = document.querySelectorAll(".categoria");
    categorias.forEach(categoria => {
        categoria.addEventListener("click", (e) => {
            console.log(e.currentTarget.id);
            // Almaceno la categoría que se eligió en el Local Storage
            localStorage.setItem("categoria-actual", e.currentTarget.id);
            // Agrego la categoría al arreglo
            categoriasJugadas.push(e.currentTarget.id);
            localStorage.setItem("categorias-jugadas", JSON.stringify(categoriasJugadas));
            console.log(categoriasJugadas);
            // Redirijo a la página del juego con la ruta correcta
            location.href = "/juego"; // En lugar de "juego.html"
        });
    });

    // Deshabilito las categorías que ya se jugaron
    categorias.forEach(categoria => {
        if (categoriasJugadas.includes(categoria.id)) {
            categoria.classList.add("desabilitada");
            categoria.classList.add("no-events");
        }
    });
}

agregarEventListenerOpciones();
