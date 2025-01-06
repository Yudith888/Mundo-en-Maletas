<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Villavicencio</title>
    <link rel="stylesheet" href="style1.css">
    <link rel="stylesheet" href="styles.css">

    <!-- Hotjar Tracking Code for my site -->
    <script>
        (function (h, o, t, j, a, r) {
            h.hj = h.hj || function () { (h.hj.q = h.hj.q || []).push(arguments) };
            h._hjSettings = { hjid: 3732391, hjsv: 6 };
            a = o.getElementsByTagName('head')[0];
            r = o.createElement('script'); r.async = 1;
            r.src = t + h._hjSettings.hjid + j + h._hjSettings.hjsv;
            a.appendChild(r);
        })(window, document, 'https://static.hotjar.com/c/hotjar-', '.js?sv=');
    </script>
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


    <div class="container__slider">

        <div class="container">
            <input type="radio" name="slider" id="item-1" checked>
            <input type="radio" name="slider" id="item-2">
            <input type="radio" name="slider" id="item-3">

            <div class="cards">
                <label class="card" for="item-1" id="selector-1">
                    <img class="slider_image" src="image/villavicencio1.jpg">

                </label>
                <label class="card" for="item-2" id="selector-2">
                    <img class="slider_image" src="image/villavicencio2.jpg">
                </label>
                <label class="card" for="item-3" id="selector-3">
                    <img class="slider_image" src="image/villavicencio3.jpg">
                </label>

            </div>

            <div class="cards">
                <label class="card" for="item-1" id="selector-1">
                    <br>
                    <br>
                    <br>
                    <br>
                    <center>
                        <h4>Costos por persona</h4>
                        <p>Incluye: <br>
                            *Transporte <br>
                            *Hospedaje <br>
                            *Alimentacion <br>
                            *Actividades <br>
                            Tiempo: <br>
                            *4 dias - 3 Noches <br>
                            Valor: <br>
                            * $2.000.000

                        </p>

                    </center>
                </label>
                <label class="card" for="item-2" id="selector-2">
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <center>
                        <h4>Hospedaje/Alimentacion</h4>
                        <p>El plan viajero incluye desayuno, almuerzo, cena, barra
                            libre y Buffet ilimitado.
                            Habitaciones segun grupo familiar
                        </p>
                    </center>
                </label>

                <label class="card" for="item-3" id="selector-3">
                    <br>
                    <br>

                    <center>
                        <h4>Ruta Viajera</h4>
                        <p> Dia 1: <br>
                            Recogida en el Aeropuerto Vanguardia
                            Llevada al hotel y descargue <br>
                            Dia 2: <br>
                            Visita al Parque Los Fundadores, visita al parque las malocas <br>
                            Dia 3: <br>
                            Recorrido por Caño Cristales<br>
                            Dia 4: <br>
                            Translado al aeropuerto, vuelo de regreso

                        </p>
                        <center>
                        <a href="iniciosesionplanes.php"><input type="button" class="read" value="Adquirir plan"></a>
                        </center>
                    </center>

                </label>

            </div>
        </div>

    </div>
</body>

</html>