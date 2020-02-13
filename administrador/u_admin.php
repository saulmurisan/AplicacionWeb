<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>ADMINISTRADOR</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../recursos/bootstrap/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body style="padding-top:50px">
    <div class="container">
<!--CABECERA-->
<div class="bg-warning text-dark" style="position:absolute;left:0px; top: 0px; z-index:1; width: 100%">
<div style="float: right;">
<a href="#" class="btn btn-success" tabindex="-1" role="button" aria-disabled="true">SALIR</a>
</div>
  <h3>ADMINISTRADOR</h3>
</div>


<!--CONSULTA BD USUARIOS-->
<div style="margin-top: 10px">

        <?php
        //CONEXIÓN
            $conexion = mysqli_connect("localhost", "root", "", "munozmurillo") 
            or die("Problemas con la conexión");
        //CONSULTA DE REGISTRO
            $registros = mysqli_query($conexion, 
            "SELECT * from usuarios") or die("Problemas en la consulta:".mysqli_error($conexion));
            //INICIO TABLA
            print "<table class='table table-striped'>";
            print "<tr>
            <th>ID</th>
            <th>NOMBRE</th>
            <th>CONTRASEÑA</th>
            <th>EMAIL</th>
            <th>PANEL DE CONTROL</th>
            <th></th>
            </tr>";
            //PRESENTACIÓN DE LA CONSULTA
                while ($reg = mysqli_fetch_array($registros)) {
                    print "<tr>";
                        print "<td>" . $reg['id'] . "</td>";
                        print "<td>" . $reg['nombre'] . "</td>";
                        print "<td>" . $reg['contrasena'] . "</td>";
                        print "<td>" . $reg['email'] . "</td>";
                        //MODAL: BOTON BORRAR
                        print "<td>";
                        //En el data-target='#borrar$reg[Id]' le ponemos el $reg[Id] para que coga el id de cada fila
                        print "<button type='button' class='btn btn-danger' data-toggle='modal' data-target='#e_borrar$reg[id]'>Borrar</button>";
                        //DIV MODAL BORRAR
                        print "<div class='modal fade' id='e_borrar$reg[id]' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>";
                        print   "<div class='modal-dialog' role='document'>";
                        print     "<div class='modal-content'>";
                        print       "<div class='modal-header'>";
                        print         "<h5 class='modal-title' id='e_dborrar1'>BORRAR</h5>";
                        print         "<button type='button' class='close' data-dismiss='modal' aria-label='Close'>";
                        print           "<span aria-hidden='true'>&times;</span>";
                        print         "</button>";
                        print       "</div>";
                        print       "<div class='modal-body'>";
                        print         "¿ESTAS SEGURO DE QUE DESEAS BORRAR ESTE USUARIO?";
                        print       "</div>";
                        print       "<div class='modal-footer'>";
                        print         "<button type='button' class='btn btn-secondary' data-dismiss='modal'>CERRAR</button>";
                        //BOTON QUE VA AL PHP BORRAR CON EL ID DE LA FILA $reg[Id]
                        print         "<a href='m_file/usuarios/e_delete.php?id=$reg[id]' class='btn btn-danger' id='ids'>BORRAR</a>";
                        print       "</div>";
                        print     "</div>";
                        print   "</div>";
                        print "</div>";
                        print "";
                        print "</td>";
                        //FIN MODAL BORRAR

                        //MODAL: BOTÓN MODIFICAR
                        print "<td>";
                        print "<button type='button' class='btn btn-warning' data-toggle='modal' data-target='#e_modificar$reg[id]'>";
                        print "Modificar";
                        print "</button>";
                        //DIV MODAL MODIFICAR
                        print "<div class='modal fade' id='e_modificar$reg[id]' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>";
                        print "<div class='modal-dialog' role='document'>";

                        print  "<div class='modal-content'>";
                        print  "<div class='modal-header'>";
                        print  "<h5 class='modal-title' id='e_modificar1'>MODIFICAR USUARIO</h5>";
                        print  "<button type='button' class='close' data-dismiss='modal' aria-label='Close'>";
                        print  "<span aria-hidden='true'>&times;</span>";
                        print  "</button>";
                        print  "</div>";
                        print  "<div class='modal-body'>";
                        //FORMULARIO MODIFICAR
                        //La línea siguiente esta haciendo referencia al id de la fila del regristro -e_update.php?id=$reg[Id]-
                        print  "<form action='m_file/usuarios/e_update.php?id=$reg[id]' method='post'>";
                        print         "<div class='form-group'>";
                        print              "<label for='a_nombre'>NOMBRE</label>";
                        print              "<input type='text' class='form-control' name='a_nombre' id='a_nombre?$reg[nombre]&' value='$reg[nombre]' maxlength='15'>";
                        print          "</div>";
                        print          "<div class='form-group'>";
                        print              "<label for='a_contrasena'>CONTRASEÑA</label>";
                        print              "<input type='text' class='form-control' name='a_contrasena' id='a_contrasena?$reg[contrasena]' value='$reg[contrasena]' maxlength='15'>";
                        print          "</div>";
                  
                        print          "<div class='form-group'>";
                        print              "<label for='a_email'>EMAIL</label>";
                        print              "<input type='text' class='form-control' name='a_email' id='a_email?$reg[email]' value='$reg[email]' maxlength='15'>";
                        print          "</div>";
                  
                        print          "<p>";
                        print              "<input type='submit' class='btn btn-primary btn-block' value='MODIFICAR'>";
                        print          "</p>";
                        print      "</form>";
                        print"</div>";
                        print"<div class='modal-footer'>";
                        print  "<button type='button' class='btn btn-secondary' data-dismiss='modal'>CERRAR</button>";
                        print"</div>";
                        print"</div>";
                        print"</div>";
                        print"</div>";
   
                        print "</td>";
                        print "</tr>";
                }
            //FIN TABLA
            print "</table>";
            //FIN CONEXION
            mysqli_close($conexion);
        ?>
<!--FIN DIV CONSULTA-->
</div>
    
  <!--FIN CONTAINER-->  
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="../recursos/bootstrap/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="../recursos/bootstrap/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="../recursos/bootstrap/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>