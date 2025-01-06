<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selección de Vuelos</title>
    <link rel="stylesheet" href="selecciondevuelos.css">
</head>
<body>
    
<header class="men"> <!-- Cabecera de la página -->
        <nav class="navigation"> <!-- Navegación principal -->
            <ul> <!-- Lista no ordenada para los elementos del menú -->
                <div class="header-content"> <!-- Contenido del encabezado -->
                    <div class="logo"><img src="image/ilustracion-concepto-volando-alrededor-mundo-avion.png" alt="" width="80px" height="80px"> <!-- Logo de la empresa -->
                    </div>
                    <div class="nav__logo">Sueños en Ruta </div>
                </div>
                <li class="link"><a href="planesdeviaje.php">Planes de viaje</a></li>
                <li class="link"><a href="inicio.php">Vuelos</a></li>
                <li class="link"><a href="oferta.php">Ofertas</a></li>
                <li class="link"><a href="hoteleria.php">Hotelería</a></li>
                <li class="link"><a href="loginadmi.php">Administrador</a></li>  
                <a href="chatbot.php">
                  <img src="image/138484452_b48c8274-61df-480f-9cd9-47d697ef03e9-Photoroom.png" width="60px" height="60px" alt="">
                </a>
                <div class="logo"><a href="compras.html"><img src="image/aterrizaje-unscreen.gif" alt="" width="50px" height="50px"></a></div> <!-- Icono de carrito de compras -->
               
              </ul>
        </nav>
    </header>

<div class="container"> <!-- Contenedor principal para las tarjetas de vuelos -->
    <!-- Tarjetas de vuelos alternadas -->
    <div class="card right"> <!-- Tarjeta alineada a la derecha -->
        <h3>12:30 - 14:00</h3> <!-- Horario del vuelo -->
        <h4 class="precio">$400.000</h4>
        <p>Vuelo directo, clase económica, <br> sin escalas</p> <!-- Descripción del vuelo -->
        <a href="vueloderegreso.php" class="read">Seleccionar</a>
    </div>

    <div class="card left"> <!-- Tarjeta alineada a la izquierda -->
        <h3>11:00 - 13:30</h3> <!-- Horario del vuelo -->
        <h4 >$100.000</h4>
        <p>Vuelo con una escala, clase ejecutiva, <br> desayuno incluido</p> <!-- Descripción del vuelo -->
        <a href="vueloderegreso.php" class="read">Seleccionar</a>
    </div>

    <div class="card right"> <!-- Otra tarjeta alineada a la derecha -->
        <h3>18:00 - 20:30</h3> <!-- Horario del vuelo -->
        <h4 >$80.000</h4>
        <p>Vuelo sin escalas, clase económica, <br> entretenimiento a bordo</p> <!-- Descripción del vuelo -->
        <a href="vueloderegreso.php" class="read">Seleccionar</a>
    </div>

    <div class="card left"> <!-- Otra tarjeta alineada a la izquierda -->
        <h3>23:00 - 02:00</h3> <!-- Horario del vuelo -->
        <h4 >$500.000</h4>
        <p>Vuelo nocturno, clase premium, <br> cena y servicio de bebidas</p> <!-- Descripción del vuelo -->
        <a href="vueloderegreso.php" class="read">Seleccionar</a>
    </div>

    <div class="card right"> <!-- Otra tarjeta alineada a la derecha -->
        <h3>07:30 - 10:00</h3> <!-- Horario del vuelo -->
        <h4 >$150.000</h4>
        <p>Vuelo de madrugada, clase económica, <br> descanso a bordo</p> <!-- Descripción del vuelo -->
        <a href="vueloderegreso.php" class="read">Seleccionar</a>
    </div>

    <div class="card left"> <!-- Última tarjeta alineada a la izquierda -->
        <h3>13:30 - 15:00</h3> <!-- Horario del vuelo -->
        <h4 >$450.000</h4>
        <p>Vuelo con dos escalas, clase ejecutiva, <br> almuerzo incluido</p> <!-- Descripción del vuelo -->
        <a href="vueloderegreso.php" class="read">Seleccionar</a>
    </div>
</div>



    <!-- Más tarjetas aquí... -->

    <!-- Modal para seleccionar número de pasajeros -->
    <div id="passengerModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closePassengerModal()">&times;</span>
            <h2>Ingrese el número de pasajeros</h2>
            <form action="formularioreserva.html" method="get" onsubmit="return redirectToForm()">
                <label for="numPassengers">Número de pasajeros:</label>
                <input type="number" id="numPassengers" name="numPassengers" min="1" max="10" required>
                <button type="submit">Continuar</button>
            </form>
        </div>
    </div>
</div>

<script>
    // Función para abrir el modal
    function openPassengerModal() {
        document.getElementById("passengerModal").style.display = "block";
    }

    // Función para cerrar el modal
    function closePassengerModal() {
        document.getElementById("passengerModal").style.display = "none";
    }

    // Función para redirigir al formulario de reserva
    function redirectToForm() {
        const numPassengers = document.getElementById("numPassengers").value;
        window.location.href = `formularioreserva.html?numPassengers=${numPassengers}`;
        return false;
    }
</script>

<style>
    /* Estilos para el modal */
    .modal { display: none; position: fixed; z-index: 1; left: 0; top: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.5); }
    .modal-content { background-color: #fff; margin: 15% auto; padding: 20px; width: 80%; max-width: 500px; border-radius: 8px; }
    .close { color: #aaa; float: right; font-size: 28px; font-weight: bold; cursor: pointer; }
</style>

</body>
</html>
