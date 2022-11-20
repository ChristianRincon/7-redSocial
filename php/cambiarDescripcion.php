<?php
  include("../php/conexion.php");
  include("../php/validarSesion.php");


  $newDescripcion = $_POST["descripcion"];
  $queryDescription = "UPDATE persona SET descripcion = '$newDescripcion' WHERE Nickname = '$nickname' ";
 
  if(mysqli_query($conexion, $queryDescription)){   
    header('Location: ../php/miPerfil.php');
  }else{
    echo "Error";
    echo "<a href='../php/descripcion.php'> Volver </a>";
  }

  $queryNickname = "SELECT * FROM persona WHERE Nickname = '$nickname' ";
  $queryID = mysqli_query($conexion, $queryNickname);
  $showData = mysqli_fetch_array($queryID);

  if($showData){
    $_SESSION['descripcion'] = $showData['Descripcion'];
  }

  

?>