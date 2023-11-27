<?php

namespace Controllers;

use Model\products;
use MVC\Router;

class CitaController
{
    public static function cita(Router $router)
    {
        session_start();

        $router->render('cita/cita', [
            'nombre' => $_SESSION['nombre']
        ]);
    }

    public static function admin(Router $router)
    {
        session_start();

        // Instanciar el modelo de productos
        $productos = new products();

        // Lógica para manejar el formulario
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['guardarCambios'])) {
                foreach ($_POST['guardarCambios'] as $id_producto => $value) {
                    $newName = $_POST['nombre'][$id_producto];
                    $newPrice = $_POST['precio'][$id_producto];
                    $newStock = $_POST['stock'][$id_producto];

                    // Llama a la función para actualizar el producto
                    $productos->updateProduct($id_producto, $newName, $newPrice, $newStock);
                }
            }
        }

        // Obtener la lista de productos y renderizar la vista
        $productosList = $productos->imprimirProductosAdmin();

        $router->render('cita/admin', [
            'nombre' => $_SESSION['nombre'],
            'productosList' => $productosList
        ]);
    }
}
?>
