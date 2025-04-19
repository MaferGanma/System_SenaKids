const brands = [
  {
    iconName: "letraZ",
    brandName: "Letra Z",
    imgUrl: "/images/Tema1_Alfabeto/abecedario-26.jpg"
  },
  {
    iconName: "letraY",
    brandName: "Letra Y",
    imgUrl: "/images/Tema1_Alfabeto/abecedario-25.jpg"
  },
  {
    iconName: "letraJ",
    brandName: "Letra J",
    imgUrl: "/images/Tema1_Alfabeto/abecedario-10.jpg"
  },
  {
    iconName: "letraF",
    brandName: "Letra F",
    imgUrl: "/images/Tema1_Alfabeto/abecedario-06.jpg"
  },
  {
    iconName: "letraO",
    brandName: "Letra O",
    imgUrl: "/images/Tema1_Alfabeto/abecedario-15.jpg"
  },
  {
    iconName: "letraG",
    brandName: "Letra G",
    imgUrl: "/images/Tema1_Alfabeto/abecedario-07.jpg"
  },
  {
    iconName: "letraD",
    brandName: "Letra D",
    imgUrl: "/images/Tema1_Alfabeto/abecedario-04.jpg"
  },
  {
    iconName: "letraI",
    brandName: "Letra I",
    imgUrl: "/images/Tema1_Alfabeto/abecedario-09.jpg"
  },
  {
    iconName: "letraB",
    brandName: "Letra B",
    imgUrl: "/images/Tema1_Alfabeto/abecedario-02.jpg"
  },
  {
    iconName: "letraA",
    brandName: "Letra A",
    imgUrl: "/images/Tema1_Alfabeto/abecedario-01.jpg"
  }
];

let correct = 0;
let total = 0;
const totalDraggableItems = 5;
const totalMatchingPairs = 5;

const scoreSection = document.querySelector(".score");
const correctSpan = scoreSection.querySelector(".correct");
const totalSpan = scoreSection.querySelector(".total");
const playAgainBtn = scoreSection.querySelector("#play-again-btn");

const draggableItems = document.querySelector(".draggable-items");
const matchingPairs = document.querySelector(".matching-pairs");
let draggableElements;
let droppableElements;

// 🎵 Sonidos
const correctSound = new Audio("https://www.soundjay.com/button/sounds/button-4.mp3");
const incorrectSound = new Audio("https://www.soundjay.com/button/sounds/button-10.mp3");

initiateGame();

function initiateGame() {
  const randomDraggableBrands = generateRandomItemsArray(totalDraggableItems, brands);
  const randomDroppableBrands = totalMatchingPairs < totalDraggableItems
    ? generateRandomItemsArray(totalMatchingPairs, randomDraggableBrands)
    : randomDraggableBrands;

  const sortedDroppableBrands = [...randomDroppableBrands].sort((a, b) =>
    a.brandName.toLowerCase().localeCompare(b.brandName.toLowerCase())
  );

  for (let i = 0; i < randomDraggableBrands.length; i++) {
    draggableItems.insertAdjacentHTML("beforeend", `
      <img src="${randomDraggableBrands[i].imgUrl}"
           class="draggable"
           draggable="true"
           id="${randomDraggableBrands[i].iconName}"
           data-brand="${randomDraggableBrands[i].iconName}" />
    `);
  }

  for (let i = 0; i < sortedDroppableBrands.length; i++) {
    matchingPairs.insertAdjacentHTML("beforeend", `
      <div class="matching-pair">
        <span class="label">${sortedDroppableBrands[i].brandName}</span>
        <span class="droppable" data-brand="${sortedDroppableBrands[i].iconName}"></span>
      </div>
    `);
  }

  draggableElements = document.querySelectorAll(".draggable");
  droppableElements = document.querySelectorAll(".droppable");

  draggableElements.forEach(elem => {
    elem.addEventListener("dragstart", dragStart);
  });

  droppableElements.forEach(elem => {
    elem.addEventListener("dragenter", dragEnter);
    elem.addEventListener("dragover", dragOver);
    elem.addEventListener("dragleave", dragLeave);
    elem.addEventListener("drop", drop);
  });
}

// Drag and Drop Handlers

function dragStart(event) {
  event.dataTransfer.setData("text", event.target.id);
}

function dragEnter(event) {
  if (event.target.classList.contains("droppable") && !event.target.classList.contains("dropped")) {
    event.target.classList.add("droppable-hover");
  }
}

function dragOver(event) {
  if (event.target.classList.contains("droppable") && !event.target.classList.contains("dropped")) {
    event.preventDefault();
  }
}

function dragLeave(event) {
  if (event.target.classList.contains("droppable") && !event.target.classList.contains("dropped")) {
    event.target.classList.remove("droppable-hover");
  }
}

function drop(event) {
  event.preventDefault();
  event.target.classList.remove("droppable-hover");

  const draggedId = event.dataTransfer.getData("text");
  const dropTarget = event.target.getAttribute("data-brand");

  const isCorrect = draggedId === dropTarget;
  total++;

  if (isCorrect) {
    const draggedEl = document.getElementById(draggedId);
    event.target.classList.add("dropped");
    draggedEl.classList.add("dragged");
    draggedEl.setAttribute("draggable", "false");

    event.target.innerHTML = `
      <img src="${draggedEl.src}" style="width: 100%; height: 100%; object-fit: contain;" />
    `;
    correct++;
  }

  updateScore();

  if (correct === Math.min(totalMatchingPairs, totalDraggableItems)) {
    playAgainBtn.style.display = "block";
    setTimeout(() => {
      playAgainBtn.classList.add("play-again-btn-entrance");
    }, 200);

    // Aquí mostramos el mensaje final con el puntaje
    showEndMessage();
  }
}

