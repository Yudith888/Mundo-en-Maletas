<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="hoteleria.css">
    <link rel="stylesheet" href="styles.css">
    <title>Hoteleria</title>
    <style>
        .read {
    background: linear-gradient(90deg, #3730a3, #7e22ce); /* Gradiente de fondo */
    padding: 12px; /* Espaciado interno */
    color: #fff; /* Color del texto */
    text-decoration: none; /* Sin subrayado */
    border-radius: 8px; /* Bordes redondeados */
  }/* Estilo para el modal */
  .modal {
        display: none; /* Oculto por defecto */
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.6); /* Fondo oscuro con opacidad */
        justify-content: center;
        align-items: center;
        z-index: 1000;
    }

    .modal-content {
        background-color: #fff;
        padding: 20px;
        border-radius: 10px;
        width: 400px;
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2); /* Sombra suave */
        text-align: center;
    }

    .modal-content h2 {
        font-size: 24px;
        color: #3730a3;
        margin-bottom: 20px;
    }

    .close {
        position: absolute;
        top: 15px;
        right: 20px;
        font-size: 28px;
        cursor: pointer;
        color: #7e22ce;
    }

    /* Estilo para el formulario */
    #formReserva {
        display: flex;
        flex-direction: column;
        gap: 15px;
    }

    #formReserva label {
        font-size: 16px;
        color: #333;
        text-align: left;
    }

    #formReserva input {
        padding: 10px;
        border-radius: 5px;
        border: 1px solid #ccc;
        font-size: 14px;
        margin-top: 5px;
    }

    #formReserva input:focus {
        border-color: #7e22ce;
        outline: none;
    }

    #formReserva button {
        background: linear-gradient(90deg, #3730a3, #7e22ce); /* Gradiente de fondo */
        padding: 12px;
        color: #fff;
        text-decoration: none;
        border-radius: 8px;
        border: none;
        cursor: pointer;
        font-size: 16px;
    }

    #formReserva button:hover {
        background: linear-gradient(90deg, #7e22ce, #3730a3); /* Cambio en el gradiente al pasar el cursor */
    }
    </style>
</head>
<body>
    
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
            <li class="link"><a href="crud_mongo/loginadmi.php">Administrador</a></li>
            <a href="chatbot.php">
              <img src="image/138484452_b48c8274-61df-480f-9cd9-47d697ef03e9-Photoroom.png" width="60px" height="60px" alt=""/>
            </a>
            <div class="logo"><a href="compras.html"><img src="image/aterrizaje-unscreen.gif" alt="" width="50px" height="50px"></a></div>
        </ul>
    </nav>
</header>

<div class="container">
    <span class="slider" id="slider1"></span>
    <span class="slider" id="slider2"></span>
    <span class="slider" id="slider3"></span>
    <span class="slider" id="slider4"></span>
    <span class="slider" id="slider5"></span>
    <span class="slider" id="slider6"></span>
    <span class="slider" id="slider7"></span>

    <div class="imagencarruselContainer">

        <!-- Slider 1 -->
        <div class="slide_div" id="slide_1">
            <p>
            <img class="imagencarrusel" src="image/Gemini_Generated_Image_704bzd704bzd704b.jpg" alt="" class="img" id="img1">
            Hotel Bondad en Barranquilla
                $40.000 por persona
                <button class="read">Reservar</button>
            </p>
            <a href="#slider1" class="button" id="button1"></a>
        </div>

        <!-- Slider 2 -->
        <div class="slide_div" id="slide_2">
            <p>
            <img class="imagencarrusel" src="image/Gemini_Generated_Image_1g9c241g9c241g9c.jpg" alt="" class="img" id="img2">    
            Hotel Celeste de Cali
                $30.000 por persona
                <button class="read">Reservar</button>
            </p>
            <a href="#slider2" class="button" id="button2"></a>
        </div>

        <!-- Slider 3 -->
        <div class="slide_div" id="slide_3">
            <p>
            <img class="imagencarrusel" src="image/Gemini_Generated_Image_fw32t0fw32t0fw32.jpg" alt="" class="img" id="img3">    
            Hotel El estadio Buenos Aires
                $100.000 por persona
                <button class="read">Reservar</button>
            </p>
            <a href="#slider3" class="button" id="button3"></a>
        </div>

        <!-- Slider 4 -->
        <div class="slide_div" id="slide_4">
            <p>
            <img class="imagencarrusel" src="image/Gemini_Generated_Image_uwafy0uwafy0uwaf.jpg" alt="" class="img" id="img4">    
            Hotel Buena Vista de la Ciudad de Mexico
                $200.000 por persona
                <button class="read">Reservar</button>
            </p>
            <a href="#slider4" class="button" id="button4"></a>
        </div>

        <!-- Slider 5 -->
        <div class="slide_div" id="slide_5">
            <p>
            <img class="imagencarrusel" src="image/Gemini_Generated_Image_2f458g2f458g2f45.jpg" alt="" class="img" id="img5">
                Hotel Jungla en Leticia 
                $80.000 por persona
                <button class="read">Reservar</button>
            </p>
            <a href="#slider5" class="button" id="button5"></a>
        </div>

        <!-- Slider 6 -->
        <div class="slide_div" id="slide_6">
            <p>
            <img class="imagencarrusel" src="image/Gemini_Generated_Image_4t526v4t526v4t52.jpg" alt="" class="img" id="img6">
                Hotel Atena de Medellin 
                $50.000 por persona
                <button class="read">Reservar</button>
            </p>
            <a href="#slider6" class="button" id="button6"></a>
        </div>

        <!-- Slider 7 -->
        <div class="slide_div" id="slide_7">
            <p>
            <img class="imagencarrusel" src="image/Gemini_Generated_Image_p1w57gp1w57gp1w5.jpg" alt="" class="img" id="img7">
            Hotel Reverence en Tokio
                $500.000 por persona
                <button class="read">Reservar</button>
            </p>
            <a href="#slider7" class="button" id="button7"></a>
        </div>

    </div>
    
