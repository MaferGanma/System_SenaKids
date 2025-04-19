const cardsContainer = document.querySelector('.cards');
const num_parejas = document.querySelector('.score-container h2 span');
const span_intentos = document.getElementById('intentos');

let tar_1, tar_2, deshabilitarCartas = false;
let parejas = 0;
let intentos = 0;
let sonidos = document.querySelector('#sonidos');
let fondo = document.querySelector('#fondo');

const escuchar = document.querySelector('#escuchar');
escuchar.addEventListener('click', () => {
  fondo.volume = fondo.volume === 0 ? 0.9 : 0.0;
  escuchar.textContent = fondo.volume === 0 ? "Sonido: OFF" : "Sonido: ON";
});

// ✅ Pares personalizados: dibujo y palabra (dos imágenes distintas, mismo "match")
const pares = [
    {
      match: 'a',
      src: 'https://cdn.glitch.global/c7b87c3e-1d17-461a-a989-b17e078f89ca/abecedario-01.jpg?v=1745015791082'
    },
    {
      match: 'a',
      src: 'https://cdn.glitch.global/c7b87c3e-1d17-461a-a989-b17e078f89ca/5.jpg?v=1745021199090'
    },
  { match: 'perro', src: 'images/memograma/3.jpg' },
  { match: 'perro', src: 'images/memograma/4.jpg' },
  { match: 'casa', src: 'images/memograma/5.jpg' },
  { match: 'casa', src: 'images/memograma/6a.jpg' },
  { match: 'sol', src: 'images/memograma/7.jpg' },
  { match: 'sol', src: 'images/memograma/8.jpg' },
  { match: 'pez', src: 'images/memograma/pez.jpg' },
  { match: 'pez', src: 'images/memograma/pez_palabra.jpg' },
  { match: 'leon', src: 'images/memograma/leon.jpg' },
  { match: 'leon', src: 'images/memograma/leon_palabra.jpg' },
  { match: 'flor', src: 'images/memograma/flor.jpg' },
  { match: 'flor', src: 'images/memograma/flor_palabra.jpg' },
  { match: 'avion', src: 'images/memograma/avion.jpg' },
  { match: 'avion', src: 'images/memograma/avion_palabra.jpg' }
];

const crearCartas = () => {
  cardsContainer.innerHTML = '';
  const mezcladas = [...pares].sort(() => Math.random() - 0.5);
  mezcladas.forEach(item => {
    const card = document.createElement('li');
    card.classList.add('card');
    card.setAttribute('data-match', item.match);
    card.innerHTML = `
      <div class="view front-view"><span class="material-icons">question_mark</span></div>
      <div class="view back-view"><img src="${item.src}" alt="card" /></div>
    `;
    card.addEventListener('click', darVuelta);
    cardsContainer.appendChild(card);
  });
};

const darVuelta = e => {
  const card = e.currentTarget;
  if (card !== tar_1 && !card.classList.contains('vuelta') && !deshabilitarCartas) {
    card.classList.add('vuelta');
    if (!tar_1) {
      tar_1 = card;
      return;
    }

    tar_2 = card;
    deshabilitarCartas = true;
    intentos++;
    span_intentos.textContent = intentos;

    const match1 = tar_1.getAttribute('data-match');
    const match2 = tar_2.getAttribute('data-match');

    if (match1 === match2) {
      sonidos.src = 'sounds/success.mp3';
      sonidos.play();
      parejas++;
      num_parejas.textContent = parejas;

      tar_1.removeEventListener('click', darVuelta);
      tar_2.removeEventListener('click', darVuelta);
      tar_1 = tar_2 = null;
      deshabilitarCartas = false;

      if (parejas === 8) {
        sonidos.src = 'sounds/victoria.mp3';
        sonidos.play();
        setTimeout(mostrarResultados, 1000);
      }
    } else {
      sonidos.src = 'sounds/error.mp3';
      sonidos.play();
      setTimeout(() => {
        tar_1.classList.remove('vuelta');
        tar_2.classList.remove('vuelta');
        tar_1 = tar_2 = null;
        deshabilitarCartas = false;
      }, 1200);
    }
  }
};

const mostrarResultados = () => {
  const calificacion = calcularCalificacion(intentos, 16);
  document.getElementById('modalResultados').style.display = 'flex';
  document.getElementById('totalIntentos').textContent = `Intentos: ${intentos} — Puntaje: ${calificacion} puntos`;
  guardarPuntaje(calificacion);
};

const calcularCalificacion = (intentos, maxIntentos) => {
  let score = 100;
  const penalizacion = (intentos - maxIntentos) * 5;
  if (intentos > maxIntentos) score -= penalizacion;
  return Math.max(score, 0);
};

const guardarPuntaje = calificacion => {
  const userId = document.getElementById("userId").value;
  fetch('/guardar-puntaje', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json',
      'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
    },
    body: JSON.stringify({ userId, calificacion }),
  }).then(res => res.json())
    .then(data => console.log('Puntaje guardado:', data))
    .catch(err => console.error('Error al guardar:', err));
};

document.getElementById("btnReintentar").addEventListener("click", () => {
  document.getElementById("modalResultados").style.display = "none";
  iniciarJuego();
});

document.getElementById("btnSiguiente").addEventListener("click", () => {
  document.getElementById("modalResultados").style.display = "none";
  alert("Redirigiendo al siguiente juego...");
});

let primerInteraccion = true;
document.addEventListener('click', () => {
  if (primerInteraccion) {
    fondo.play().catch(() => {});
    primerInteraccion = false;
  }
}, { once: true });

const iniciarJuego = () => {
  parejas = 0;
  intentos = 0;
  tar_1 = tar_2 = null;
  deshabilitarCartas = false;
  num_parejas.textContent = parejas;
  span_intentos.textContent = intentos;
  crearCartas();
};

iniciarJuego();