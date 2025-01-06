<?php
session_start(); // Inicia la sesión para poder usar $_SESSION

// Lógica para procesar las preguntas y las opciones seleccionadas
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Procesar pregunta del usuario
    if (isset($_POST['pregunta'])) {
        $pregunta = $_POST['pregunta'];
        $respuestaBot = obtenerRespuestaPregunta($pregunta);

        // Guardar la pregunta y la respuesta en el historial
        $_SESSION['chat_history'][] = ['user' => $pregunta, 'bot' => $respuestaBot];
    }

    // Procesar las opciones seleccionadas
    if (isset($_POST['opcion'])) {
        $opcion = $_POST['opcion'];
        $respuestaBot = obtenerRespuestaOpcion($opcion);
        $_SESSION['chat_history'][] = ['user' => $opcion, 'bot' => $respuestaBot];
    }
}

// Función para obtener respuestas basadas en la pregunta
function obtenerRespuestaPregunta($pregunta) {
    // Respuestas predefinidas para preguntas comunes
    $respuestas = [
        'precios' => 'Nuestros precios varían dependiendo del destino y la temporada. Por favor, consulta nuestras ofertas en la sección de "Ofertas".',
        'destinos' => 'Ofrecemos viajes a muchos destinos populares como París, Tokio, Nueva York, Londres, Australia y más. ¿Tienes algún destino en mente?',
        'disponibilidad' => 'La disponibilidad depende de la fecha de tu viaje. Te invitamos a consultar las fechas disponibles en nuestra página de "Planes de Viaje".',
        'horarios' => 'Los horarios de nuestros vuelos son variados y dependen del destino. Visita la sección de "Vuelos" para más detalles.',
        'hoteles' => 'Contamos con una amplia selección de hoteles en destinos populares como Bali, París, Nueva York, y más. ¿Te gustaría saber más sobre nuestras opciones de alojamiento?',
        'actividades' => 'Además de los viajes, ofrecemos una variedad de actividades, como excursiones, tours guiados y visitas a parques temáticos. ¿Te interesa alguna de estas opciones?',
        'paquetes' => 'Tenemos paquetes turísticos que combinan vuelos, alojamiento y actividades. Consulta nuestras ofertas para obtener el paquete ideal para ti.',
        'temporada alta' => 'La temporada alta depende del destino, pero generalmente ocurre en vacaciones y festividades. Te recomendamos planificar con anticipación para obtener mejores precios.',
        'recomendaciones' => 'Te recomendamos visitar nuestra sección de "Destinos Recomendados" para obtener sugerencias basadas en tus intereses y preferencias.',
    ];

    // Si la pregunta tiene una respuesta predefinida, devolverla
    foreach ($respuestas as $clave => $respuesta) {
        if (stripos($pregunta, $clave) !== false) {
            return $respuesta;
        }
    }

    // Si no hay respuesta, devolver un mensaje genérico
    return 'Lo siento, no entendí tu pregunta. ¿Podrías reformularla?';
}

