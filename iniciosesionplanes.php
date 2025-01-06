

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="iniciodesesion.css"/>
    <title>Inicio de sesion y registro</title>
</head>
<body>

<div class="container">
    <div class="forms-container">
        <div class="signin-signup">
            <!-- Sign In Form -->
            <form action="#" method="post" class="sign-in-form">
                <div class="nav__logo"></div>
                <a href="inicio.php">
                    <img src="image/dos-flechas-ciclo-azul.png" width="50px" height="50px" alt="Regresar">
                </a>
                <h2 class="title">Iniciar sesion</h2>
                <div class="input-field">
                    <i class="fas fa-user"></i>
                    <input type="email" name="email" placeholder="Correo" required />
                </div>
                <div class="input-field">
                    <i class="fas fa-lock"></i>
                    <input type="password" name="password" placeholder="Contraseña" required />
                </div> 
                <button type="submit" class="read">INICIAR SESION</button>        
                <p class="social-text">Que gusto tenerte de vuelta</p>
            </form>

            <!-- Registration Form -->
            <form action="#" method="post" class="sign-up-form">
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
                    <input type="email" name="email" placeholder="Correo Electronico" required />
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

<!-- Modal para cantidad de pasajeros -->
<div id="passenger-modal" class="modal">
    <div class="modal-content">
        <h2>¿Cuántos pasajeros viajan?</h2>
        <input type="number" id="passenger-count" placeholder="Cantidad de pasajeros" min="1" required />
        <center>
        <button class="read" id="generate-forms">Generar formularios</button>
        </center>
    </div>
</div>

<!-- Contenedor para formularios de pasajeros -->
<div id="passenger-forms" class="form-container"></div>

<script src="iniciodesesion.js"></script>

<style>
/* Estilos */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}
.read {
  background: linear-gradient(90deg, #3730a3, #7e22ce); /* Gradiente de fondo */
  padding: 12px; /* Espaciado interno */
  color: #fff; /* Color del texto */
  text-decoration: none; /* Sin subrayado */
  border-radius: 8px; /* Bordes redondeados */
}


body {
    position: relative; /* Asegura que el modal se posicione relativo al body */
    
}

.container {
    position: relative;
    z-index: 1;
}

.modal {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-image: url(image/832979e81a3cc16cc42973188688f15a.gif);
    background-size: cover;
    justify-content: center;
    align-items: center;
    z-index: 9999;
}

.modal-content {
    background: white;
    padding: 20px;
    border-radius: 10px;
    text-align: center;
    width: 90%;
    max-width: 400px;
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3);
}

#passenger-forms {
    margin: 20px;
}

</style>

<script>
document.addEventListener("DOMContentLoaded", () => {
  const loginForm = document.querySelector(".sign-in-form");
  const registerForm = document.querySelector(".sign-up-form");
  const passengerModal = document.getElementById("passenger-modal");
  const passengerCountInput = document.getElementById("passenger-count");
  const generateFormsButton = document.getElementById("generate-forms");
  const passengerFormsContainer = document.getElementById("passenger-forms");

  // Mostrar modal al enviar formularios
  loginForm.addEventListener("submit", (e) => {
    e.preventDefault();
    showModal();
  });

  registerForm.addEventListener("submit", (e) => {
    e.preventDefault();
    showModal();
  });

  function showModal() {
    passengerModal.style.display = "flex";
  }

  generateFormsButton.addEventListener("click", () => {
    const passengerCount = parseInt(passengerCountInput.value, 10);
    if (!passengerCount || passengerCount < 1) {
      alert("Por favor, ingresa un número válido de pasajeros.");
      return;
    }

    // Redirigir a otra página con la cantidad de pasajeros como parámetro
    window.location.href = `formularios.php?count=${passengerCount}`;
  });

  window.addEventListener("click", (e) => {
    if (e.target === passengerModal) {
      passengerModal.style.display = "none";
    }
  });
});
</script>

</body>
</html>
