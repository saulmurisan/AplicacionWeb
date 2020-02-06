<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Aplicación Web IAW</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
            <!-- Bootstrap CSS -->
            <link rel="stylesheet"
            href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
            integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
            crossorigin="anonymous">
            <link href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style type="text/css">
    body {
		font-family: 'Varela Round', sans-serif;
	}
	.modal-login {
		width: 350px;
	}
	.modal-login .modal-content {
		padding: 20px;
		border-radius: 1px;
		border: none;
	}
	.modal-login .modal-header {
		border-bottom: none;
        position: relative;
		justify-content: center;
	}
	.modal-login h4 {
		text-align: center;
		font-size: 26px;
	}
	.modal-login .form-control, .modal-login .btn {
		min-height: 40px;
		border-radius: 1px; 
	}
	.modal-login .hint-text {
		text-align: center;
		padding-top: 10px;
	}
	.modal-login .close {
        position: absolute;
		top: -5px;
		right: -5px;
	}
	.modal-login .btn {
		background: #3498db;
		border: none;
		line-height: normal;
	}
	.modal-login .btn:hover, .modal-login .btn:focus {
		background: #248bd0;
	}
	.modal-login .hint-text a {
		color: #999;
	}
	.trigger-btn {
		display: inline-block;
		margin: 100px auto;
	}
</style>
</head>
<body style="background-color: #232327; color: white">
<!-- Modal HTML -->

<div id="myModal" class="modal fade" style="color: black">
	<div class="modal-dialog modal-login">
		<div class="modal-content">
			<div class="modal-header">				
				<h4 class="modal-title">Login</h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
			<div class="modal-body">
				<form action="login.php" method="post">
					<div class="form-group">
						<input type="text" class="form-control" placeholder="Usuario" id="usuario" name="usuario" required="required">
					</div>
					<div class="form-group">
						<input type="password" class="form-control" placeholder="Contraseña" id="contrasena" name="contrasena" required="required">
					</div>
					<div class="form-group">
						<input type="submit" class="btn btn-primary btn-block btn-lg" value="Iniciar Sesión">
					</div>
				</form>				

			</div>
		</div>
	</div>
</div> 

<div class="container" >
            <div style="position: relative; float: left; width: 350px"><h2>Aplicación Web IAW</h2></div>
			<div style="position: relative; float: right; padding-top: 15px; width: 150px">
				<input type="text" REQUIRED disable class="form-control" id="idsuario" 
					value="<?php 
								session_start();
								print $_SESSION['usuario'];
							?>">
			</div>
			<div style="position: relative; float: right; padding-top: 15px; width: 150px">
                <a href="formfoto.php" class="btn btn-primary btn-lg">Publicar fotos</a>
			</div>
			<div style="position: relative; float: right; padding-top: 15px; width: 150px">
                <a href="formedit.php" class="btn btn-primary btn-lg">Editar datos</a>
			</div>
			
			<div style="position: relative; clear: both">
			<br/><br/>
            <form action="inicio.php" method="post">
			<table style="border: 0px"class="table">
					<tr>
						<td>
							<div class="form-group">
                    			<label style="color: white" for="fechades" >Fecha de subida: </label>
                    			<input type="date" class="form-control" name="fecha" id="fecha" required>
							</div>
						</td>
						
						<td rowspan="2">
							<div>
                    			<input style="height: 175px" type="submit" class="btn btn-primary btn-block" value="Buscar">
							</div>
						</td>
					</tr>
					<tr>
						<td>
							<div class="form-group">
                    			<label style="color: white" for="medida">Usuario: </label>
                    			<select name="usuario" class="form-control">
							</div> 
								<?php
								$conexion = mysqli_connect("localhost", "root", "", "munozmurillo") 
									or die("Problemas de conexion");

								$registros = mysqli_query($conexion, "SELECT usuario FROM usuarios")
									or die("Problemas en el select".mysqli_error($conexion));

								while ($reg = mysqli_fetch_array($registros)) {
									echo "<option value='$reg[usuario]'>$reg[usuario]</option>";
								}
							?>
      						</select>
						</td>
					</tr>
				</table> 
            </form>

<?php
$conexion = mysqli_connect("localhost", "root", "", "munozmurillo") or die("Problemas con la conexión");
$registros = mysqli_query($conexion, "SELECT usuario, foto, fecha FROM fotos")
    or die("Problemas en la consulta:".mysqli_error($conexion));
     
echo "<table class='table table-striped' style='background-color: white'>";
echo "<tr><th>Usuario</th><th>Foto</th><th>Fecha</th>";
while ($reg = mysqli_fetch_array($registros)) {
    echo "<tr>";
        echo "<td>" . $reg['usuario'] . "</td>";
        echo "<td>" . $reg['foto'] . "</td>";
        echo "<td>" . $reg['fecha'] . "</td>";
    echo "</tr>";
}
echo "</table>";
                
mysqli_close($conexion);
?>

<!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS a-->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
            crossorigin="anonymous"></script>
        <script
            src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
            integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
            crossorigin="anonymous"></script>
        <script
            src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
            integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
            crossorigin="anonymous"></script>
</body>
</html>