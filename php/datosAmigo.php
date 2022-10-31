<?php
include("../php/conexion.php");
$nicknameAmigo = $_GET['nickname'];

if($nickname == $nicknameAmigo){
    header('Location: ../php/miPerfil.php');
}

$queryAmigo = "SELECT * FROM persona WHERE Nickname = '$nicknameAmigo' ";
$executeQueryAmigo = mysqli_query($conexion, $queryAmigo);
$showAmigo = mysqli_fetch_array($executeQueryAmigo);

$nombreAmigo = $showAmigo['Nombre'];
$apellidoAmigo = $showAmigo['Apellido'];
$edadAmigo = $showAmigo['Edad'];
$descripcionAmigo = $showAmigo['Descripcion'];
$fotoPerfilAmigo = $showAmigo['FotoPerfil'];


?>