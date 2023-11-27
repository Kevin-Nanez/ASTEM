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
                    $newName = htmlspecialchars($_POST['nombre'][$id_producto]);
                    $newPrice = htmlspecialchars($_POST['precio'][$id_producto]);
                    $newStock = htmlspecialchars($_POST['stock'][$id_producto]);
                    

                    // Llama a la función para actualizar el producto
                    $productos->updateProduct($id_producto, $newName, $newPrice, $newStock);
                }
            } else if (isset($_POST['eliminar'])){
                $idToDelete = key($_POST['eliminar']);

                // Llama a la función para eliminar el producto
                $productos->deleteProduct($idToDelete);
            } else if(isset($_POST['agregar'])){
                $nombre = htmlspecialchars($_POST['nombre']);
                $precio = htmlspecialchars($_POST['precio']);
                $stock = htmlspecialchars($_POST['stock']); 
                $img = '/build/img/' . htmlspecialchars($_POST['img']); 
            
                $productos->addProduct($nombre, $precio, $stock, $img);
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
