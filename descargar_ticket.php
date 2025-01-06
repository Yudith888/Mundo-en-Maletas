<?php
session_start();
include 'conexion.php';  // Conexión a la base de datos

// Verificar si el usuario está autenticado
if (isset($_SESSION['usuario_id']) && isset($_GET['payment_id'])) {
    $payment_id = $_GET['payment_id'];
    $pdf_file = 'ticket_pago_' . $payment_id . '.pdf';

    // Verificar si el archivo PDF existe
    if (file_exists($pdf_file)) {
        // Forzar la descarga del archivo PDF
        header('Content-Type: application/pdf');
        header('Content-Disposition: attachment; filename="' . $pdf_file . '"');
        readfile($pdf_file);
        exit;
    } else {
        echo "El archivo no existe.";
    }
} else {
    echo "Acceso no autorizado.";
}
?>

