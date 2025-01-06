<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Reserva</title>
    <link rel="stylesheet" href="formularioreserva.css">
    <style>
        /* Estilos del modal de pago */
        .payment-modal {
            display: none; /* Ocultar el modal por defecto */
            position: fixed; /* Fijar la posición del modal */
            z-index: 1000; /* Colocar el modal por encima de otros elementos */
            left: 0;
            top: 0;
            width: 100%; /* Ancho completo */
            height: 100%; /* Altura completa */
            overflow: auto; /* Habilitar desplazamiento si es necesario */
            background-color: rgba(0, 0, 0, 0.7); /* Fondo oscuro con opacidad */
        }

        .payment-modal-content {
            background-color: #ffffff; /* Fondo blanco para el contenido del modal */
            margin: 15% auto; /* Centrar el modal */
            padding: 20px;
            border: 1px solid #888; /* Borde gris */
            border-radius: 10px; /* Esquinas redondeadas */
            width: 300px; /* Ancho del modal */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Sombra sutil */
        }

        .payment-close {
            color: #aaa; /* Color del botón de cerrar */
            float: right; /* Alinear a la derecha */
            font-size: 28px; /* Tamaño de fuente */
            font-weight: bold; /* Negrita */
            cursor: pointer; /* Cursor de puntero al pasar sobre el botón */
        }

        .payment-close:hover,
        .payment-close:focus {
            color: black; /* Color al pasar el mouse */
            text-decoration: none; /* Sin subrayado */
            cursor: pointer; /* Cursor de puntero */
        }

        .payment-message {
            text-align: center; /* Centrar el texto */
            margin: 20px 0;
        }
    </style>
</head>
<body>
    <h1>Formulario de Reserva</h1>
    <div id="reservationForm"></div>
    <button class="submit-btn" onclick="openPaymentModal()">Confirmar Reserva</button>

    <div id="paymentModal" class="payment-modal">
        <div class="payment-modal-content">
            <span class="payment-close" onclick="closePaymentModal()">&times;</span>
            <h2>Confirmación de Pago</h2>
            <div class="payment-message">¿Está seguro de que desea confirmar la reserva y realizar el pago?</div>
            <center>
                <button class="read" onclick="processPayment()">Realizar Pago</button>
            </center>
        </div>
    </div>

    <script>
        const params = new URLSearchParams(window.location.search);
        const numPassengers = parseInt(params.get('numPassengers'));

        // Generar formulario según el número de pasajeros
        function generateForm() {
            const formContainer = document.getElementById("reservationForm");
            for (let i = 1; i <= numPassengers; i++) {
                const form = document.createElement("div");
                form.classList.add("passenger-form");
                form.innerHTML = `
                    <h3>Pasajero ${i}</h3>
                    <label for="name${i}">Nombre:</label>
                    <input type="text" id="name${i}" name="name${i}" required>
                    
                    <label for="document${i}">Documento:</label>
                    <input type="text" id="document${i}" name="document${i}" required>
                    
                    <label for="age${i}">Edad:</label>
                    <input type="number" id="age${i}" name="age${i}" min="0" required>
                    
                    <label for="seat${i}">Seleccionar Asiento:</label>
                    <select id="seat${i}" name="seat${i}" required>
                        <option value="" disabled selected>Elige tu asiento</option>
                        <option value="A1">A1</option>
                        <option value="A2">A2</option>
                        <option value="A3">A3</option>
                        <option value="B1">B1</option>
                        <option value="B2">B2</option>
                        <option value="B3">B3</option>
                        <option value="C1">C1</option>
                        <option value="C2">C2</option>
                        <option value="C3">C3</option>
                    </select>
                `;
                formContainer.appendChild(form);
            }
        }

        // Función para abrir el modal de pago
        function openPaymentModal() {
            document.getElementById("paymentModal").style.display = "block";
        }

        // Función para cerrar el modal de pago
        function closePaymentModal() {
            document.getElementById("paymentModal").style.display = "none";
        }

        // Función para procesar el pago
        function processPayment() {
            // Aquí puedes añadir la lógica para procesar el pago, como una llamada a la API
            alert("Pago realizado con éxito. ¡Gracias por su reserva!");
            closePaymentModal(); // Cierra el modal de pago
            // Aquí podrías redirigir a otra página o limpiar el formulario
        }

        generateForm();
        function processPayment() {
            // Redirigir a la página de métodos de pago
            window.location.href = "metodosdepago.php"; 
        }
        
    </script>
</body>
</html>
