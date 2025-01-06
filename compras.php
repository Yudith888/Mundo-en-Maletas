<?php
// Verificar si el formulario se ha enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Verificar si el carrito está presente en los datos POST
    if (isset($_POST['cart']) && !empty($_POST['cart'])) {
        // Decodificar el JSON recibido
        $cart = json_decode($_POST['cart'], true);

        // Vaciar el carrito si el botón "Vaciar Carrito" es presionado
        if (isset($_POST['vaciar_carrito'])) {
            $cart = [];  // Vaciar el carrito
            echo "<p>El carrito ha sido vaciado.</p>";
        }

        // Eliminar un pasajero si el botón de eliminación es presionado
        if (isset($_POST['eliminar_pasajero'])) {
            $index = $_POST['eliminar_pasajero'];
            if (isset($cart[$index])) {
                unset($cart[$index]);  // Eliminar el pasajero seleccionado
                $cart = array_values($cart);  // Reindexar el arreglo
                echo "<p>El pasajero ha sido eliminado.</p>";
            }
        }

        // Diseño del HTML
        echo '<!DOCTYPE html>';
        echo '<html lang="es">';
        echo '<head>';
        echo '<meta charset="UTF-8">';
        echo '<meta name="viewport" content="width=device-width, initial-scale=1.0">';
        echo '<title>Detalles de la Reserva</title>';
        echo '<style>';
        echo 'body { font-family: Arial, sans-serif; background-color: #f4f4f4; color: #333; margin: 0; padding: 0; }';
        echo '.container { max-width: 800px; margin: 20px auto; padding: 20px; background-color: #fff; border-radius: 10px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); }';
        echo 'h1 { text-align: center; color: #007bff; }';
        echo '.passenger { border-bottom: 1px solid #ddd; padding: 10px 0; margin-bottom: 10px; }';
        echo '.passenger h3 { color: #007bff; margin-bottom: 5px; }';
        echo '.passenger p { margin: 5px 0; }';
        echo '.button { background-color: #28a745; color: white; border: none; padding: 10px 20px; cursor: pointer; border-radius: 5px; }';
        echo '.button:hover { background-color: #218838; }';
        echo '.error { color: red; text-align: center; font-weight: bold; }';
        echo '.form-buttons { text-align: center; margin-top: 20px; }';
        echo '.modal { display: none; position: fixed; z-index: 1; left: 0; top: 0; width: 100%; height: 100%; overflow: auto; background-color: rgba(0, 0, 0, 0.4); padding-top: 60px; }';
        echo '.modal-content { background-color: #fefefe; margin: 5% auto; padding: 30px; border-radius: 10px; width: 80%; max-width: 400px; box-shadow: 0 2px 15px rgba(0, 0, 0, 0.2); }';
        echo '.close { color: #aaa; float: right; font-size: 28px; font-weight: bold; }';
        echo '.close:hover, .close:focus { color: black; text-decoration: none; cursor: pointer; }';
        echo '.pay-button { background-color: #007bff; color: white; padding: 10px 20px; border: none; cursor: pointer; border-radius: 5px; margin-top: 20px; width: 100%; }';
        echo '.pay-button:hover { background-color: #0056b3; }';
        echo 'input[type="text"], input[type="number"] { width: 100%; padding: 12px 20px; margin: 8px 0; border: 1px solid #ccc; border-radius: 5px; }';
        echo 'label { font-weight: bold; display: block; margin-bottom: 5px; }';
        echo '</style>';
        echo '</head>';
        echo '<body>';

        // Verificar si el carrito contiene datos válidos
        if (is_array($cart) && count($cart) > 0) {
            echo '<div class="container">';
            echo '<h1>Detalles de la Reserva</h1>';

            // Mostrar los datos de los pasajeros
            $total = 0; // Variable para calcular el total
            foreach ($cart as $index => $item) {
                echo '<div class="passenger">';
                echo '<h3>Pasajero: ' . htmlspecialchars($item['nombre']) . '</h3>';
                echo '<p><strong>Documento:</strong> ' . htmlspecialchars($item['documento']) . '</p>';
                echo '<p><strong>Fecha de salida:</strong> ' . htmlspecialchars($item['fechaSalida']) . ' <strong>Hora de salida:</strong> ' . htmlspecialchars($item['horaSalida']) . '</p>';
                echo '<p><strong>Fecha de regreso:</strong> ' . htmlspecialchars($item['fechaRegreso']) . ' <strong>Hora de regreso:</strong> ' . htmlspecialchars($item['horaRegreso']) . '</p>';
                echo '<p><strong>Precio:</strong> ' . number_format($item['precio'], 0, ',', '.') . ' COP</p>'; // Cambié a COP

                // Añadir precio al total
                $total += $item['precio'];

                // Botón para eliminar el pasajero
                echo '<form method="POST" style="display:inline;">';
                echo '<input type="hidden" name="cart" value="' . htmlspecialchars(json_encode($cart)) . '">';
                echo '<button type="submit" name="eliminar_pasajero" value="' . $index . '" class="button">Eliminar</button>';
                echo '</form>';
                echo '</div>';
            }

            // Mostrar el total
            echo '<h2>Total: ' . number_format($total, 0, ',', '.') . ' COP</h2>'; // Cambié a COP

            echo '<div class="form-buttons">';
            echo '<form method="POST" style="display:inline;">';
            echo '<input type="hidden" name="cart" value="' . htmlspecialchars(json_encode($cart)) . '">';
            echo '<button type="submit" name="vaciar_carrito" class="button">Vaciar Carrito</button>';
            echo '</form>';
            echo '<button id="payButton" class="pay-button">Pagar con Tarjeta de Crédito</button>';
            echo '</div>'; // fin form-buttons

            // Modal para el pago
            echo '<div id="paymentModal" class="modal">';
            echo '<div class="modal-content">';
            echo '<span class="close">&times;</span>';
            echo '<h2>Pago con Tarjeta de Crédito</h2>';
            echo '<form method="POST" action="procesar_pago.php">';
            echo '<label for="cardNumber">Número de Tarjeta:</label>';
            echo '<input type="text" id="cardNumber" name="cardNumber" required>';
            echo '<label for="expirationDate">Fecha de Expiración:</label>';
            echo '<input type="text" id="expirationDate" name="expirationDate" required>';
            echo '<label for="cvv">CVV:</label>';
            echo '<input type="text" id="cvv" name="cvv" required>';
            echo '<button type="submit" class="pay-button">Procesar Pago</button>';
            echo '</form>';
            echo '</div>';
            echo '</div>'; // fin modal

            echo '</div>'; // fin container
        } else {
            echo '<div class="error">El carrito no contiene datos válidos.</div>';
        }

        echo '<script>';
        echo 'var modal = document.getElementById("paymentModal");';
        echo 'var btn = document.getElementById("payButton");';
        echo 'var span = document.getElementsByClassName("close")[0];';
        
        // Mostrar el modal cuando se hace clic en el botón de pago
        echo 'btn.onclick = function() { modal.style.display = "block"; };';

        // Cerrar el modal cuando se hace clic en la "X"
        echo 'span.onclick = function() { modal.style.display = "none"; };';
        
        // Cerrar el modal si se hace clic fuera de la ventana modal
        echo 'window.onclick = function(event) { if (event.target == modal) { modal.style.display = "none"; } };';
        echo '</script>';

        echo '</body>';
        echo '</html>';
    } else {
        echo "No se envió un carrito válido.";
    }
}
?>
