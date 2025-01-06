<?php
require 'db.php';

$stmt = $pdo->query("SELECT * FROM usuarios");
$usuarios = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Usuarios</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f4;
        }
        h1 {
            color: #333;
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            background-color: white;
        }
        th, td {
            padding: 10px;
            text-align: left;
            border: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
        td a {
            margin: 0 10px;
            text-decoration: none;
            color: #007BFF;
        }
        td a:hover {
            color: #0056b3;
        }
        .container {
            max-width: 1000px;
            margin: 0 auto;
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        .create-btn {
            display: inline-block;
            margin: 20px 0;
            padding: 10px 20px;
            background-color: #28a745;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
        .create-btn:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Listado de Usuarios</h1>
        <a href="create.php" class="create-btn">Crear Usuario</a>
        <table>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Acciones</th>
            </tr>
            <?php foreach ($usuarios as $usuario): ?>
            <tr>
                <td><?= htmlspecialchars($usuario['id']) ?></td>
                <td><?= isset($usuario['Nombre']) ? htmlspecialchars($usuario['Nombre']) : 'Sin nombre' ?></td>
                <td><?= htmlspecialchars($usuario['Email']) ?></td>
                <td>
                    <a href="update.php?id=<?= htmlspecialchars($usuario['id']) ?>">Editar</a>
                    <a href="delete.php?id=<?= htmlspecialchars($usuario['id']) ?>" onclick="return confirm('¿Estás seguro de que quieres eliminar este usuario?')">Eliminar</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>

</body>
</html>
