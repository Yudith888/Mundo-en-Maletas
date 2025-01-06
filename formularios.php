<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Reserva de Viaje</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f2f2f2;
        }

        .container {
            width: 80%;
            margin: 0 auto;
            padding: 20px;
            background-color: white;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            margin-top: 30px;
        }

        h1 {
            text-align: center;
            font-size: 2em;
            color: #333;
            margin-bottom: 20px;
        }

        form {
            background-color: #fafafa;
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 20px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .input-field {
            margin: 15px 0;
        }

        .input-field input, .input-field select {
            width: 100%;
            padding: 12px;
            font-size: 16px;
            border: 2px solid #ddd;
            border-radius: 5px;
            transition: border-color 0.3s ease;
        }

        .input-field input:focus, .input-field select:focus {
            border-color: #4CAF50;
            outline: none;
        }

        button {
            width: 100%;
            padding: 12px;
            background-color: #4CAF50;
            color: white;
            border: none;
            font-size: 18px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #45a049;
        }

        .form-container {
            margin-top: 30px;
        }

        .error-message {
            text-align: center;
            color: #ff6347;
            font-size: 18px;
        }

        .cart-item {
            display: flex;
            justify-content: space-between;
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }

        .cart-item button {
            background-color: #e74c3c;
            color: white;
            border: none;
            cursor: pointer;
            padding: 5px 10px;
            border-radius: 3px;
        }

        .cart-item button:hover {
            background-color: #c0392b;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Formulario de Reserva de Viaje</h1>
        <div id="reservation-forms" class="form-container"></div>
        <h2>Carrito de Compras</h2>
        <ul id="cart-list"></ul>
        <button id="checkout-button" style="width: auto; background-color: #f39c12;">Proceder a Pago</button>
        
        <!-- Formulario oculto para enviar el carrito -->
        <form id="cart-form" action="compras.php" method="POST" style="display:none;">
            <input type="hidden" name="cart" id="cart-input" />
        </form>
    </div>

    <script>
        // Inicializamos el carrito de compras
        let cart = JSON.parse(localStorage.getItem('cart')) || [];

        // Capturar el parámetro 'count' de la URL
        const urlParams = new URLSearchParams(window.location.search);
        const passengerCount = parseInt(urlParams.get('count'), 10);

        // Contenedor de los formularios
        const reservationFormsContainer = document.getElementById('reservation-forms');
        const cartList = document.getElementById('cart-list');

        // Obtener la fecha actual en formato YYYY-MM-DD
        const currentDate = new Date().toISOString().split('T')[0];

        // Función para actualizar el carrito visualmente
        function updateCart() {
            cartList.innerHTML = '';
            cart.forEach((item, index) => {
                const listItem = document.createElement('li');
                listItem.classList.add('cart-item');
                listItem.innerHTML = `
                    Pasajero ${index + 1}: ${item.nombre} - ${item.fechaSalida} ${item.horaSalida} a ${item.fechaRegreso} ${item.horaRegreso} - Precio: ${item.precio} COP
                    <button onclick="removeFromCart(${index})">Eliminar</button>
                `;
                cartList.appendChild(listItem);
            });
        }

        // Añadir al carrito
        function addToCart(formData) {
            cart.push(formData);
            localStorage.setItem('cart', JSON.stringify(cart));
            updateCart();
        }

        // Eliminar del carrito
        function removeFromCart(index) {
            cart.splice(index, 1);
            localStorage.setItem('cart', JSON.stringify(cart));
            updateCart();
        }

        if (!passengerCount || passengerCount < 1) {
            reservationFormsContainer.innerHTML = '<p class="error-message">Error: Cantidad de pasajeros inválida.</p>';
        } else {
            for (let i = 1; i <= passengerCount; i++) {
                const form = document.createElement('form');
                form.innerHTML = `
                    <h3>Pasajero ${i}</h3>
                    <div class="input-field">
                        <input type="text" id="name-${i}" placeholder="Nombre completo" required />
                    </div>
                    <div class="input-field">
                        <input type="text" id="document-${i}" placeholder="Número de documento" required />
                    </div>
                    <div class="input-field">
                        <input type="email" id="email-${i}" placeholder="Correo electrónico" required />
                    </div>
                    <div class="input-field">
                        <input type="tel" id="phone-${i}" placeholder="Número de teléfono" required />
                    </div>
                    <div class="input-field">
                        <input type="date" id="departure-date-${i}" placeholder="Fecha de salida" required min="${currentDate}" />
                    </div>
                    <div class="input-field">
                        <input type="time" id="departure-time-${i}" placeholder="Hora de salida" required />
                    </div>
                    <div class="input-field">
                        <input type="date" id="return-date-${i}" placeholder="Fecha de regreso" required min="${currentDate}" />
                    </div>
                    <div class="input-field">
                        <input type="time" id="return-time-${i}" placeholder="Hora de regreso" required />
                    </div>
                    <div class="input-field">
                        <select id="price-${i}" required>
                            <option value="" disabled selected>Selecciona el precio</option>
                            <option value="1500000">Económica - 1.500.000 COP</option>
                            <option value="2000000">Ejecutiva - 2.000.000 COP</option>
                            <option value="2500000">Primera Clase - 2.500.000 COP</option>
                        </select>
                    </div>
                    <button type="button" onclick="addPassenger(${i})">Reservar</button>
                `;
                reservationFormsContainer.appendChild(form);
            }
        }

        // Función para manejar la adición de un pasajero al carrito
        function addPassenger(i) {
            const nombre = document.getElementById(`name-${i}`).value;
            const documento = document.getElementById(`document-${i}`).value;
            const email = document.getElementById(`email-${i}`).value;
            const phone = document.getElementById(`phone-${i}`).value;
            const fechaSalida = document.getElementById(`departure-date-${i}`).value;
            const horaSalida = document.getElementById(`departure-time-${i}`).value;
            const fechaRegreso = document.getElementById(`return-date-${i}`).value;
            const horaRegreso = document.getElementById(`return-time-${i}`).value;
            const precio = document.getElementById(`price-${i}`).value;

            if (nombre && documento && email && phone && fechaSalida && horaSalida && fechaRegreso && horaRegreso && precio) {
                const passengerData = {
                    nombre,
                    documento,
                    email,
                    phone,
                    fechaSalida,
                    horaSalida,
                    fechaRegreso,
                    horaRegreso,
                    precio
                };
                addToCart(passengerData);
            } else {
                alert("Por favor, completa todos los campos.");
            }
        }

        // Botón de checkout
        document.getElementById('checkout-button').addEventListener('click', function() {
            if (cart.length === 0) {
                alert("Tu carrito está vacío.");
            } else {
                // Enviar los datos al formulario oculto
                document.getElementById('cart-input').value = JSON.stringify(cart);
                document.getElementById('cart-form').submit();
            }
        });

        updateCart();
    </script>
</body>
</html>
