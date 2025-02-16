//INDEX DEL DESAFIO DEL APRENDIZAJE
// tomo los elementos del html
const nombre = document.querySelector("#nombre");
const btnComenzar = document.querySelector("#comenzar");

// Agrego un event listener clic al botón comenzar
btnComenzar.addEventListener("click", () => {
    // seteo los valores del local storage que serán necesarios en las otras páginas
    localStorage.setItem("nombre", nombre.value);
    localStorage.setItem("puntaje-total", 0);
    localStorage.removeItem("categorias-jugadas");
    
    // Redirijo a la parte del menú usando la ruta correcta de Laravel
    location.href = "/menu"; // En lugar de "menu.html"
});
