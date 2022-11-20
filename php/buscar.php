<?php
    include("../php/conexion.php");
    include("../php/validarSesion.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/estilo.css">
    <script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script>
    <title> Buscar amigos </title>
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
    </header>
    
    <video src="../video/claro_web.mp4" autoplay="true" muted="true" loop="true" id="video"></video>

    <section id="recuadros">
        <h2 class="tituloBuscar"> Encuentra nuevos amigos </h2><br><br>

    <!-- Búsqueda por nombre (En mantenimiento)
        <form method="post" autocomplete="off">
            <input type="text" name="searchName" placeholder="Ingrese su búsqueda">
            <input type="submit" name="validarBoton" value="Buscar">
        </form>
        <?php     
        if(isset($_POST['validarBoton'])){
            $userSearch = $_POST['searchName'];
            $queryBusqueda = "SELECT * FROM persona p WHERE p.Nickname!='$nickname' 
            and Nombre LIKE '%$userSearch%' and Apellido LIKE '%$userSearch%' ";
        
            $executeQueryBusqueda = mysqli_query($conexion, $queryBusqueda); 
    
            while($filaSearch=mysqli_fetch_array($executeQueryBusqueda)){       
        ?>
        <section class="recuadro">
            <img src="<?php echo $filaSearch['FotoPerfil'] ?>" alt="Perfil amigo" height="150" class="perfilAmigos">
            <h2><?php echo $filaSearch['Nombre'] ." ". $filaSearch['Apellido'] ?></h2>
    
            <a href="<?php echo "../php/perfil.php?nickname=".$filaSearch['Nickname'] ?>" class="boton">Ver perfil</a>
        </section>
        <?php 
            }
        }
        ?>
    -->

    
        <?php
        $queryAmigos = "SELECT * FROM persona p WHERE p.Nickname!='$nickname' and p.Nickname not in
        (SELECT a.Nickname2 FROM amistad a WHERE a.Nickname1='$nickname')";

        $executeQueryAmigos = mysqli_query($conexion, $queryAmigos); 
        
        while($fila=mysqli_fetch_array($executeQueryAmigos)){

        ?>
        <section class="recuadro">
            <img src="<?php echo $fila['FotoPerfil'] ?>" alt="Perfil amigo" height="150" class="perfilAmigos">
            <h2><?php echo $fila['Nombre'] ." ". $fila['Apellido'] ?></h2>
    
            <a href="<?php echo "../php/perfil.php?nickname=".$fila['Nickname'] ?>" class="boton">Ver perfil</a>
            <a href="<?php echo "../php/agregarAmigo.php?nickname=".$fila['Nickname'] ?>" class="boton">Agregar</a><br><br>
        </section>
        <?php 
            }  
        ?>
    </section>

    <footer>
        <p>Copyright © 2022 - Sociality</p>
    </footer>

    <script src="../js/main.js"></script>

    
</body>
</html>