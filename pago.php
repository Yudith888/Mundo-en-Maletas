<?php
// Verificar si se ha recibido el carrito de compra
if (isset($_GET['cart']) && !empty($_GET['cart'])) {
    // Decodificar el carrito recibido en formato JSON
    $cart = json_decode($_GET['cart'], true);
} else {
    echo "<p>No se recibieron datos del carrito. Redirigiendo...</p>";
    header("Refresh: 2; url=index.php"); // Redirigir a la página principal o donde esté el carrito
    exit();
}

// Función para calcular el total del carrito
$total = 0;
foreach ($cart as $item) {
    // Verificar si 'precio' está presente antes de sumarlo
    if (isset($item['precio'])) {
        $total += $item['precio']; // Sumar precio si está presente
    } else {
        // Si el precio no está definido, puedes asignar un valor por defecto (por ejemplo, 0)
        echo '<p><strong>Advertencia:</strong> El precio de un artículo no está definido.</p>';
        // Asignar precio 0 para el artículo sin precio
        $total += 0;
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pasarela de Pagos</title>
    <style>
        /* Estilos básicos */
        body { font-family: Arial, sans-serif; background-color: #f4f4f4; color: #333; margin: 0; padding: 0; }
        .container { max-width: 800px; margin: 20px auto; padding: 20px; background-color: #fff; border-radius: 10px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); }
        h1 { text-align: center; color: #007bff; }
        .summary { margin-bottom: 20px; }
        .summary p { margin: 5px 0; }
        .error { color: red; text-align: center; font-weight: bold; }
        .form-buttons { text-align: center; margin-top: 20px; }
        .button { background-color: #28a745; color: white; padding: 10px 20px; cursor: pointer; border: none; border-radius: 5px; }
        .button:hover { background-color: #218838; }
        .form-group { margin-bottom: 15px; }

        /* Estilos de la ventana modal */
        .modal {
            display: none; 
            position: fixed; 
            z-index: 1; 
            left: 0; 
            top: 0; 
            width: 100%; 
            height: 100%; 
            background-color: rgba(0,0,0,0.4); 
            overflow: auto; 
            padding-top: 60px;
        }

        /* Modal Content */
        .modal-content {
            background-color: #fefefe;
            margin: 5% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            max-width: 400px;
            text-align: center;
            border-radius: 10px;
        }

        /* Botón de cerrar */
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
    <h1>Pasarela de Pagos</h1>
    <p>Revise los detalles de su reserva y proceda con el pago.</p>

    <!-- Resumen del carrito -->
    <div class="summary">
        <h2>Resumen de la Reserva</h2>
        <?php
        if (is_array($cart) && count($cart) > 0) {
            foreach ($cart as $index => $item) {
                // Cambiar la moneda a pesos colombianos
                $precioFormateado = number_format($item['precio'], 2, '.', ',');
                echo '<p><strong>Pasajero:</strong> ' . htmlspecialchars($item['nombre']) . '</p>';
                echo '<p><strong>Documento:</strong> ' . htmlspecialchars($item['documento']) . '</p>';
                echo '<p><strong>Fecha de salida:</strong> ' . htmlspecialchars($item['fechaSalida']) . ' <strong>Hora de salida:</strong> ' . htmlspecialchars($item['horaSalida']) . '</p>';
                echo '<p><strong>Fecha de regreso:</strong> ' . htmlspecialchars($item['fechaRegreso']) . ' <strong>Hora de regreso:</strong> ' . htmlspecialchars($item['horaRegreso']) . '</p>';
                echo '<p><strong>Precio: </strong>' . '$' . $precioFormateado . ' COP</p>';
                echo '<hr>';
            }
        } else {
            echo '<div class="error">El carrito no contiene productos válidos.</div>';
        }
        ?>
        <p><strong>Total: </strong><?php echo '$' . number_format($total, 2, '.', ',') . ' COP'; ?></p>
    </div>

    <!-- Formulario de pago -->
    <form id="payment-form" action="procesar_pago.php" method="POST">
        <input type="hidden" name="cart" value="<?php echo htmlspecialchars(json_encode($cart)); ?>">
        <input type="hidden" name="total" value="<?php echo $total; ?>">

        <div class="form-group">
            <label for="nombre_cliente">Nombre del titular:</label><br>
            <input type="text" id="nombre_cliente" name="nombre_cliente" required><br><br>
        </div>

        <div class="form-group">
            <label for="metodo_pago">Método de Pago:</label><br>
            <select id="metodo_pago" name="metodo_pago" required>
                <option value="tarjeta_credito">Tarjeta de Crédito</option>
                <option value="paypal">PayPal</option>
                <option value="transferencia_bancaria">Transferencia Bancaria</option>
                <option value="efectivo">Pago en Efectivo</option>
            </select>
        </div>

        <button type="submit" class="button" id="payment-button">Procesar Pago</button>
    </form>

</div>

<!-- Modal de "Pago Exitoso" -->
<div id="successModal" class="modal">
  <div class="modal-content">
    <span class="close" id="closeModal">&times;</span>
    <h2>Pago Exitoso</h2>
    <p>¡Gracias por tu compra! El pago ha sido procesado con éxito.</p>
    <a href="planesdeviaje.php"><input type="button" class="read" value="Gracias"></a>
  </div>
</div>

<script>
// Mostrar la ventana modal de "Pago Exitoso"
document.getElementById('payment-form').addEventListener('submit', function(event) {
    event.preventDefault(); // Prevenir el envío del formulario

    // Simular un pago exitoso (aquí puedes poner tu lógica de pago real)
    setTimeout(function() {
        // Mostrar la ventana modal
        document.getElementById('successModal').style.display = "block";
    }, 500); // Simulamos un retardo de 500ms para mostrar la ventana modal
});

// Cerrar el modal cuando el usuario haga clic en el botón de cerrar
document.getElementById('closeModal').addEventListener('click', function() {
    document.getElementById('successModal').style.display = "none";
});

// Cerrar el modal si el usuario hace clic fuera de él
window.addEventListener('click', function(event) {
    if (event.target === document.getElementById('successModal')) {
        document.getElementById('successModal').style.display = "none";
    }
});
</script>

</body>
</html>
