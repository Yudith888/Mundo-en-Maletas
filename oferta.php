<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ofertas</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="ofertas.css">
</head>
<body>

<!-- Ventana Modal de Introducción -->
<div id="introModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeIntroModal()">&times;</span>
        <center>
        <h2>¡Viaja, explora, vive!</h2>
        <h4>¿Qué esperas para vivir la aventura de tus sueños? Reserva ahora y haz realidad tus próximas vacaciones con nosotros</h4>
        </center>
        <center><button class="read" onclick="closeIntroModal()">Ver Ofertas</button></center>
    </div>
</div>

<header class="men">
    <nav class="navigation">
        <ul>
            <div class="header-content">
                <div class="logo"><img src="image/ilustracion-concepto-volando-alrededor-mundo-avion.png" alt="" width="80px" height="80px"></div>
                <div class="nav__logo">Sueños en Ruta</div>
            </div>
            <li class="link"><a href="planesdeviaje.php">Planes de viaje</a></li>
            <li class="link"><a href="inicio.php">Vuelos</a></li>
            <li class="link"><a href="oferta.php">Ofertas</a></li>
            <li class="link"><a href="hoteleria.php">Hotelería</a></li>
            <li class="link"><a href="./crud_mongo/loginadmi.php">Administrador</a></li> 
            <a href="chatbot.php">
              <img src="image/138484452_b48c8274-61df-480f-9cd9-47d697ef03e9-Photoroom.png" width="60px" height="60px" alt=""/>
            </a>
            <div class="logo"><a href="compras.html"><img src="image/aterrizaje-unscreen.gif" alt="" width="50px" height="50px"></a></div>
        </ul>
    </nav>
</header>

<!-- Aquí van las tarjetas -->
<div class="birthdayCardContainer">
    <!-- Tarjeta 1 (Australia) -->
    <div class="birthdayCard">
        <div class="cardFront">
            <div class="front-text">
                <h3 class="toyou">Australia
                    
                </h3>
            </div>
        </div>
        <div class="cardInside">
            <div class="inside-text">
            <br><br><br><br><br>
            <br><br><br>
            </div>
            <div class="wishes">
                <img src="image/Gemini_Generated_Image_iqql41iqql41iqql.jpg" alt="" width="200px" height="200px">
                <center><button class="read" onclick="openModal('modalReservation', 'Australia')">Agregar</button></center>
            </div>
        </div>
    </div>

    <!-- Tarjeta 2 (New York) -->
    <div class="birthdayCard">
        <div class="cardFront">
            <div class="front-text">
                <h3 class="toyou">New York
                    
                </h3>
            </div>
        </div>
        <div class="cardInside">
            <div class="inside-text">
                <<br><br><br><br><br>
                <br><br><br>
            </div>
            <div class="wishes">
                <img src="image/Gemini_Generated_Image_gmqawpgmqawpgmqa.jpg" alt="" width="200px" height="200px">
                <center><button class="read" onclick="openModal('modalReservation1', 'New York')">Agregar</button></center>
            </div>
        </div>
    </div>

    <!-- Tarjeta 3 (Barranquilla) -->
    <div class="birthdayCard">
        <div class="cardFront">
            <div class="front-text">
                <h4 class="toyou">Barranquilla
                   
                </h4>
            </div>
        </div>
        <div class="cardInside">
            <div class="inside-text">
            <br><br><br><br><br>
            <br><br><br>
            </div>
            <div class="wishes">
                <img src="image/Gemini_Generated_Image_fi5ik3fi5ik3fi5i.jpg" alt="" width="200px" height="200px">
                <center><button class="read" onclick="openModal('modalReservation2', 'Barranquilla')">Agregar</button></center>
            </div>
        </div>
    </div>

    <!-- Tarjeta 4 (Busan) -->
    <div class="birthdayCard">
        <div class="cardFront">
            <div class="front-text">
                <h3 class="toyou">Busan
                    
                </h3>
            </div>
        </div>
        <div class="cardInside">
            <div class="inside-text">
            <br><br><br><br><br>
            <br><br><br>
            </div>
            <div class="wishes">
                <img src="image/Gemini_Generated_Image_i9p4a8i9p4a8i9p4.jpg" alt="" width="200px" height="200px">
                <center><button class="read" onclick="openModal('modalReservation3', 'Busan')">Agregar</button></center>
            </div>
        </div>
    </div>
</div>