// Función para obtener respuestas basadas en las opciones seleccionadas
function obtenerRespuestaOpcion($opcion) {
    // Respuestas predefinidas para opciones del menú
    $respuestas = [
        'precios' => 'Nuestros precios varían dependiendo del destino y la temporada. Consulta la sección de "Ofertas" para obtener más detalles.',
        'destinos' => 'Tenemos destinos como París, Tokio, Nueva York, Londres, y muchos más. ¿Te gustaría saber más sobre alguno?',
        'disponibilidad' => 'Para conocer la disponibilidad, por favor visita la sección de "Planes de Viaje" y elige tu destino.',
        'horarios' => 'Los horarios de nuestros vuelos dependen del destino y la fecha. Consulta la sección de "Vuelos" para más detalles.',
        'hoteles' => 'Contamos con una gran variedad de hoteles. ¿Quieres saber más sobre los que tenemos en lugares como Bali, París, o Nueva York?',
        'actividades' => 'Si buscas actividades, ofrecemos desde tours guiados hasta aventuras extremas. ¿Qué tipo de actividad te gustaría hacer?',
        'paquetes' => 'Tenemos paquetes todo incluido que te permiten disfrutar de los mejores destinos. ¿Te gustaría ver algunos ejemplos?',
    ];

    // Devolver la respuesta correspondiente
    return isset($respuestas[$opcion]) ? $respuestas[$opcion] : 'Lo siento, no entendí esa opción.';
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chatbot de Viajes</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(135deg, #007BFF, #00C851);
            color: #333;
        }
        .navigation {
            background-color: #222;
            padding: 10px 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .navigation ul {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
            align-items: center;
        }
        .navigation li {
            margin-right: 20px;
        }
        .navigation a {
            text-decoration: none;
            color: #fff;
            font-size: 16px;
            transition: color 0.3s;
        }
        .navigation a:hover {
            color: #00C851;
        }
        .chatbox {
            width: 90%;
            max-width: 600px;
            margin: 30px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }
        h1 {
            text-align: center;
            color: #007BFF;
        }
        .messages {
            padding: 10px;
            background-color: #f8f8f8;
            border-radius: 5px;
            margin-bottom: 20px;
            max-height: 300px;
            overflow-y: auto;
        }
        .messages p {
            margin: 5px 0;
        }
        .user-message {
            color: #007bff;
            font-weight: bold;
        }
        .bot-message {
            color: #28a745;
        }
        .form-group {
            text-align: center;
        }
        input[type="text"] {
            width: 80%;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            margin-right: 10px;
        }
        button {
            padding: 10px 20px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: #218838;
        }
        .button-group {
            text-align: center;
            margin: 20px 0;
        }
        .button-group button {
            margin: 10px 5px;
            padding: 10px 15px;
            background-color: #007BFF;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
        }
        .button-group button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

<header class="navigation">
    <div class="header-content">
        <img src="image/ilustracion-concepto-volando-alrededor-mundo-avion.png" alt="" width="50px" height="50px">
    </div>
    <ul>
        <li><a href="planesdeviaje.php">Planes de Viaje</a></li>
        <li><a href="inicio.php">Vuelos</a></li>
        <li><a href="oferta.php">Ofertas</a></li>
        <li><a href="hoteleria.php">Hotelería</a></li>
        <li class="link"><a href="loginadmi.php">Administrador</a></li> 
    </ul>
</header>

<div class="chatbox">
    <h1>Chatbot de Viajes</h1>

    <!-- Mensajes -->
    <div class="messages">
        <?php
        if (isset($_SESSION['chat_history']) && count($_SESSION['chat_history']) > 0) {
            foreach ($_SESSION['chat_history'] as $mensaje) {
                echo '<p class="user-message">Tú: ' . htmlspecialchars($mensaje['user']) . '</p>';
                echo '<p class="bot-message">Chatbot: ' . htmlspecialchars($mensaje['bot']) . '</p>';
            }
        }
        ?>
    </div>

    <!-- Menú de opciones -->
    <div class="button-group">
        <form action="" method="POST">
            <button type="submit" name="opcion" value="precios">¿Cuáles son los precios?</button>
            <button type="submit" name="opcion" value="destinos">¿A qué destinos viajan?</button>
            <button type="submit" name="opcion" value="disponibilidad">¿Cuándo hay disponibilidad?</button>
            <button type="submit" name="opcion" value="horarios">¿Cuáles son los horarios?</button>
            <button type="submit" name="opcion" value="hoteles">¿Dónde puedo alojarme?</button>
            <button type="submit" name="opcion" value="actividades">¿Qué actividades ofrecen?</button>
            <button type="submit" name="opcion" value="paquetes">¿Tienen paquetes turísticos?</button>
        </form>
    </div>

    <!-- Formulario de preguntas -->
    <div class="form-group">
        <form action="" method="POST">
            <input type="text" name="pregunta" placeholder="Haz una pregunta..." required>
            <button type="submit">Preguntar</button>
        </form>
    </div>
</div>

</body>
</html>
