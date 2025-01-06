<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reserva</title>
    <style>
        /* Estilo global */
        body {
            font-family: Arial, sans-serif;
            background-image: url(image/airplane.jpg);
            background-size: cover;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        h1 {
            text-align: center;
            color: #333;
            font-size: 2.5rem;
            margin-bottom: 30px;
        }

        form {
            background: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            max-width: 600px;
            width: 100%;
        }

        .form-container {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .form-container h3 {
            color: #555;
            font-size: 1.2rem;
            margin-bottom: 10px;
        }

        label {
            display: block;
            font-size: 1rem;
            color: #444;
            margin-bottom: 5px;
        }

        input {
            width: 100%;
            padding: 10px;
            font-size: 1rem;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        input:focus {
            outline: none;
            border-color: #fda085;
            box-shadow: 0 0 5px rgba(253, 160, 133, 0.5);
        }

        button {
            background: linear-gradient(90deg, #3730a3, #7e22ce);
            color: #fff;
            font-size: 1rem;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        button:hover {
            background: linear-gradient(90deg, #fda085, #f6d365);
        }

        p {
            text-align: center;
            color: #555;
            font-size: 1rem;
        }

        /* Estilo para el modal */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
        }

        .modal-content {
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            text-align: center;
            width: 80%;
            max-width: 400px;
        }

        .modal-content h2 {
            margin-bottom: 20px;
        }

        .modal-content button {
            margin-top: 10px;
            display: block;
            width: 100%;
        }

        .close {
            position: absolute;
            top: 10px;
            right: 15px;
            font-size: 1.5rem;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <form id="formReservas">
        <h1>Reserva</h1>
        <div id="formContainer" class="form-container"></div>
        <button type="submit">Confirmar Reservas</button>
        <button type="button" id="btnPago">Pagar</button>
    </form>

    <!-- Modal de pago -->
    <div id="modalPago" class="modal">
        <div class="modal-content">
            <span class="close" id="closeModal">&times;</span>
            <h2>Opciones de Pago</h2>
            <button>Tarjeta de Crédito</button>
            <button>PayPal</button>
            <button>Transferencia Bancaria</button>
        </div>
    </div>

    <script>
       document.addEventListener("DOMContentLoaded", () => {
            const numPersonas = localStorage.getItem("numPersonas");
            const precioPorPersona = localStorage.getItem("precioPorPersona");
            const formContainer = document.getElementById("formContainer");

            // Obtén la fecha actual en formato YYYY-MM-DD
            const today = new Date().toISOString().split("T")[0];

            if (numPersonas && precioPorPersona) {
                // Mostrar formulario para cada persona
                for (let i = 1; i <= numPersonas; i++) {
                    const personForm = document.createElement("div");
                    personForm.innerHTML = `
                        <h3>Persona ${i}</h3>
                        <label for="nombre${i}">Nombre:</label>
                        <input type="text" id="nombre${i}" name="nombre${i}" placeholder="Nombre" required>
                        <label for="email${i}">Correo Electrónico:</label>
                        <input type="email" id="email${i}" name="email${i}" placeholder="Correo" required>
                        <label for="fechaIngreso${i}">Fecha de Ingreso:</label>
                        <input type="date" id="fechaIngreso${i}" name="fechaIngreso${i}" min="${today}" required>
                        <label for="horaIngreso${i}">Hora de Ingreso:</label>
                        <input type="time" id="horaIngreso${i}" name="horaIngreso${i}" required>
                    `;
                    formContainer.appendChild(personForm);
                }

                // Mostrar el total calculado
                const total = numPersonas * precioPorPersona;
                const totalElement = document.createElement("p");
                totalElement.style.fontWeight = "bold";
                totalElement.textContent = `Total: $${total.toLocaleString()}`;
                formContainer.appendChild(totalElement);
            } else {
                formContainer.innerHTML = "<p>No se especificó el número de personas o el precio.</p>";
            }

            // Validación y envío
            document.getElementById("formReservas").addEventListener("submit", (e) => {
                e.preventDefault();
                alert(`Reservas confirmadas para ${numPersonas} personas por un total de $${(numPersonas * precioPorPersona).toLocaleString()}`);
            });

            // Modal funcionalidad
            const modalPago = document.getElementById("modalPago");
            const btnPago = document.getElementById("btnPago");
            const closeModal = document.getElementById("closeModal");

            // Mostrar el modal
            btnPago.addEventListener("click", () => {
                modalPago.style.display = "flex";
            });

            // Cerrar el modal
            closeModal.addEventListener("click", () => {
                modalPago.style.display = "none";
            });

            // Cerrar el modal haciendo clic fuera del contenido
            window.addEventListener("click", (event) => {
                if (event.target === modalPago) {
                    modalPago.style.display = "none";
                }
            });
        });
    </script>
</body>
</html>