</div>

<!-- Modal de Reserva -->
<div id="modalReserva" class="modal">
    <div class="modal-content">
        <span class="close" id="cerrarModal">&times;</span>
        <h2>Formulario de Reserva</h2>
        <form id="formPersonas">
    <label for="numPersonas">Número de Personas:</label>
    <input type="number" id="numPersonas" name="numPersonas" min="1" required>
    <button type="submit" class="read">Continuar</button>
</form>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", () => {
        const botonesReservar = document.querySelectorAll(".read");
        const modal = document.getElementById("modalReserva");
        const cerrarModal = document.getElementById("cerrarModal");
        const hotelInput = document.getElementById("hotel");
        
        // Mostrar modal al hacer clic en "Reservar"
        botonesReservar.forEach(boton => {
            boton.addEventListener("click", (e) => {
                const hotelInfo = e.target.closest(".slide_div").querySelector("p").childNodes[0].textContent.trim();
                modal.style.display = "flex";
                hotelInput.value = hotelInfo; // Pone el nombre del hotel en el formulario
            });
        });
        
        // Cerrar modal
        cerrarModal.addEventListener("click", () => {
            modal.style.display = "none";
        });
        
        // Cerrar modal si se hace clic fuera del modal
        window.addEventListener("click", (e) => {
            if (e.target === modal) {
                modal.style.display = "none";
            }
        });

        // Validación del formulario
        const formReserva = document.getElementById("formReserva");
        formReserva.addEventListener("submit", (e) => {
            e.preventDefault();
            alert("Reserva Confirmada");
            modal.style.display = "none";
        });
    });

    document.getElementById("formPersonas").addEventListener("submit", (e) => {
        e.preventDefault();
        const numPersonas = document.getElementById("numPersonas").value;
        localStorage.setItem("numPersonas", numPersonas); // Guardar en localStorage
        window.location.href = "reserva.php"; // Redirigir a la página de reservas
    });
    document.addEventListener("DOMContentLoaded", () => {
    const botonesReservar = document.querySelectorAll(".read");
    const modal = document.getElementById("modalReserva");
    const cerrarModal = document.getElementById("cerrarModal");

    let precioPorPersona = 0; // Variable para almacenar el precio del hotel seleccionado

    // Mostrar modal al hacer clic en "Reservar"
    botonesReservar.forEach((boton) => {
        boton.addEventListener("click", (e) => {
            const hotelInfo = e.target.closest(".slide_div").querySelector("p").textContent.trim();
            const precioMatch = hotelInfo.match(/\$([\d,.]+)/); // Extraer el precio
            if (precioMatch) {
                precioPorPersona = parseInt(precioMatch[1].replace(/[,.]/g, "")); // Convertir precio a número
            }

            modal.style.display = "flex";
        });
    });

    // Cerrar modal
    cerrarModal.addEventListener("click", () => {
        modal.style.display = "none";
    });

    // Cerrar modal si se hace clic fuera del modal
    window.addEventListener("click", (e) => {
        if (e.target === modal) {
            modal.style.display = "none";
        }
    });

    // Guardar número de personas y precio en localStorage
    document.getElementById("formPersonas").addEventListener("submit", (e) => {
        e.preventDefault();
        const numPersonas = document.getElementById("numPersonas").value;
        localStorage.setItem("numPersonas", numPersonas); // Guardar en localStorage
        localStorage.setItem("precioPorPersona", precioPorPersona); // Guardar el precio
        window.location.href = "reserva.php"; // Redirigir a la página de reservas
    });
});

</script>

</body>
</html>
