<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sueños en ruta</title>

  <link href="https://cdn.jsdelivr.net/npm/remixicon@3.4.0/fonts/remixicon.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
  <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>

  <link rel="stylesheet" href="inicio.css"/>
 
 </head>
<body>

<header class="menu"> <!-- Cabecera de la página -->
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
  

  <header class="section__container header__container">
    <h1 class="section__header">¿Quieres viajar? <br> </h1>
  </header>

  <section class="section__container booking__container">
    <div class="row form-group">
      <div class="input__content">
        <div class="input__group">
          <div class="space">
            <center>
              <a style="margin-right: 80px;" href="inicio.php">Ida y Vuelta</a>
              <a style="margin-left: 80px;" href="vuelosoloida.php">Solo Ida</a>
            </center>
          </div>
        </div>
      </div>
    </div>

    <form>
      <div class="row form-group">
        <span class="input-group-text bg-transparent">
          <span><i class="ri-map-pin-line"></i></span>
          <div class="input__content">
            <div class="input__group">
              <select>
                <option disabled selected="" class="punto" required>Origen</option>
                <option>Armenia</option>
                <option>Barranquilla</option>
                <option>Bogotá</option>
                <option>Buenaventura</option>
                <option>Buenos Aires</option>
                <option>Cali</option>
                <option>Cartagena</option>
                <option>Chicago</option>
                <option>Ciudad de Mexico</option>
                <option>Hong Kong</option>
                <option>Leticia</option>
                <option>Medellin</option>
                <option>Miami</option>
                <option>Neiva</option>
                <option>Quito</option>
                <option>Rio de Janeiro</option>
                <option>Sao Pablo</option>
                <option>Seul</option>
                <option>Tokio</option>
                <option>Toronto</option>
                <option>Valledupar</option>
                <option>Vancouver</option>
                <option>Villavicencio</option>

              </select>
            </div>
          </div>
        </span>
      </div>

      <div class="row form-group">
        <span class="input-group-text bg-transparent">
          <span><i class="ri-user-3-line"></i></span>
          <div class="input__content">
            <div class="input__group">
              <select class="opciones" >
                <option disabled selected="" class="punto">Destino</option>
                <option>Armenia</option>
                <option>Barranquilla</option>
                <option>Bogotá</option>
                <option>Buenaventura</option>
                <option>Buenos Aires</option>
                <option>Cali</option>
                <option>Cartagena</option>
                <option>Chicago</option>
                <option>Ciudad de Mexico</option>
                <option>Hong Kong</option>
                <option>Leticia</option>
                <option>Medellin</option>
                <option>Miami</option>
                <option>Neiva</option>
                <option>Quito</option>
                <option>Rio de Janeiro</option>
                <option>Sao Pablo</option>
                <option>Seul</option>
                <option>Tokio</option>
                <option>Toronto</option>
                <option>Valledupar</option>
                <option>Vancouver</option>
                <option>Villavicencio</option>
              </select>
            </div>
          </div>
        </span>
      </div>

      <div class="row form-group">
        <span class="input-group-text bg-transparent">
          <i class="fa fa-calendar">
            <h6>Ida</h6>
          </i>
          <input id="ida" class="input-group-text bg-transparent" type="date" max="2030-12-31" step="4">
        </span>
      </div>

     

      <div class="row form-group">
        <span class="input-group-text bg-transparent">
          <div class="input__content">
            <div class="input__group">
              <a href="iniciodesesion.php" class="fa fa-search"></a>
            </div>
          </div>
        </span>
      </div>
      <script>
        // Obtén la fecha actual en formato YYYY-MM-DD
        const hoy = new Date().toLocaleDateString('en-CA'); // 'en-CA' para formato YYYY-MM-DD

        // Asigna la fecha actual a los valores de los inputs y establece la fecha mínima
        document.getElementById('ida').value = hoy;
        document.getElementById('ida').min = hoy;
        document.getElementById('vuelta').value = hoy;
        document.getElementById('vuelta').min = hoy;
      </script>
    </form>
  </section>

</body>

</html>