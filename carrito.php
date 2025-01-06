<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito de Compras</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        h1 {
            text-align: center;
            color: #007bff;
        }
        .container {
            max-width: 900px;
            margin: 0 auto;
            padding: 20px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .passenger {
            margin-bottom: 20px;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            background-color: #f9f9f9;
        }
        .passenger h2 {
            color: #007bff;
            margin-top: 0;
        }
        .passenger p {
            margin: 5px 0;
        }
        .hr {
            border: 0;
            border-top: 1px solid #ddd;
            margin: 10px 0;
        }
        .payment-buttons {
            margin-top: 20px;
            text-align: center;
        }
        .payment-buttons button {
            padding: 10px 20px;
            font-size: 16px;
            margin: 10px;
            cursor: pointer;
        }
        .stripe-btn {
            background-color: #6772e5;
            color: white;
            border: none;
            border-radius: 5px;
        }
        /* Estilos para el modal */
        .modal {
            display: none; 
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgb(0,0,0); 
            background-color: rgba(0,0,0,0.4);
            padding-top: 60px;
        }
        .modal-content {
            background-color: #fefefe;
            margin: 5% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            border-radius: 10px;
        }
        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }
        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
        .modal-header {
            font-size: 18px;
            color: #007bff;
            margin-bottom: 20px;
        }
        .read {
            background: linear-gradient(90deg, #3730a3, #7e22ce); /* Gradiente de fondo */
            padding: 12px; /* Espaciado interno */
            color: #fff; /* Color del texto */
            text-decoration: none; /* Sin subrayado */
            border-radius: 8px; /* Bordes redondeados */
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Carrito de Compras</h1>

        <!-- Verificar si el carrito contiene datos válidos -->
        <?php
        if (isset($_POST['cartData'])) {
            $cartData = json_decode($_POST['cartData'], true);

            if (is_array($cartData) && count($cartData) > 0) {
                $totalPrice = 0; // Inicializar el total

                foreach ($cartData as $index => $passenger) {
                    echo '<div class="passenger">';
                    echo "<h2>Pasajero " . ($index + 1) . "</h2>";
                    echo "<p><strong>Nombre:</strong> " . htmlspecialchars($passenger['nombre']) . "</p>";
                    echo "<p><strong>Documento:</strong> " . htmlspecialchars($passenger['documento']) . "</p>";
                    echo "<p><strong>Edad:</strong> " . htmlspecialchars($passenger['edad']) . "</p>";
                    echo "<p><strong>Asiento:</strong> " . htmlspecialchars($passenger['asiento']) . "</p>";
                    echo "<p><strong>Precio:</strong> " . htmlspecialchars($passenger['precio']) . "</p>";
                    echo "<hr class='hr'>";
                    echo '</div>';

                    // Sumar el precio de cada pasajero al total
                    $price = preg_replace("/[^\d]/", "", $passenger['precio']); // Eliminar símbolos no numéricos
                    $totalPrice += $price;
                }

                // Mostrar el total
                echo "<h3>Total de la Compra: $ " . number_format($totalPrice, 0, ',', '.') . "</h3>";
            } else {
                echo "<p>No hay pasajeros en el carrito.</p>";
            }
        } else {
            echo "No hay datos del carrito.";
        }
        ?>

        <!-- Botón de pago con tarjeta -->
        <div class="payment-buttons">
            <button class="stripe-btn" onclick="openModal()">Pagar con Tarjeta de Crédito</button>
        </div>

        <!-- Modal para pago -->
        <div id="paymentModal" class="modal">
            <div class="modal-content">
                <span class="close" onclick="closeModal()">&times;</span>
                <div class="modal-header">
                    <h2>Detalles del Pago</h2>
                </div>
                <p><strong>Método de pago:</strong> Tarjeta de Crédito</p>
                <p><strong>Total a pagar:</strong> $ <span id="totalPriceModal"></span></p>
                <p>Por favor, complete el proceso de pago con su tarjeta de crédito.</p>
                <form action="procesar_pago.php" method="POST">
                    <label for="cardNumber">Número de tarjeta:</label>
                    <input type="text" id="cardNumber" name="cardNumber" required>
                    <label for="expirationDate">Fecha de expiración:</label>
                    <input type="text" id="expirationDate" name="expirationDate" required>
                    <label for="cvv">CVV:</label>
                    <input type="text" id="cvv" name="cvv" required>
                    <button type="submit" class="read">Procesar Pago</button>
                </form>
            </div>
        </div>

    </div>

    <script>
        // Función para abrir el modal y mostrar los detalles del pago
        function openModal() {
            var modal = document.getElementById("paymentModal");
            var totalPriceText = document.getElementById("totalPriceModal");

            // Establecer el total
            totalPriceText.innerText = "<?php echo number_format($totalPrice, 0, ',', '.'); ?>";

            // Mostrar el modal
            modal.style.display = "block";
        }

        // Función para cerrar el modal
        function closeModal() {
            var modal = document.getElementById("paymentModal");
            modal.style.display = "none";
        }

        // Cerrar el modal si el usuario hace clic fuera de él
        window.onclick = function(event) {
            var modal = document.getElementById("paymentModal");
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>

</body>
</html>
