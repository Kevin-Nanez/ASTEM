
<header>
    <h1 class="nombre-pagina panel">Panel de administracion</h1>
    <p class="descripcion-pagina">Modificar Productos</p>
</header>
<?php
include_once __DIR__ . "/../templates/alertas.php";

use Model\products;



?>



<div class="app">

    <div id="" class="seccion">

        <?php
        $productosInstance = new products();
        $debug = $productosInstance->imprimirProductosAdmin();
        ?>

    </div>


    <div class="seccion">
        <div class="crear">
            <form class="formulario form-inline" method="POST" action="/admin">
                <h3>Añadir Nuevo Producto</h3>
                <div class="campo">
                    <label for="nombre">Producto</label>
                    <input type="text" id="nombre" placeholder="Nombre del producto" name="nombre" value="" />
                </div>

                <div class="campo">
                    <label for="precio">Precio</label>
                    <input type="text" id="precio" placeholder="Precio del producto" name="precio" value="" />
                </div>

                <div class="campo">
                    <label for="stock">Stock</label>
                    <input type="stock" id="stock" placeholder="Existencias" name="stock" value="" />
                </div>

                <div class=" campo">
                    <label for="img">Imagen</label>
                    <input type="text" id="img" placeholder="Nombre de la imagen" name="img" value="" />
                </div>
                <div>
                    <p class="nota">Nota: la imagen debe ingresarse manualmente en la carpeta src/img/</p>
                    <p class="nota">Ejemplo: playera10.jpeg</p>
                </div>

                <div class="contenedor-boton">
                    <input type="submit" class="boton" name="agregar" value="Añadir Producto" />
                </div>

            </form>

        </div>
    </div>

    <a href="/" class="boton">Cerrar Sesión</a>
</div>