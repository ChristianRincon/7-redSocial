<?php
    include("../php/conexion.php");
    include("../php/validarSesion.php");
    $nicknameAmigo = $_GET['nickname'];

    $queryAgregar = "INSERT INTO amistad (Nickname1, Nickname2) VALUES ('$nickname', '$nicknameAmigo')";
    $executeQueryAgregar = mysqli_query($conexion, $queryAgregar);

    if($executeQueryAgregar){
        $queryAgregar = "INSERT INTO amistad (Nickname1, Nickname2) VALUES ('$nicknameAmigo', '$nickname')";

        if($executeQueryAgregar){
            echo "Se ha añadido a un nuevo amigo";
            header('Location: ../php/buscar.php');
        }else{
            echo "Error. No se pudo agregar.";
            echo "<a href='../php/buscar.php'> Volver </a></div>";
        }
    }else{
        echo "Error. No se pudo agregar.";
        echo "<a href='../php/buscar.php'> Volver </a></div>";
    }


?>