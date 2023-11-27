<h1 class="nombre-pagina">Arma tu pedido</h1>
<p class="descripcion-pagina">Añade al carrito los articulos de tu interés</p>

<?php
use Model\products;
include_once __DIR__ . "/../templates/alertas.php";
?>

<div class="app">
    <div class="seccion">
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
            <a class="botonCita" href="/pagar">Pagar</a>
        </div>
    </div>

</div>