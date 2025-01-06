<?php
// Configuración de la base de datos
$host = 'localhost'; // Cambia esto si tu base de datos está en otro servidor
$dbname = 'suenosenrutas';
$username = 'root'; // Cambia esto si usas un usuario diferente
$password = ''; // Cambia esto si tienes una contraseña

// Conectar a la base de datos
$conn = new mysqli($host, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Verificar si el formulario de registro ha sido enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['nombre'], $_POST['email'], $_POST['password'])) {
    // Obtener los datos del formulario
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT); // Cifrar la contraseña

    // Preparar y ejecutar la consulta de inserción
    $sql = "INSERT INTO usuarios (nombre, email, password) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('sss', $nombre, $email, $password); // 'sss' indica que los 3 parámetros son cadenas

    if ($stmt->execute()) {
        echo "Usuario registrado con éxito";
    } else {
        echo "Error al registrar el usuario: " . $stmt->error;
    }

    $stmt->close();
}

// Cerrar la conexión
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="iniciodesesion.css"/>
    <title>Inicio de sesión y registro</title>
</head>
<body>
    <div class="container">
        <div class="forms-container">
            <div class="signin-signup">
                <!-- Formulario de inicio de sesión -->
                <form action="" method="post" class="sign-in-form">
                    <div class="nav__logo"></div>
                    <a href="inicio.php">
                        <img src="image/dos-flechas-ciclo-azul.png" width="50px" height="50px" alt="Regresar">
                    </a>
                    <h2 class="title">Iniciar sesión</h2>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="email" name="email" placeholder="Correo" required />
                    </div>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" name="password" placeholder="Contraseña" required />
                    </div> 
                    <button type="button" class="read" onclick="window.location.href='formularioPasajeros.php'">INICIAR SESIÓN</button>        
                    <p class="social-text">¡Qué gusto tenerte de vuelta!</p>
                </form>

                <!-- Formulario de registro -->
                <form action="" method="post" class="sign-up-form">
                    <div class="nav__logo"></div>
                    <a href="inicio.php">
                        <img src="image/dos-flechas-ciclo-azul.png" width="50px" height="50px" alt="Regresar">
                    </a>
                    <h2 class="title">Registrate</h2>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" name="nombre" placeholder="Nombre" required />
                    </div>
                    <div class="input-field">
                        <i class="fas fa-envelope"></i>
                        <input type="email" name="email" placeholder="Correo Electrónico" required />
                    </div>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" name="password" placeholder="Contraseña" required />
                    </div>
                    <button type="submit" class="read">REGISTRARME</button>
                    <p class="social-text">Te damos la bienvenida a Sueños en Ruta</p>
                </form>
            </div>
        </div>

        <div class="panels-container">
            <div class="panel left-panel">
                <div class="content">
                    <h3>¿Nuevo aquí?</h3>
                    <p>¡Aventuras inolvidables en cada destino!</p>
                    <button class="btn transparent" id="sign-up-btn">Registrarme</button>
                    <img src="image/avion-pasajeros-aislado.png" class="image" alt="" />
                </div>
            </div>
            <div class="panel right-panel">
                <div class="content">
                    <h3>¿Listo para explorar el mundo?</h3>
                    <p>¡Tu próxima gran aventura te está esperando!</p>
                    <button class="btn transparent" id="sign-in-btn">Inicia sesión</button>
                </div>
                <img src="image/vista-avion-3d-paisaje-destino-viaje.png" class="image" alt="" />
            </div>
        </div>
    </div>

    <script src="iniciodesesion.js"></script>
</body>
</html>
