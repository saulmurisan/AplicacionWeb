<?php
    $usuario = trim(htmlspecialchars($_REQUEST["usuario"], ENT_QUOTES, "UTF-8"));
    $contrasena = trim(htmlspecialchars($_REQUEST["contrasena"], ENT_QUOTES, "UTF-8"));
    $email = trim(htmlspecialchars($_REQUEST["email"], ENT_QUOTES, "UTF-8"));

    $conexion = mysqli_connect("localhost", "root", "", "munozmurillo")
    or die("Problemas en la conexion");
    
    $consulta = "UPDATE usuarios SET nombre='$usuario', contrasena='$contrasena' 
                    WHERE email='$email'";
    
    $registros = mysqli_query($conexion, $consulta) or die(mysqli_error($conexion));
?>