<?php
    $usuario = trim(htmlspecialchars($_REQUEST["usuario"], ENT_QUOTES, "UTF-8"));
    $contra1 = trim(htmlspecialchars($_REQUEST["contra1"], ENT_QUOTES, "UTF-8"));
    $contra2 = trim(htmlspecialchars($_REQUEST["contra2"], ENT_QUOTES, "UTF-8"));
    $email = trim(htmlspecialchars($_REQUEST["email"], ENT_QUOTES, "UTF-8"));

    $conexion = mysqli_connect("localhost", "root", "", "munozmurillo")
    or die("Problemas en la conexion");

    /*$consulta = "SELECT * FROM usuarios WHERE nombre='$usuario'";*/

    $inserusu = "INSERT INTO usuarios (nombre, contrasena, email) VALUES ('$usuario', '$contra1', '$email')";

    if ($contra1 != $contra2) {
        header('location: formreg.php?error=Las contrasenas no coinciden');
    /*} if ($usuario = $consulta) {
        header('location: formreg.php?error=El usuario ya existe');*/
    } else {
        mysqli_query($conexion, $inserusu) or die(mysqli_error($conexion));
        header('location: usulogued.php');
    }
?>