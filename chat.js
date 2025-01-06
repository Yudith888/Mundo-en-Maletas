// script.js

const responses = {
    "planes de viaje": "Tenemos varios planes de viaje disponibles a destinos como Australia, Nueva York, Barranquilla y Busan. ¿Te gustaría saber más sobre alguno?",
    "hoteles": "Contamos con una selección de hoteles en diversos destinos. ¿Quieres saber más sobre nuestras opciones de alojamiento?",
    "australia": "Australia es un destino espectacular, famoso por su naturaleza y playas. ¿Te interesa reservar un viaje a Australia?",
    "nueva york": "Nueva York es una ciudad vibrante llena de cultura, tiendas y restaurantes. ¿Te gustaría saber más sobre un plan de viaje allí?",
    "barranquilla": "Barranquilla es conocida por su carnaval y su hospitalidad. ¿Te gustaría conocer nuestros planes para Barranquilla?",
    "busan": "Busan es una ciudad costera de Corea del Sur, famosa por sus playas. ¿Quieres conocer nuestros planes para Busan?",
    "default": "Lo siento, no entendí eso. ¿Puedes preguntar algo relacionado con nuestros viajes, planes o hoteles?"
};

// Mostrar el mensaje del usuario en el chat
function showUserMessage(message) {
    const chatContent = document.getElementById('chatContent');
    const userMessageDiv = document.createElement('div');
    userMessageDiv.classList.add('user-message');
    userMessageDiv.innerHTML = `<p>${message}</p>`;
    chatContent.appendChild(userMessageDiv);
    chatContent.scrollTop = chatContent.scrollHeight;
}

// Mostrar el mensaje del bot en el chat
function showBotMessage(message) {
    const chatContent = document.getElementById('chatContent');
    const botMessageDiv = document.createElement('div');
    botMessageDiv.classList.add('bot-message');
    botMessageDiv.innerHTML = `<p>${message}</p>`;
    chatContent.appendChild(botMessageDiv);
    chatContent.scrollTop = chatContent.scrollHeight;
}

// Función para enviar el mensaje
function sendMessage() {
    const userInput = document.getElementById('userInput').value.trim();
    if (userInput) {
        showUserMessage(userInput);
        const response = responses[userInput.toLowerCase()] || responses['default'];
        setTimeout(() => showBotMessage(response), 500);
    }
    document.getElementById('userInput').value = '';
}

// Función para alternar la visibilidad del chatbot
function toggleChat() {
    const chatbox = document.querySelector('.chatbox');
    chatbox.style.display = (chatbox.style.display === 'none') ? 'block' : 'none';
}
