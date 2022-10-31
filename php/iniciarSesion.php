<?php
include("../php/conexion.php");

session_start();
$_SESSION['login'] = false;

$nickname = $_POST['nickname'];
$password = $_POST['contraseña'];

$queryNickname = "SELECT * FROM persona WHERE Nickname = '$nickname' ";
$queryID = mysqli_query($conexion, $queryNickname);
$showData = mysqli_fetch_array($queryID);

if($showData){
    if(password_verify($password, $showData['Password'])){
        $_SESSION['login'] = true;
        $_SESSION['nickname'] = $showData['Nickname'];
        $_SESSION['nombre'] = $showData['Nombre'];
        $_SESSION['apellido'] = $showData['Apellido'];
        $_SESSION['edad'] = $showData['Edad'];
        $_SESSION['descripcion'] = $showData['Descripcion'];
        $_SESSION['fotoPerfil'] = $showData['FotoPerfil'];
        
        header('Location: ../php/miPerfil.php');
    }else{
        echo "Contraseña incorrecta";
        echo "<br> <a href='../index.html'> Intente nuevamente </a> </div>";
    }
}else{
    echo "Su usuario no existe";
    echo "<br> <a href='../index.html'> Intente nuevamente </a> </div>";
}

mysqli_close($conexion);


?>