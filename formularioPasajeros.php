<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Reserva</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            color: #333;
            margin: 0;
            padding: 0;
        }
        h1, h2 {
            text-align: center;
            color: #2c3e50;
        }
        .form-section {
            background-color: #fff;
            padding: 20px;
            margin: 20px auto;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 600px;
        }
        label {
            font-weight: bold;
            display: block;
            margin: 10px 0 5px;
        }
        input, select, button {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
        button {
            background-color: #3498db;
            color: white;
            font-size: 16px;
            border: none;
            cursor: pointer;
        }
        button:hover {
            background-color: #2980b9;
        }
        .passenger-form {
            background-color: #ecf0f1;
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 8px;
        }
        .passenger-form h3 {
            color: #2c3e50;
        }
        #cart {
            background-color: #fff;
            padding: 20px;
            margin: 20px auto;
            max-width: 600px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        #cart ul {
            list-style-type: none;
            padding: 0;
        }
        #cart ul li {
            background-color: #f9f9f9;
            margin: 10px 0;
            padding: 10px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        #cartList li strong {
            display: block;
            margin-bottom: 5px;
        }
        @media (max-width: 768px) {
            .form-section {
                width: 90%;
            }
        }
    </style>
</head>
<body>

    <h1>Formulario de Reserva de Vuelo</h1>

    <div class="form-section" id="initialForm">
        <h2>Ingrese la cantidad de pasajeros</h2>
        <label for="passengerCount">Cantidad de Pasajeros:</label>
        <input type="number" id="passengerCount" min="1" required>
        <button onclick="generatePassengerForms()">Generar Formularios</button>
    </div>

    <div id="reservationForm" class="form-section" style="display: none;">
        <h2>Complete los datos de los pasajeros</h2>
    </div>
    <button id="addToCart" style="display: none;" onclick="addToCart()">Añadir al Carrito</button>

    <div id="cart" style="display: none;">
        <h2>Carrito de Compras</h2>
        <ul id="cartList"></ul>
        <form id="purchaseForm" action="carrito.php" method="POST" style="display: none;">
            <input type="hidden" name="cartData" id="cartData">
            <button type="submit">Ir al Carrito</button>
        </form>
    </div>

    <script>
        let cart = [];

        function generatePassengerForms() {
            const passengerCount = document.getElementById("passengerCount").value;
            const formContainer = document.getElementById("reservationForm");
            formContainer.innerHTML = "";

            if (!passengerCount || passengerCount < 1) {
                alert("Por favor, ingrese una cantidad válida de pasajeros.");
                return;
            }

            for (let i = 1; i <= passengerCount; i++) {
                const passengerForm = document.createElement("div");
                passengerForm.classList.add("passenger-form");
                passengerForm.innerHTML = `
                    <h3>Pasajero ${i}</h3>
                    <label for="name${i}">Nombre:</label>
                    <input type="text" id="name${i}" name="name${i}" required>
                    <label for="document${i}">Documento:</label>
                    <input type="text" id="document${i}" name="document${i}" required>
                    <label for="age${i}">Edad:</label>
                    <input type="number" id="age${i}" name="age${i}" min="1" required>
                    <label for="seat${i}">Clase y Asiento:</label>
                    <select id="seat${i}" name="seat${i}" required onchange="updatePrice(${i})">
                        <option value="" disabled selected>Seleccionar</option>
                        <option value="Económica-A1">Económica - A1 - $300,000</option>
                        <option value="Económica-A2">Económica - A2 - $320,000</option>
                        <option value="Ejecutiva-B1">Ejecutiva - B1 - $550,000</option>
                        <option value="Ejecutiva-B2">Ejecutiva - B2 - $570,000</option>
                        <option value="Primera Clase-C1">Primera Clase - C1 - $1,000,000</option>
                        <option value="Primera Clase-C2">Primera Clase - C2 - $1,050,000</option>
                    </select>
                    <label for="departureTime${i}">Hora de Ida:</label>
                    <input type="time" id="departureTime${i}" name="departureTime${i}" required>
                    <label for="returnTime${i}">Hora de Vuelta:</label>
                    <input type="time" id="returnTime${i}" name="returnTime${i}" required>
                    <label for="price${i}">Precio:</label>
                    <input type="text" id="price${i}" name="price${i}" readonly>
                `;
                formContainer.appendChild(passengerForm);
            }

            formContainer.style.display = "block";
            document.getElementById("addToCart").style.display = "block";
        }

        function updatePrice(i) {
            const seat = document.getElementById(`seat${i}`).value;
            let price = 0;
            switch (seat) {
                case 'Económica-A1': price = 300000; break;
                case 'Económica-A2': price = 320000; break;
                case 'Ejecutiva-B1': price = 550000; break;
                case 'Ejecutiva-B2': price = 570000; break;
                case 'Primera Clase-C1': price = 1000000; break;
                case 'Primera Clase-C2': price = 1050000; break;
            }
            document.getElementById(`price${i}`).value = `$${price.toLocaleString()}`;
        }

        function addToCart() {
            const reservationForm = document.getElementById("reservationForm");
            const passengers = reservationForm.querySelectorAll(".passenger-form");

            passengers.forEach((form, index) => {
                const passengerData = {
                    nombre: form.querySelector(`#name${index + 1}`).value,
                    documento: form.querySelector(`#document${index + 1}`).value,
                    edad: form.querySelector(`#age${index + 1}`).value,
                    asiento: form.querySelector(`#seat${index + 1}`).value,
                    horaIda: form.querySelector(`#departureTime${index + 1}`).value,
                    horaVuelta: form.querySelector(`#returnTime${index + 1}`).value,
                    precio: form.querySelector(`#price${index + 1}`).value
                };
                cart.push(passengerData);
            });

            updateCart();
            alert("Reservas añadidas al carrito.");
        }

        function removeFromCart(index) {
            cart.splice(index, 1); // Eliminar el pasajero del carrito
            updateCart();
        }

        function updateCart() {
            const cartList = document.getElementById("cartList");
            cartList.innerHTML = "";

            cart.forEach((item, index) => {
                const listItem = document.createElement("li");
                listItem.innerHTML = `
                    <strong>Pasajero ${index + 1}:</strong>
                    Nombre: ${item.nombre}, Asiento: ${item.asiento}, Precio: ${item.precio}
                    <button onclick="removeFromCart(${index})">Eliminar</button>
                `;
                cartList.appendChild(listItem);
            });

            if (cart.length > 0) {
                document.getElementById("cart").style.display = "block";
                document.getElementById("purchaseForm").style.display = "block";
                document.getElementById("cartData").value = JSON.stringify(cart); // Para enviar los datos al servidor
            } else {
                document.getElementById("cart").style.display = "none";
                document.getElementById("purchaseForm").style.display = "none";
            }
        }
    </script>
</body>
</html>
