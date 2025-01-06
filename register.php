<?php
include 'db_connect.php'; // Include your database connection script

if (!$conn) {
    die("Database connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Encrypt the password

    // Prepare the SQL statement
    $stmt = $conn->prepare("INSERT INTO usuarios (nombre, email, password) VALUES (?, ?, ?)");

    if (!$stmt) {
        die("Error in SQL statement preparation: " . $conn->error);
    }

    $stmt->bind_param("sss", $nombre, $email, $password);

    if ($stmt->execute()) {
        // Redirection to the flights selection page
        header("Location: selecciondevuelos.html");
        exit();
    } else {
        echo "Error en el registro: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