function updateScore() {
  scoreSection.style.opacity = 0;
  setTimeout(() => {
    correctSpan.textContent = correct;
    totalSpan.textContent = total;
    scoreSection.style.opacity = 1;
  }, 200);
}

// Nueva función para calcular el puntaje y mostrar el mensaje final
function showEndMessage() {
  let score = 5; // Puntaje inicial de 5 puntos

  // Calculamos los intentos adicionales
  const extraAttempts = total - 5; // Total de intentos menos los 5 intentos ideales

  // Si hay intentos extra, restamos 0.50 por cada uno
  if (extraAttempts > 0) {
    score -= extraAttempts * 0.50;
  }

  // Aseguramos que el puntaje no sea menor que 0
  score = Math.max(score, 0);

  // Mostramos el mensaje final con el puntaje calculado
  const finalScore = document.getElementById("final-score");
  finalScore.textContent = `Completaste el juego en ${total} intentos.
  Tu puntaje final es: ${score.toFixed(2)} puntos.`;

  // Mostramos el mensaje final
  document.getElementById("end-message").style.display = "flex";
}

// Función para cerrar el mensaje final
function closeEndMessage() {
  document.getElementById("end-message").style.display = "none";
}

// Restart Game
playAgainBtn.addEventListener("click", () => {
  playAgainBtn.classList.remove("play-again-btn-entrance");
  correct = 0;
  total = 0;
  draggableItems.style.opacity = 0;
  matchingPairs.style.opacity = 0;

  setTimeout(() => {
    scoreSection.style.opacity = 0;
  }, 100);

  setTimeout(() => {
    playAgainBtn.style.display = "none";
    draggableItems.innerHTML = "";
    matchingPairs.innerHTML = "";
    initiateGame();
    updateScore();
    draggableItems.style.opacity = 1;
    matchingPairs.style.opacity = 1;
    scoreSection.style.opacity = 1;
  }, 500);
});

// Helper
function generateRandomItemsArray(n, originalArray) {
  let result = [];
  let clone = [...originalArray];
  n = Math.min(n, clone.length);

  for (let i = 0; i < n; i++) {
    const randIndex = Math.floor(Math.random() * clone.length);
    result.push(clone[randIndex]);
    clone.splice(randIndex, 1);
  }

  return result;
}

// Soporte para dispositivos táctiles
let touchDraggedEl = null;

function handleTouchStart(e) {
  const target = e.target;
  if (target.classList.contains("draggable") && !target.classList.contains("dragged")) {
    touchDraggedEl = target;
    touchDraggedEl.classList.add("dragging-touch");
    e.preventDefault();
  }
}

function handleTouchMove(e) {
  if (!touchDraggedEl) return;

  const touch = e.touches[0];
  const x = touch.clientX;
  const y = touch.clientY;

  touchDraggedEl.style.position = "fixed";
  touchDraggedEl.style.top = `${y - touchDraggedEl.offsetHeight / 2}px`;
  touchDraggedEl.style.left = `${x - touchDraggedEl.offsetWidth / 2}px`;
  touchDraggedEl.style.zIndex = 1000;

  e.preventDefault();
}

function handleTouchEnd(e) {
  if (!touchDraggedEl) return;

  const touch = e.changedTouches[0];
  const x = touch.clientX;
  const y = touch.clientY;

  touchDraggedEl.style.position = "";
  touchDraggedEl.style.top = "";
  touchDraggedEl.style.left = "";
  touchDraggedEl.style.zIndex = "";
  touchDraggedEl.classList.remove("dragging-touch");

  const droppedEl = document.elementFromPoint(x, y);
  if (droppedEl && droppedEl.classList.contains("droppable") && !droppedEl.classList.contains("dropped")) {
    const draggedId = touchDraggedEl.id;
    const dropTarget = droppedEl.getAttribute("data-brand");

    const isCorrect = draggedId === dropTarget;
    total++;

    if (isCorrect) {
      droppedEl.classList.add("dropped");
      touchDraggedEl.classList.add("dragged");
      touchDraggedEl.setAttribute("draggable", "false");

      droppedEl.innerHTML = `
        <img src="${touchDraggedEl.src}" style="width: 100%; height: 100%; object-fit: contain;" />
      `;
      correct++;
    }

    updateScore();

    if (correct === Math.min(totalMatchingPairs, totalDraggableItems)) {
      playAgainBtn.style.display = "block";
      setTimeout(() => {
        playAgainBtn.classList.add("play-again-btn-entrance");
      }, 200);

      // Mostrar mensaje final en mobile también
      showEndMessage();
    }
  }

  touchDraggedEl = null;
}

// Solo activar si es dispositivo táctil
if ("ontouchstart" in window) {
  document.addEventListener("touchstart", handleTouchStart, { passive: false });
  document.addEventListener("touchmove", handleTouchMove, { passive: false });
  document.addEventListener("touchend", handleTouchEnd);
}


function showEndMessage() {
  const finalScore = document.getElementById("final-score");
  finalScore.textContent = `Obtuviste ${correct} de ${total} intentos.`;
  document.getElementById("end-message").style.display = "flex";
}

function closeEndMessage() {
  document.getElementById("end-message").style.display = "none";
}

function showEndMessage() {
    const finalScore = document.getElementById("final-score");
    finalScore.textContent = `Obtuviste ${correct} de ${total} intentos.`;
    document.getElementById("end-message").style.display = "flex";
    guardarPuntaje(correct);
}

const guardarPuntaje = (calificacion) => {
    console.log('hola');
    const idJuego = 3; //Este id juego es de la tabla juego (Alfabeto->memograma)

    fetch('/guardar-puntaje', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'), // CSRF token
        },
        body: JSON.stringify({
            id_juego: idJuego,
            calificacion: calificacion,
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
