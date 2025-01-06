<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mis Compras</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="shop.css">
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
            <li class="link"><a href="admi.php">Administrador</a></li>
            <div class="logo"><a href="compras.html"><img src="image/aterrizaje-unscreen.gif" alt="" width="50px" height="50px"></a></div>
        </ul>
    </nav>
</header>

<h1>Mis Compras</h1>
<div id="cartItemsContainer">
    <!-- Aquí se mostrarán las compras del usuario -->
</div>

<p>Total: <span id="totalAmount">$0</span></p>

<script>
// Cargar las compras del carrito desde el localStorage
function loadCartItems() {
    let cart = JSON.parse(localStorage.getItem('cart')) || [];
    let cartContainer = document.getElementById('cartItemsContainer');
    let totalAmount = 0;

    // Limpiar el contenedor de carrito
    cartContainer.innerHTML = '';

    // Mostrar los elementos del carrito
    cart.forEach((item, index) => {
        const itemElement = document.createElement('div');
        itemElement.classList.add('cart-item');
        itemElement.innerHTML = `
            <h3>Destino: ${item.destination}</h3>
            <p><strong>Nombre:</strong> ${item.name}</p>
            <p><strong>Email:</strong> ${item.email}</p>
            <p><strong>Teléfono:</strong> ${item.phone}</p>
            <p><strong>Fecha de Viaje:</strong> ${item.travelDate}</p>
            <p><strong>Clase:</strong> ${item.classType}</p>
            <p><strong>Precio:</strong> $${item.price.toLocaleString()}</p>
            <button class="delete-button" onclick="removeItem(${index})">Eliminar</button>
        `;

        // Sumar el precio al total
        totalAmount += item.price;

        cartContainer.appendChild(itemElement);
    });

    // Actualizar el total
    document.getElementById('totalAmount').innerText = `$${totalAmount.toLocaleString()}`;
}

// Eliminar un ítem del carrito
function removeItem(index) {
    let cart = JSON.parse(localStorage.getItem('cart')) || [];
    cart.splice(index, 1);  // Eliminar el ítem seleccionado
    localStorage.setItem('cart', JSON.stringify(cart));  // Guardar el carrito actualizado
    loadCartItems();  // Volver a cargar el carrito
}

// Llamar a la función para cargar los elementos del carrito al cargar la página
window.onload = function() {
    loadCartItems();
};

</script>

</body>
</html>
