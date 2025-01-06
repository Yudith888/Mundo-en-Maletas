<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $cardNumber = $_POST['cardNumber'];
    $expirationDate = $_POST['expirationDate'];
    $cvv = $_POST['cvv'];

    // Lógica para procesar el pago con la tarjeta.
    // Aquí puedes conectar con un servicio de pago como Stripe, PayPal, etc.

    // Simulación de pago exitoso
    echo '<!DOCTYPE html>';
    echo '<html lang="es">';
    echo '<head>';
    echo '<meta charset="UTF-8">';
    echo '<meta name="viewport" content="width=device-width, initial-scale=1.0">';
    echo '<title>Pago Exitoso</title>';
    echo '<style>';
    echo 'body { font-family: Arial, sans-serif; background-color: #f4f7fc; color: #333; margin: 0; padding: 0; display: flex; justify-content: center; align-items: center; height: 100vh; }';
    echo '.container { background-color: #fff; padding: 40px; border-radius: 10px; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1); text-align: center; width: 400px; }';
    echo '.success-message { font-size: 24px; font-weight: bold; color: #28a745; margin-bottom: 20px; }';
    echo '.message { font-size: 16px; color: #666; margin-bottom: 30px; }';
    echo '.button { background-color: #007bff; color: white; border: none; padding: 10px 20px; font-size: 16px; border-radius: 5px; cursor: pointer; text-decoration: none; }';
    echo '.button:hover { background-color: #0056b3; }';
    echo '</style>';
    echo '</head>';
    echo '<body>';

    echo '<div class="container">';
    echo '<div class="success-message">¡Pago Exitoso!</div>';
    echo '<div class="message">Gracias por su compra. Su pago ha sido procesado correctamente.</div>';
    echo '<a href="inicio.php" class="button">Volver a la página principal</a>';
    echo '</div>';

    echo '</body>';
    echo '</html>';
}
?>
