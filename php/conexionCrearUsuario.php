<?php
include("../php/conexion.php");

$nickname = $_POST["nickname"];
$nombre = $_POST["nombre"];
$apellido = $_POST["apellido"];
$edad = $_POST["edad"];
$descripcion = $_POST["descripcion"];
$email = $_POST["correo"];
$password = $_POST["contraseña"];
$passwordHash = password_hash($password, PASSWORD_BCRYPT);
$fotoPerfil = "../images/$nickname/perfil.png";

$queryNickname = "SELECT Nickname FROM persona WHERE Nickname = '$nickname' ";
$queryID = mysqli_query($conexion, $queryNickname);                                 
$showData = mysqli_fetch_array($queryID);

if(!$showData){
    $createUser = "INSERT INTO persona VALUES ('$nickname', LOWER('$nombre'), LOWER('$apellido'), '$edad', '$descripcion', '$fotoPerfil', '$email', '$passwordHash')";

    if(mysqli_query($conexion, $createUser)){
        mkdir("../images/$nickname");
        copy("../images/default.png", "../images/$nickname/perfil.png");
        echo "Registro exitoso <br>";
        echo "<a href = '../index.html'> Iniciar sesión </a> </div>"; 
    }else{
        echo "Error: " . $createUser . "<br>" . mysqli_error($conexion);
    }
}else{
    echo "Tu usuario se encuentra en uso.";
    echo "<a href='../index.html'> Intentalo de nuevo </a></div>";
}

mysqli_close($conexion);

?>