<!-- Ventanas Modal para cada destino -->
<!-- Modal de Reserva para Australia -->
<div id="modalReservation" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal('modalReservation')">&times;</span>
        <h3>Reserva tu viaje a Australia</h3>
        <form id="reservationForm">
            <label for="name">Nombre Completo:</label>
            <input type="text" id="name" required>
            
            <label for="email">Correo Electrónico:</label>
            <input type="email" id="email" required>
            
            <label for="phone">Número de Teléfono:</label>
            <input type="tel" id="phone" required>

            <h4>Fecha de Viaje</h4>
            <input type="date" id="travelDate" required>

            <h4>Clase</h4>
<select id="classType">
    <option value="Económica-A1">Económica - A1 - $350,000</option>
    <option value="Económica-A2">Económica - A2 - $370,000</option>
    <option value="Ejecutiva-B1">Ejecutiva - B1 - $600,000</option>
    <option value="Ejecutiva-B2">Ejecutiva - B2 - $620,000</option>
    <option value="Primera Clase-C1">Primera Clase - C1 - $1,100,000</option>
    <option value="Primera Clase-C2">Primera Clase - C2 - $1,150,000</option>
</select>

            
            <center><button class="read" type="button" onclick="addToCart('Australia')">Agregar al carrito</button></center>
        </form>
    </div>
</div>

<!-- Modal de Reserva para New York -->
<div id="modalReservation1" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal('modalReservation1')">&times;</span>
        <h3>Reserva tu viaje a New York</h3>
        <form id="reservationForm">
            <label for="name">Nombre Completo:</label>
            <input type="text" id="name" required>
            
            <label for="email">Correo Electrónico:</label>
            <input type="email" id="email" required>
            
            <label for="phone">Número de Teléfono:</label>
            <input type="tel" id="phone" required>

            <h4>Fecha de Viaje</h4>
            <input type="date" id="travelDate" required>

            
            <h4>Clase</h4>
            <select id="classType">
    <option value="Económica-A1">Económica - A1 - $350,000</option>
    <option value="Económica-A2">Económica - A2 - $370,000</option>
    <option value="Ejecutiva-B1">Ejecutiva - B1 - $600,000</option>
    <option value="Ejecutiva-B2">Ejecutiva - B2 - $620,000</option>
    <option value="Primera Clase-C1">Primera Clase - C1 - $1,100,000</option>
    <option value="Primera Clase-C2">Primera Clase - C2 - $1,150,000</option>
</select>



            <center><button class="read" type="button" onclick="addToCart('New York')">Agregar al carrito</button></center>
        </form>
    </div>
</div>

<!-- Modal de Reserva para Barranquilla -->
<div id="modalReservation2" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal('modalReservation2')">&times;</span>
        <h3>Reserva tu viaje a Barranquilla</h3>
        <form id="reservationForm">
            <label for="name">Nombre Completo:</label>
            <input type="text" id="name" required>
            
            <label for="email">Correo Electrónico:</label>
            <input type="email" id="email" required>
            
            <label for="phone">Número de Teléfono:</label>
            <input type="tel" id="phone" required>

            <h4>Fecha de Viaje</h4>
            <input type="date" id="travelDate" required>
            <h4>Clase</h4>
            <select id="classType">
    <option value="Económica-A1">Económica - A1 - $350,000</option>
    <option value="Económica-A2">Económica - A2 - $370,000</option>
    <option value="Ejecutiva-B1">Ejecutiva - B1 - $600,000</option>
    <option value="Ejecutiva-B2">Ejecutiva - B2 - $620,000</option>
    <option value="Primera Clase-C1">Primera Clase - C1 - $1,100,000</option>
    <option value="Primera Clase-C2">Primera Clase - C2 - $1,150,000</option>
</select>


            <center><button class="read" type="button" onclick="addToCart('Barranquilla')">Agregar al carrito</button></center>
        </form>
    </div>
</div>

<!-- Modal de Reserva para Busan -->
<div id="modalReservation3" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal('modalReservation3')">&times;</span>
        <h3>Reserva tu viaje a Busan</h3>
        <form id="reservationForm">
            <label for="name">Nombre Completo:</label>
            <input type="text" id="name" required>
            
            <label for="email">Correo Electrónico:</label>
            <input type="email" id="email" required>
            
            <label for="phone">Número de Teléfono:</label>
            <input type="tel" id="phone" required>

            <h4>Fecha de Viaje</h4>
            <input type="date" id="travelDate" required>

            <h4>Clase</h4>
            <select id="classType">
    <option value="Económica-A1">Económica - A1 - $350,000</option>
    <option value="Económica-A2">Económica - A2 - $370,000</option>
    <option value="Ejecutiva-B1">Ejecutiva - B1 - $600,000</option>
    <option value="Ejecutiva-B2">Ejecutiva - B2 - $620,000</option>
    <option value="Primera Clase-C1">Primera Clase - C1 - $1,100,000</option>
    <option value="Primera Clase-C2">Primera Clase - C2 - $1,150,000</option>
