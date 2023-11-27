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
            echo '<a class="botonCita" href="#">Añadir al carrito</a>';
            echo '</div>';
            echo '</div>';
        }
    }
}
