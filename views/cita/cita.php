<h1 class="nombre-pagina">Arma tu pedido</h1>
<p class="descripcion-pagina">Añade al carrito los articulos de tu interés</p>

<?php
include_once __DIR__ . "/../templates/alertas.php";
?>

<div class="app">
    <div id="paso-3" class="seccion">
        <div class="seccion ProductoDiv">
            <!-- aqui van a estar los productos traidos de la base de datos -->
            <picture>
                <source srcset='/build/img/1.webp' type='image/webp'>
                <img src='/build/img/1.jpeg' alt='' loading='lazy' width='200' height='300'>
            </picture>
        </div>

    </div>


    <div class="sidebar">
        <div class="carrito-header">
            <h2>Carrito de Compras</h2>
        </div>
        <div class="carrito-items">
            <!-- Contenido del carrito, con productos y precios -->
            <div class="carrito-item">
                <span class="producto">Producto 1</span>
                <span class="precio">$20.00</span>
            </div>
            <div class="carrito-item">
                <span class="producto">Producto 2</span>
                <span class="precio">$30.00</span>
            </div>
            <!-- Puedes agregar más elementos según sea necesario -->
        </div>
        <div class="carrito-total">
            <span>Total: $50.00</span>
        </div>
        <div>
            <a class="pagar" href="/pagar">Pagar</a>
        </div>
    </div>

</div>