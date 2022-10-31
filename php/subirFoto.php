<?php
include("../php/conexion.php");
include("../php/validarSesion.php");

$querySubirFoto = "SELECT id_fotos FROM fotos ORDER BY id_fotos DESC LIMIT 1";

$querySubirFoto = mysqli_query($conexion, $querySubirFoto);
$showSubirFoto = mysqli_fetch_array($querySubirFoto);
$idFotos = $showSubirFoto['id_fotos'];
++$idFotos;

//Guardamos la foto en la carpeta del usuario
$ubicacion = "../images/$nickname/$idFotos.png";
$archivo = $_FILES['archivo']['tmp_name'];

//Movemos el archivo
if(move_uploaded_file($archivo, $ubicacion)){
    echo "Se ha cargado con éxito";

    $saveFoto = "INSERT INTO fotos VALUES ('$idFotos', '$nickname', '$ubicacion')";

    if(mysqli_query($conexion, $saveFoto)){
        echo "Tu imagen ha sido guardada";
        header('Location: ../php/fotos.php');
    }else{
        echo "Error" . $saveFoto . "<br>" . mysqli_error($conexion);
        echo "<a href='../php/fotos.php'> Volver </a></div>";
    }
}else{
    echo "Ha ocurrido un error. Intente nuevamente";
    echo "<a href='../php/fotos.php'> Volver </a></div>";
}

?>