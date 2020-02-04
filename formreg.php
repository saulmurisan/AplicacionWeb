<?php

 $host_db = "localhost";
 $user_db = "root";
 $pass_db = "";
 $db_name = "munozmurillo";
 $tbl_name = "usuarios";
 
 $conexion = new mysqli($host_db, $user_db, $pass_db, $db_name);

 if ($conexion->connect_error) {
 die("La conexion falló: " . $conexion->connect_error);
}

 $buscarUsuario = "SELECT * FROM $tbl_name
 WHERE nombre_usuario = '$_POST[usuario]' ";

 $result = $conexion->query($buscarUsuario);

 $count = mysqli_num_rows($result);

 if ($count == 1) {
 echo "<br />". "El Nombre de Usuario ya a sido utilizado." . "<br />";

 echo "<a href='index.php'>Por favor escoga otro Nombre</a>";
 }
 else{

 $form_pass = $_POST['contrasena'];
 
 $hash = password_hash($form_pass, PASSWORD_BCRYPT);

 $query = "INSERT INTO Usuarios (nombre, contrasena, email)
           VALUES ('$_POST[usuario]', '$_POST[contrasena]', '$_POST[email]')";

 if ($conexion->query($query) === TRUE) {
 
 echo "<br />" . "<h2>" . "Usuario Creado Exitosamente!" . "</h2>";
 echo "<h4>" . "Bienvenido: " . $_POST['usuario'] . "</h4>" . "\n\n";
 echo "<h5>" . "Hacer Login: " . "<a href='index.php'>Login</a>" . "</h5>"; 
 }

 else {
 echo "Error al crear el usuario." . $query . "<br>" . $conexion->error; 
   }
 }
 mysqli_close($conexion);
?>