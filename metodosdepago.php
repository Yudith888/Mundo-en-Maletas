<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reserva y Pago</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Formulario de Reserva</h1>
    
    <!-- Paso 1: Número de pasajeros -->
    <label for="numPassengers">Número de pasajeros:</label>
    <input type="number" id="numPassengers" min="1" required><br>
    <button onclick="generateReservationForm()">Generar Reserva</button>

    <div id="reservationForm"></div>

    <button onclick="generateTicket()">Confirmar Pago</button>

    <!-- Modal para ticket -->
    <div id="ticketModal" class="modal" style="display: none;">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <h2>Ticket de Reserva</h2>
            <p id="ticketInfo"></p>
            <button onclick="downloadTicket()">Descargar Ticket</button>
        </div>
    </div>

    <script>
        function generateReservationForm() {
            const numPassengers = document.getElementById('numPassengers').value;
            const formContainer = document.getElementById('reservationForm');
            formContainer.innerHTML = ''; // Limpiar el formulario previo

            for (let i = 1; i <= numPassengers; i++) {
                const form = document.createElement('div');
                form.classList.add('passenger-form');
                form.innerHTML = `
                    <h3>Pasajero ${i}</h3>
                    <label for="name${i}">Nombre:</label>
                    <input type="text" id="name${i}" name="name${i}" required><br>
                    <label for="seat${i}">Asiento:</label>
                    <input type="text" id="seat${i}" name="seat${i}" required><br>
                `;
                formContainer.appendChild(form);
            }
        }

        function generateTicket() {
            const numPassengers = document.getElementById('numPassengers').value;
            let passengersInfo = '';
            for (let i = 1; i <= numPassengers; i++) {
                const name = document.getElementById(`name${i}`).value;
                const seat = document.getElementById(`seat${i}`).value;
                passengersInfo += `Pasajero ${i}: ${name}, Asiento: ${seat}<br>`;
            }

            const paymentMethod = "Método de pago: Seleccionado"; // Aquí puedes modificar según el método de pago
            const ticketContent = `
                <h3>Reserva Confirmada</h3>
                ${passengersInfo}
                <br>
                ${paymentMethod}
            `;

            document.getElementById('ticketInfo').innerHTML = ticketContent;
            document.getElementById("ticketModal").style.display = "block";
        }

        function closeModal() {
            document.getElementById("ticketModal").style.display = "none";
        }

        function downloadTicket() {
            const ticketContent = document.getElementById('ticketInfo').innerHTML;
            const element = document.createElement('a');
            const file = new Blob([ticketContent], { type: 'text/html' });
            element.href = URL.createObjectURL(file);
            element.download = "ticket_reserva.html";
            element.click();
        }
    </script>
</body>
</html>
