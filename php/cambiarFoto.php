<?php
include("../php/validarSesion.php");

$ubicacion = "../images/" . $nickname . "/perfil.png";

# 'Archivo' proviene de fotos.php en dónde modificamos la foto de perfil. 'tmp_name' es un alojamiento temporal.
$archivo = $_FILES['archivo']['tmp_name'];

if(move_uploaded_file($archivo, $ubicacion)){
    echo "El archivo ha sido cargado con éxito";
    header('Location: ../php/fotos.php');
}else{
    echo "Ha ocurrido un error. Vuelva a intentarlo.";
    echo "<a href='../php/fotos.php'> Volver </a></div>";
}

?> 