<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Configuración básica del documento HTML -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galeria</title>
</head>
<body>
    <h1>Galería de imágenes</h1>

    <?php
    // Hago un foreach que muestra las imagenes de las cervezas con enlaces para mostrar, editar y borrar
    foreach($cervezas as $cerveza){
        echo '<div style="width:33%;display:inline-block;">
                <table>
                    <tr>
                        <td><a href="index.php?url=cervezas/show/'. $cerveza->Identificador.'">
                            
                            <img src="'.$cerveza->Ruta_imagen_asociada_a_la_cerveza.'" /> 
                        </a></td>
                    </tr>
                    <tr>
                       
                        <td><a href="index.php?url=cervezas/show/'. $cerveza->Identificador . '">Ver cerveza</a></td>
                    </tr>
                    <tr>
                       
                        <td><a href="index.php?url=cervezas/edit/' . $cerveza->Identificador . '">Modificar</a></td>
                    </tr>
                    <tr>
    
                        <td><a href="index.php?url=cervezas/delete/'. $cerveza->Identificador . '">Eliminar</a></td>
                    </tr>
                </table>
        </div>';  
    }
    ?>
</body>
</html>
