<h1 class="nombre-pagina">Panel de administracion</h1>
<p class="descripcion-pagina">Modificar Productos</p>

<?php 
include_once __DIR__ . "/../templates/alertas.php";
use Model\products;



?>

<div class="app">
    <div id="paso-2" class="seccion">

    <?php
    $productosInstance = new products();
    $debug = $productosInstance->imprimirProductosAdmin();
    ?>
    
    </div>
</div>

