// Exemplo de código JavaScript para carregar vídeo no iframe
const videoId = "VIDEO_ID"; // Substitua pelo ID do seu vídeo
const iframe = document.querySelector("iframe");

// Carrega o vídeo no iframe
function loadVideo() {
 const videoUrl = `https://www.youtube.com/embed/${videoId}`;
 iframe.src = videoUrl;
}

// Chama a função para carregar o vídeo quando a página for carregada
window.onload = loadVideo;