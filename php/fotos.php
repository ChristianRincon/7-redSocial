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
    <title> Mis fotos </title>
</head>
<body>
    <header>
        <div id="logo">
            <img src="../images/logo.png" alt="Logo">
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

    <section id="perfil">
        <img src="<?php echo "$_SESSION[fotoPerfil]" ?>" alt="Foto de perfil">
        <h1> <?php echo "$_SESSION[nombre] $_SESSION[apellido]" ?> </h1>

        <form action="../php/cambiarFoto.php" method="post" enctype="multipart/form-data">
            Cambiar foto de perfil: <input type="file" name="archivo" accept=".jpg, .jpeg, .png" required>
            <input type="submit" name="subir" value="Subir Foto">
        </form>
    </section>

    <section id="recuadros">
        <h2 class="tituloBuscar">Mis fotos</h2>
        <h3>
            <form action="../php/subirFoto.php" method="post" enctype="multipart/form-data" id="archivo">
                Añadir imagen: <input type="file" name="archivo"  accept=".jpg, .jpeg, .png" required>
                <input type="submit" name="subir" value="Subir Foto">
            </form>
        </h3>

        <?php
        $queryFotos = "SELECT * FROM fotos f WHERE f.Nickname='$nickname' ";
        $executeQueryFotos = mysqli_query($conexion, $queryFotos);

        while($fila=mysqli_fetch_array($executeQueryFotos)){

        ?>
            <section class="recuadro">
                <img src= <?php echo $fila['NombreFoto'] ?> alt="Fotos" >
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