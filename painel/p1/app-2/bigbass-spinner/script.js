let button = document.getElementById("signalButton");
let board = document.getElementById("board");
let timerInterval;

function generateStars(numStars) {
  const cells = board.getElementsByClassName("cell");

  for (let cell of cells) {
    cell.classList.remove("star");
    cell.textContent = '';
    cell.style.visibility = "hidden";
  }

  const starIndices = [];
  while (starIndices.length < numStars) {
    const randomIndex = getRandomCell(0, cells.length - 1);
    if (!starIndices.includes(randomIndex)) {
      starIndices.push(randomIndex);
    }
  }

  starIndices.forEach((index) => {
    cells[index].classList.add("star");
    cells[index].textContent = "⭐"; // Estrela (⭐)
    cells[index].style.visibility = "visible";
  });
}

function generateSignal() {
  // Impedir que o botão seja clicado enquanto o sinal está ativo
  button.disabled = true;

  // Gerar um número aleatório de estrelas (entre 3 e 4)
  const numStars = Math.floor(Math.random() * 2) + 3;

  generateStars(numStars);

  // Começar a contagem regressiva de 2 minutos
  let timeLeft = 120;

  button.textContent = `TIMA (${timeLeft}s)`;
  timerInterval = setInterval(function () {
    timeLeft--;
    if (timeLeft < 0) {
      clearInterval(timerInterval);
      button.textContent = "TIMA";
      button.disabled = false;
      generateStars(numStars); // Gere estrelas imediatamente
      timeLeft = 120; // Reinicie o tempo
    } else {
      button.textContent = `TIMA (${timeLeft}s)`;
    }
  }, 1000);
}

// Chamada inicial para gerar estrelas e habilitar o botão
generateSignal();

function getRandomCell(min, max) {
  return Math.floor(Math.random() * (max - min + 1)) + min;
}
