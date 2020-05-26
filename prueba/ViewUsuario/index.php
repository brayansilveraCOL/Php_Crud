<?php
require_once "../Shared/launcher.php";

$contr = new ControladorIdentificacion();
$contrCiudad = new ControladorCiudades();
$responseId = $contr->listarIdentificacion();
$responseCiudad = $contrCiudad->listarCiudades();

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <title>Create User</title>
</head>
<body>
<div id="resultados" class="text-center">

</div>
<form method="POST" name="formnew" id="formnew" action="index.php">
    <h1>Formulario de Registro</h1>
    <hr>
    <div class="form-row">
        <div class="form-group col-6">
            <label for="inputAddress">Nombres</label>
            <input type="text" class="form-control" name="nombres" id="nombres" placeholder="Tus Nombres" pattern="^[A-Za-z]+$">
        </div>
        <div class="form-group col-6">
            <label for="inputAddress2">Apellidos</label>
            <input type="text" class="form-control" name="apellidos" id="apellidos" placeholder="Tus apellidos" pattern="^[A-Za-z]+$">
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="inputState">Tipo Identificacion</label>

            <select id="id_tipoidenti" name="id_tipoidenti" class="form-control">
                <?php
                    foreach ($responseId as $datos){



                ?>

                <option><?php  echo $datos->tipo_id?></option>
                <?php

                    }
                ?>
            </select>
        </div>
        <div class="form-group col-md-6">
            <label for="inputCity">Identificacion</label>
            <input type="text" class="form-control" name="identificacion" id="identificacion" placeholder="Tu Identificacion" required>
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="inputEmail4">Email</label>
            <input type="email" class="form-control" name="correo" id="correo" required placeholder="Tu Email">
        </div>
        <div class="form-group col-md-6">
            <label for="inputPassword4">Password</label>
            <input type="password" class="form-control" name="contrasena" id="contrasena" placeholder="Contraseña" required>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="inputState">Ciudad</label>
            <select id="id_ciudad" name="id_ciudad" class="form-control">
                <?php
                foreach ($responseCiudad as $datosCiudad){

                ?>
                <option><?php  echo $datosCiudad->nombre?></option>
                <?php

                }
                ?>

            </select>
        </div>
    </div>

    <div class="text-left my-3">
        <div class="form-group">
            <div class="form-check">
                <input required class="form-check-input" type="checkbox" name="estado" id="estado">
                <label class="form-check-label" for="gridCheck">
                    Acepto los terminos
                </label>
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-primary btn-lg" >
        Registrar usuario
    </button>
</form>

    <style>
        form {
            width: 50%;
            margin: 0 auto;
            text-align: center; /* Este es para Internet Explorer ¬¬, que de lo contrario no lo centrará (en los navegadores antiguos) */
        }
        body{
            padding: 5rem;
        }
    </style>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
<script type="text/javascript">

    function removeMessage(){
        setTimeout(function ()
        {
            $(".alert").fadeTo(500, 0).slideUp(500, function () {
                //$(this).remove();
                $(".alert").alert('close');
                window.location('/');
            });
        }, 5000);
    }

    $('#formnew').submit(function(event)
    {

        var parametros = $('#formnew').serialize();
        console.log(parametros);
        var salida="";
        $.ajax({
            type: "POST",
            url: "Create.php",
            data: parametros,
            beforeSend: function() {
                $('#resultados').show();
            },
            error: function(salida) {
                $('#resultados').html(salida);
            },
            success: function(datos){
                $('#resultados').html(datos);
                removeMessage();
            }
        });
        event.preventDefault();

    })


</script>
</body>
</html>
