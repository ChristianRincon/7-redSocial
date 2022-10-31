<?php

session_start();

//Limpiamos el registro asignándole como valor un array vacío.
$_SESSION = array();

//Por último lo eliminamos.
session_destroy();
header('Location: ../index.html');

?>