<h1 class="nombre-pagina">Arma tu pedido</h1>
<p class="descripcion-pagina">Añade al carrito los articulos de tu interés</p>

<?php
use Model\products;
include_once __DIR__ . "/../templates/alertas.php";
?>

<div class="app">
    <div class="seccion deproductos">
        <!-- traer los productos con php -->
        <?php
        $productosInstance = new products();
        $debug = $productosInstance->imprimirProductos();
        ?>
    </div>

    <div class="sidebar">
    <div class="carrito-header">
        <h2>Carrito de Compras</h2>
    </div>
    <div class="carrito-items">
        <!-- Encabezados de las columnas -->
        <div class="carrito-item header">
            <span class="producto">Producto</span>
            <span class="cantidad">Cantidad</span>
            <span class="precio">Total</span>
        </div>
        <!-- Contenido del carrito, con productos, cantidades, precios y eliminar -->

        <!-- Puedes agregar más elementos según sea necesario -->
    </div>
    <div class="carrito-total">
        <span>Total: $00.00</span>
    </div>
    <div>
        <a class="botonCita" target="_blank" href="https://www.paypal.com/signin">Pagar</a>
    </div>
</div>
<a href="/" class="boton">Cerrar Sesión</a>
</div>

<!-- carrito -->
<script>
  document.addEventListener('DOMContentLoaded', function () {
    const carrito = {}; // Objeto para almacenar los productos en el carrito

    // Función para manejar el clic en "Añadir al carrito"
    function addToCart(productId, productName, productPrice) {
      if (carrito[productId]) {
        // Si el producto ya está en el carrito, aumenta la cantidad
        carrito[productId].cantidad += 1;
      } else {
        // Si el producto no está en el carrito, añádelo
        carrito[productId] = {
          nombre: productName,
          precio: productPrice,
          cantidad: 1,
        };
      }

      // Actualiza el contenido del carrito en la barra lateral
      updateCart();
    }

    // Función para actualizar el contenido del carrito en la barra lateral
    function updateCart() {
      const carritoItems = document.querySelector('.carrito-items');

      // Borra el contenido actual del carrito
      carritoItems.innerHTML = '';

      // Agrega los productos al carrito
      for (const productId in carrito) {
        const product = carrito[productId];

        const carritoItem = document.createElement('div');
        carritoItem.classList.add('carrito-item');
        carritoItem.innerHTML = `
          <span class="producto">${product.nombre}</span>
          <span class="cantidad">${product.cantidad}</span>
          <span class="precio">$${product.precio * product.cantidad}.00</span>
          <span class="eliminar" onclick="removeFromCart('${productId}')">X</span>
        `;

        carritoItems.appendChild(carritoItem);
      }

      // Actualiza el total del carrito
      updateCartTotal();
    }

    // Función para actualizar el total del carrito
    function updateCartTotal() {
      const carritoTotal = document.querySelector('.carrito-total span');
      let total = 0;

      for (const productId in carrito) {
        const product = carrito[productId];
        total += product.precio * product.cantidad;
      }

      carritoTotal.textContent = `Total: $${total.toFixed(2)}`;
    }

    // Función para eliminar un producto del carrito
    window.removeFromCart = function (productId) {
      delete carrito[productId];
      updateCart();
    };

    // Agrega eventos a los botones "Añadir al carrito"
    const addToCartButtons = document.querySelectorAll('.botonCita');
    addToCartButtons.forEach((button) => {
      button.addEventListener('click', function () {
        const productId = this.dataset.productId;
        const productName = this.dataset.productName;
        const productPrice = parseFloat(this.dataset.productPrice);
        addToCart(productId, productName, productPrice);
      });
    });
  });
</script>