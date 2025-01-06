<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categoria</title>
    
    <link rel="stylesheet" href="admi.css">
    <style>
        /* General Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            padding: 20px;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #444;
        }

        .categories-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
        }

        .category-card {
            background-color: #fff;
            width: 250px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .category-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
        }

        .category-image {
            width: 100%;
            height: 150px;
            object-fit: cover;
        }

        .category-info {
            padding: 15px;
            text-align: center;
        }

        .category-info h3 {
            margin-bottom: 10px;
            color: #007bff;
        }

        .category-info p {
            font-size: 14px;
            color: #666;
        }

        .view-button {
            display: inline-block;
            margin-top: 10px;
            padding: 8px 15px;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-size: 14px;
            transition: background-color 0.3s ease;
        }

        .view-button:hover {
            background-color: #0056b3;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .categories-container {
                flex-direction: column;
                align-items: center;
            }
        }
    </style>
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
                  <img src="image/ChatBot.png" width="60px" height="60px" alt="">
                </a>
                <div class="logo"><a href="compras.html"><img src="image/aterrizaje-unscreen.gif" alt="" width="50px" height="50px"></a></div> <!-- Icono de carrito de compras -->
               
              </ul>
        </nav>
    </header>

    <h1>Categorias</h1>
    <div class="categories-container">
        <!-- Tarjeta de categoría 1 -->
        <div class="category-card">
            <img src="image/Gemini_Generated_Image_h8dg8eh8dg8eh8dg.jpg" alt="Categoría 1" class="category-image">
            <div class="category-info">
                <h3>Planes de viaje</h3>
                <a href="./planesdeviajecrud.php" class="view-button">Ingresar</a>
            </div>
        </div>

        <!-- Tarjeta de categoría 2 -->
        <div class="category-card">
            <img src="image/7ebc28aa8540144551af821932280c37.gif" alt="Categoría 2" class="category-image">
            <div class="category-info">
                <h3>Vuelos</h3>
                <a href="iniciocrud.php" class="view-button">Ingresar</a>
            </div>
        </div>

      

        <!-- Tarjeta de categoría 4 -->
        <div class="category-card">
            <img src="image/descargar.jpg" alt="Categoría 4" class="category-image">
            <div class="category-info">
                <h3>Hoteleria</h3>
                <a href="hoteleriacrud.php" class="view-button">Ingresar</a>
            </div>
        </div>

         <!-- Tarjeta de categoría 4 -->
         <div class="category-card">
            <img src="image/tumblr_lg8q35OW6e1qzreado1_500.gif" alt="Categoría 4" class="category-image">
            <div class="category-info">
                <h3>Usuarios</h3>
                <a href="minicrud.php" class="view-button">Ingresar</a>
            </div>
        </div>
    </div>

</body>
</html>
