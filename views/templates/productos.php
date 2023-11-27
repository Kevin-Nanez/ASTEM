<?php
function listarArchivosYCarpetas($ruta)
{
    // Obtener el listado de archivos y carpetas
    $contenido = scandir($ruta);

    // Excluir los directorios "." y ".."
    $contenido = array_diff($contenido, array('.', '..'));

    // Imprimir los nombres
    foreach ($contenido as $item) {
        echo $item . '<br>';
    }
}

// Ruta que deseas listar

function mostrarImagenesEnRuta($ruta)
{
    // Obtener una lista de archivos que coinciden con el patrón de imágenes
    $imagenes = glob($ruta . '*.{jpg,jpeg,png,gif}', GLOB_BRACE);

    // Verificar si se encontraron imágenes
    if ($imagenes !== false && !empty($imagenes)) {
        // Iterar sobre la lista de imágenes y mostrarlas
        foreach ($imagenes as $imagen) {
            echo '<img src="' . $imagen . '" alt="Descripción de la imagen"><br>';
        }
    } else {
        echo 'No se encontraron imágenes en la ruta especificada.';
    }
}

// Ruta que deseas listar
$ruta_imagen = '../src/img/';

// Llamar a la función para mostrar todas las imágenes en la ruta
mostrarImagenesEnRuta($ruta_imagen);




?>

