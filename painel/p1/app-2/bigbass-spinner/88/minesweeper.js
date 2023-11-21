const gridSize = 5;
const numMines = 5;
let grid = [];

function createGrid() {
    const mines = Array(numMines).fill('mine');
    const emptyCells = Array(gridSize * gridSize - numMines).fill('empty');
    const cells = [...mines, ...emptyCells];
    grid = shuffle(cells);

    for (let i = 0; i < gridSize; i++) {
        for (let j = 0; j < gridSize; j++) {
            const cell = document.createElement('div');
            cell.classList.add('cell', grid.pop());
            cell.dataset.row = i;
            cell.dataset.col = j;
            cell.addEventListener('click', cellClick);
            cell.addEventListener('contextmenu', cellFlag);
            document.getElementById('minesweeper').appendChild(cell);
        }
    }
}

function updateBoard() {
    const minesweeperDiv = document.getElementById('minesweeper');
    while (minesweeperDiv.firstChild) {
        minesweeperDiv.removeChild(minesweeperDiv.firstChild);
    }

    createGrid();
}

function cellClick() {
    const cell = this;
    if (cell.classList.contains('revealed') || cell.classList.contains('flag')) return;
    if (cell.classList.contains('mine')) {
        alert('Game Over!');
    } else {
        cell.classList.add('revealed');
        const row = parseInt(cell.dataset.row);
        const col = parseInt(cell.dataset.col);
        const adjacentMines = countAdjacentMines(row, col);
        if (adjacentMines > 0) {
            cell.textContent = adjacentMines;
        } else {
            // TODO: Implement logic for revealing empty cells
        }
    }
}

function cellFlag(event) {
    event.preventDefault();
    const cell = this;
    if (cell.classList.contains('revealed')) return;
    cell.classList.toggle('flag');
}

function countAdjacentMines(row, col) {
    // TODO: Implement logic to count adjacent mines
}

function shuffle(array) {
    for (let i = array.length - 1; i > 0; i--) {
        const j = Math.floor(Math.random() * (i + 1));
        [array[i], array[j]] = [array[j], array[i]];
    }
    return array;
}

createGrid();

document.getElementById('atualizar').addEventListener('click', updateBoard);
setInterval(updateBoard, 120000);


let startTime; // Variável para armazenar o tempo de início

function updateBoardAndMeasureTime() {
    // Início da medição de tempo
    startTime = performance.now();

    // Chame a função para atualizar o tabuleiro
    updateBoard();
}

// Chame a função inicialmente para começar o cronômetro
updateBoardAndMeasureTime();

// Use setInterval para atualizar a cada 2 minutos (120000 milissegundos)
setInterval(updateBoardAndMeasureTime, 120000);


<script>
let countdown = 120; // Tempo em segundos (2 minutos)
const temporizadorDiv = document.getElementById('temporizador');

function updateTemporizador() {
    const minutes = Math.floor(countdown / 60);
    const seconds = countdown % 60;
    temporizadorDiv.textContent = `Tempo Restante: ${minutes}:${seconds.toString().padStart(2, '0')}`;
}

updateTemporizador(); // Chamada inicial para exibir o tempo inicial

const countdownInterval = setInterval(function() {
    countdown--; // Decrementa o tempo restante
    if (countdown <= 0) {
        clearInterval(countdownInterval); // Para o temporizador quando atingir zero
        temporizadorDiv.textContent = 'Tempo Esgotado';
        // Aqui você pode adicionar a lógica para atualizar o tabuleiro
    } else {
        updateTemporizador(); // Atualiza o texto do temporizador a cada segundo
    }
}, 1000); // A cada segundo
</script>




