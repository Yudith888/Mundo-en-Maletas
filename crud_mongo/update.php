<?php
require 'db.php';

$id = $_GET['id'];
$stmt = $pdo->prepare("SELECT * FROM usuarios WHERE id = ?");
$stmt->execute([$id]);
$usuario = $stmt->fetch();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['Nombre']; 
    $email = $_POST['Email'];

    $stmt = $pdo->prepare("UPDATE usuarios SET nombre = ?, email = ? WHERE id = ?");
    $stmt->execute([$nombre, $email, $id]);

    header("Location: minicrud.php");
    exit; // Asegúrate de detener la ejecución después del redireccionamiento
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuario</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f7f6;
        }
        .container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            color: #333;
        }
        label {
            font-size: 1.1em;
            margin-bottom: 8px;
            display: block;
            color: #555;
        }
        input[type="text"], input[type="email"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 1em;
        }
        input[type="submit"], button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            font-size: 1.2em;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
        }
        input[type="submit"]:hover, button:hover {
            background-color: #45a049;
        }
        .back-link {
            display: block;
            text-align: center;
            margin-top: 15px;
            font-size: 1.1em;
        }
        .back-link a {
            color: #007BFF;
            text-decoration: none;
        }
        .back-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Editar Usuario</h1>
        <form action="" method="post">
            <label for="Nombre">Nombre:</label>
            <input type="text" name="Nombre" id="Nombre" value="<?= htmlspecialchars($usuario['Nombre']) ?>" required>

            <label for="Email">Email:</label>
            <input type="email" name="Email" id="Email" value="<?= htmlspecialchars($usuario['Email']) ?>" required>

            <button type="submit">Actualizar</button>
        </form>
        <div class="back-link">
            <a href="minicrud.php">Volver al listado</a>
        </div>
    </div>

</body>
</html>
