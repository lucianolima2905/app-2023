document.addEventListener('DOMContentLoaded', () => {
    const onlineUsersSpan = document.getElementById('onlineUsers');

    const socket = new WebSocket('ws://seu-servidor-websocket'); // Substitua pelo seu servidor WebSocket

    socket.onopen = () => {
        console.log('Conexão WebSocket estabelecida');
    };

    socket.onmessage = (event) => {
        const message = JSON.parse(event.data);

        if (message.type === 'updateUsers') {
            onlineUsersSpan.innerText = message.data;
        }
    };

    socket.onclose = (event) => {
        if (event.wasClean) {
            console.log(`Conexão fechada limpa, código=${event.code}, motivo=${event.reason}`);
        } else {
            console.error('Conexão quebrada');
        }
    };

    socket.onerror = (error) => {
        console.error(`Erro WebSocket: ${error.message}`);
    };
});
