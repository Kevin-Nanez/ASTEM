<?php

namespace Model;

class products extends ActiveRecord
{
    //base de datos
    protected static $tabla = 'producto';
    protected static $columnasDB = ['id', 'nombre', 'webp', 'jpeg', 'precio', 'stock'];

    public $id = null;
    public $nombre = '';
    public $webp = '';
    public $jpeg = '';
    public $precio = '';
    public $stock = '';

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->webp = $args['webp'] ?? '';
        $this->jpeg = $args['jpeg'] ?? '';
        $this->precio = $args['precio'] ?? '';
        $this->stock = $args['stock'] ?? '';
    }

    //mensajes de validacion para la creacion de cuentas
    // es publica la clase por que se va a usar fuera de la clase en login controller

    public function imprimirProductos()
    {
        $query = 'SELECT * FROM producto';
        $resultProducts = self::$db->query($query);

        while ($row = mysqli_fetch_assoc($resultProducts)) {
            echo '<div class="seccion ProductoDiv">';
            echo '<h3>' . $row['nombre'] . '</h3>';
            echo '<picture>';
            echo '<source srcset="' . $row['webp'] . '" type="image/webp">';
            echo '<img src="' . $row['jpeg'] . '" alt="" loading="lazy" width="200" height="300">';
            echo '</picture>';
            echo '<h4>$' . $row['precio'] . '.00</h4>';
            echo '<h4>Stock: ' . $row['stock'] . '</h4>';
            echo '<div>';
            echo '<a class="botonCita" href="#" 
            data-product-id="' . $row['id'] . '"
            data-product-name="' . $row['nombre'] . '"
            data-product-price="' . $row['precio'] . '">Añadir al carrito</a>';
            echo '</div>';
            echo '</div>';
        }
    }

    public function imprimirProductosAdmin()
    {
        if ($_SESSION['administrador'] == 1) {
            $query = 'SELECT * FROM producto';
            $resultProducts = self::$db->query($query);
            echo '<form action="/admin" method="POST" class="formulario">';
            while ($row = mysqli_fetch_assoc($resultProducts)) {
                echo '<div class="seccion ProductoDiv">';
                echo '<h3><input type="text" name="nombre[' . $row['id'] . ']" value="' . $row['nombre'] . '"></h3>';
                echo '<picture>';
                echo '<source srcset="' . $row['webp'] . '" type="image/webp">';
                echo '<img src="' . $row['jpeg'] . '" alt="" loading="lazy" width="200" height="300">';
                echo '</picture>';
                echo '<h4>Precio: $<input type="text" name="precio[' . $row['id'] . ']" value="' . $row['precio'] . '"></h4>';
                echo '<h4>Stock: <input type="text" name="stock[' . $row['id'] . ']" value="' . $row['stock'] . '"></h4>';
                echo '<div>';
                echo '<button class="botonCita guardarCambios" type="submit" name="guardarCambios[' . $row['id'] . ']">Guardar Cambios</button>';
                echo '</div>';
                echo '</div>';
            }
            echo '</form>';
        } else {
            echo "No tienes permisos para realizar esta acción";
        }
    }
    
    

    public function updateProduct($id, $newName, $newPrice, $newStock)
    {
        // Sanitizar los datos
        $newName = self::$db->escape_string($newName);
        $newPrice = self::$db->escape_string($newPrice);
        $newStock = self::$db->escape_string($newStock);

        // Consulta SQL para actualizar el producto
        $query = "UPDATE " . static::$tabla . " SET 
                    nombre = '$newName', 
                    precio = '$newPrice', 
                    stock = '$newStock' 
                  WHERE id = '$id'";

        // Actualizar BD
        $resultado = self::$db->query($query);

        return $resultado;
    }
}
