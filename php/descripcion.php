<?php
  include("../php/conexion.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/estilo.css">
    <script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script>
    <title> Nueva descripción </title>
</head>
<body>
    <header>
        <div id="logo">
            <img src="../images/logo.png" alt="logo">
        </div>
        <nav class="menu">
            <ul>
                <li>
                    <button class="switch" id="switch">
                        <span><i class="fas fa-sun"></i></span>
                        <span><i class="fas fa-moon"></i></span>
                    </button>
                </li>        
                <li><a href="../php/miPerfil.php"> Mi perfil</a></li>
                <li><a href="../php/amigos.php"> Mis amigos</a></li>
                <li><a href="../php/fotos.php"> Mis fotos</a></li>
                <li><a href="../php/buscar.php"> Buscar Amigos</a></li>
                <li><a href="../php/cerrarSesion.php"> Cerrar Sesión </a></li>
            </ul>              
        </nav>
    </header><br><br>

    <video src="../video/claro_web.mp4" autoplay="true" muted="true" loop="true" id="video"></video>

    <form action="../php/cambiarDescripcion.php" id="cambiarDescripcion" method="post">
        <textarea name="descripcion" placeholder="Ingrese su nueva descripción" cols="30" rows="10"></textarea><br><br>
        <div id="opciones-descripcion">
            <input type="submit" name="enviar" class="botonRegistrar" value="Actualizar">
            <a href="../php/miPerfil.php" class="botonBorrar">Cancelar</a>
        </div><br><br>
    </form>


    <footer>
        <p>Copyright © 2022 - Sociality</p>
    </footer>

    <script src="../js/main.js"></script>

    
</body>
</html>