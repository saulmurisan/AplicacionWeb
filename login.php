<?php
    session_unset();
    session_destroy();
    $usuario = trim(htmlspecialchars($_REQUEST["usuario"], ENT_QUOTES, "UTF-8"));
    $contrasena = trim(htmlspecialchars($_REQUEST["contrasena"], ENT_QUOTES, "UTF-8"));

    $conexion = mysqli_connect("localhost", "root", "", "munozmurillo")
    or die("Problemas en la conexion");
    
    $consulta = "SELECT * FROM administradores WHERE usuario='$usuario' AND contrasena='$contrasena'";
    
    $registros = mysqli_query($conexion, $consulta) or die(mysqli_error($conexion));
    $count = mysqli_num_rows($registros);
    if ($count != 1) {
        header('location: index.php?error=Usuario o Contraseña Incorrectos');
    } else {
        session_start();
        $_SESSION['usuario'] = $usuario; 
        $_SESSION['estado'] = 'Autenticado';
        header('location: administracion.php');
    }
?>