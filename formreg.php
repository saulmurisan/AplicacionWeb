<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>REGISTRO DE USUARIOS</title>
</head>
<body>
    
<form action="registro.php" method="POST"> 
 <hr />
 <h3>Crea una cuenta</h3>
 <!--Nombre Usuario-->
 <label for="nombre">Nombre de Usuario:</label><br>
 <input type="text" name="usuario" id="usuario" maxlength="50" required>
 <br/><br/>
<!--Email-->
<label for="email">Email:</label><br>
<input type="text" name="email" id="email" maxlength="50" required>
<br/><br/>
 <!--Contraseña1-->
 <label for="contra1">Contraseña:</label><br>
 <input type="password" name="contra1" id="contra1" maxlength="50" required>
 <br/><br/>
 <!--Contraseña2-->
 <label for="contra2">Repetir contraseña:</label><br>
 <input type="password" name="contra2" id="contra2" maxlength="50" required>
 <br/><br/>
 <input type="submit" name="submit" value="Registrarme">
 <input type="reset" name="clear" value="Borrar">
 </form>
</body>
</html>