// script.js

// Função para exibir uma mensagem de sucesso
function showSuccessMessage(message) {
    var successMessage = document.createElement('p');
    successMessage.className = 'message';
    successMessage.textContent = message;
    document.body.appendChild(successMessage);
}

// Função para exibir uma mensagem de erro
function showErrorMessage(message) {
    var errorMessage = document.createElement('p');
    errorMessage.className = 'error-message';
    errorMessage.textContent = message;
    document.body.appendChild(errorMessage);
}

// Função para remover todas as mensagens
function clearMessages() {
    var messages = document.querySelectorAll('.message, .error-message');
    messages.forEach(function(message) {
        message.remove();
    });
}