</select>


            <center><button class="read" type="button" onclick="addToCart('Busan')">Agregar al carrito</button></center>
        </form>
    </div>
</div>



<!-- Script para manejar los modales -->
<script>
    // Abre el modal de la reserva
    function openModal(modalId) {
        document.getElementById(modalId).style.display = "block";
    }

    // Cierra el modal
    function closeModal(modalId) {
        document.getElementById(modalId).style.display = "none";
    }

    // Cierra el modal de introducción
    function closeIntroModal() {
        document.getElementById("introModal").style.display = "none";
    }

    // Función para agregar al carrito
    function addToCart(destination) {
        const name = document.getElementById('name').value;
        const email = document.getElementById('email').value;
        const phone = document.getElementById('phone').value;
        const travelDate = document.getElementById('travelDate').value;
        const classType = document.getElementById('classType').value;

        let classPrice = 0;

        // Asignar precios según la clase seleccionada
        switch (classType) {
            case 'Económica-A1':
                classPrice = 350000;
                break;
            case 'Económica-A2':
                classPrice = 370000;
                break;
            case 'Ejecutiva-B1':
                classPrice = 600000;
                break;
            case 'Ejecutiva-B2':
                classPrice = 620000;
                break;
            case 'Primera Clase-C1':
                classPrice = 1100000;
                break;
            case 'Primera Clase-C2':
                classPrice = 1150000;
                break;
            default:
                classPrice = 0;
                break;
        }

        const reservationData = {
            destination: destination,
            name: name,
            email: email,
            phone: phone,
            travelDate: travelDate,
            classType: classType,
            totalPrice: classPrice // Añadimos el precio total calculado
        };

        // Mostrar la alerta con el total a pagar
        alert('Tu reserva ha sido agregada al carrito para: ' + destination + '\nTotal a pagar: $' + classPrice.toLocaleString());

        // Almacenar en localStorage o en una variable global para gestionar el carrito
        let cart = JSON.parse(localStorage.getItem('cart')) || [];
        cart.push(reservationData);
        localStorage.setItem('cart', JSON.stringify(cart));

        closeModal('modalReservation');
    }

    // Establecer la fecha actual en los campos de fecha de los formularios
    window.onload = function() {
        // Mostrar el modal de introducción
        document.getElementById('introModal').style.display = "block";
        
        // Obtener la fecha actual en formato YYYY-MM-DD
        const today = new Date().toISOString().split('T')[0];
        
        // Establecer la fecha actual en los campos de fecha de viaje
        const travelDateInputs = document.querySelectorAll('input[type="date"]');
        travelDateInputs.forEach(input => {
            input.setAttribute('min', today); // Establecer la fecha mínima como la fecha actual
        });
    };
    function addToCart(destination) {
    const name = document.getElementById('name').value;
    const email = document.getElementById('email').value;
    const phone = document.getElementById('phone').value;
    const travelDate = document.getElementById('travelDate').value;
    const classType = document.getElementById('classType').value;

    // Verifica si todos los campos están llenos
    if (name === '' || email === '' || phone === '' || travelDate === '' || classType === '') {
        alert('Por favor, complete todos los campos antes de continuar.');
        return;  // Detiene la ejecución si hay campos vacíos
    }

    const reservationData = {
        destination: destination,
        name: name,
        email: email,
        phone: phone,
        travelDate: travelDate,
        classType: classType
    };

    // Almacenar en localStorage o en una variable global para gestionar el carrito
    let cart = JSON.parse(localStorage.getItem('cart')) || [];
    cart.push(reservationData);
    localStorage.setItem('cart', JSON.stringify(cart));

    // Notificar al usuario
    alert('Tu reserva ha sido agregada al carrito');

    // Redirigir al carrito
    window.location.href = "compras.php";  // Cambia la URL si tu página del carrito tiene otro nombre
    closeModal('modalReservation');
}

</script>
</body>
</html>
