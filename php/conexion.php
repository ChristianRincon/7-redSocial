<?php 

$servidor = "localhost";
$usuario = "root";
$contraseña = "";
$dataBaseName = "redsocial";

$conexion = mysqli_connect($servidor, $usuario, $contraseña, $dataBaseName);

if(!$conexion){
    echo "Falló la conexión";
    die("Conection failed ". mysqli_connect_error());
}

?>