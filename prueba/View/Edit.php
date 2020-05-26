<?php
 require_once "../Shared/launcher.php";

 $Controler = new ControladorUsuario();
 if (isset($_GET['id'])){
     $data = $_GET['id'];
     $instContUsuario = new ControladorUsuario();
     $res = $instContUsuario->FindbyCriteria($data);
     $cont = new ControladorCiudades();
     $pv = $cont->listarCiudades();
     $nombres = $res->datos->nombres;
     $apellidos = $res->datos->apellidos;
     $identificacion = $res->datos->identificacion;
     $correo = $res->datos->correo;
     $estado = $res->datos->estado;
     $contrasena = $res->datos->contrasena;
     $id_ciudad = $res->datos->id_ciudad;
     $id_tipoidenti = $res->datos->id_tipoidenti;

 }
 $ControlerIdentificacion = new ControladorIdentificacion();
 $ResponseId = $ControlerIdentificacion->listarIdentificacion();

 foreach ($ResponseId as $response){
     $nombreid = $response->tipo_id[0];
 }


?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>

    <title>Page Edicion</title>
</head>
<body>
<div id="resultados" class="text-center">

</div>
<form method="POST" name="formnew" id="formnew">
    <input  type="hidden" class="form-control" name="id" id="id" value="<?php echo $data; ?>">
    <h1>Formulario de Registro</h1>
    <hr>
    <div class="form-row">
        <div class="form-group col-6">
            <label for="inputAddress">Nombres</label>
            <input  type="text" class="form-control" name="nombres" id="nombres" value="<?php echo $nombres; ?>" pattern="^[A-Za-z]+$" >
        </div>

        <div class="form-group col-6">
            <label for="inputAddress2">Apellidos</label>
            <input type="text" class="form-control" name="apellidos" id="apellidos" value="<?php echo $apellidos; ?>" pattern="^[A-Za-z]+$">
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="inputState">Tipo Identificacion</label>
            <select id="id_tipoidenti" name="id_tipoidenti" class="form-control" pattern="^[A-Za-z]+$">
                <?php
                foreach ($ResponseId as $dataid){

                ?>
                <option value="<?php echo $dataid->tipo_id?>"><?php echo $dataid->tipo_id?></option>
                <?php
                }
                ?>
            </select>
            <script type="text/javascript">
                $("#id_tipoidenti option[value='<?php echo $id_tipoidenti; ?>'").attr("selected",true);
            </script>
        </div>
        <div class="form-group col-md-6">
            <label for="inputCity">Identificacion</label>
            <input type="text" class="form-control" name="identificacion" id="identificacion" value="<?php echo $identificacion; ?>">
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="inputEmail4">Email</label>
            <input type="email" class="form-control" name="correo" id="correo" required value="<?php echo $correo; ?>">
        </div>
        <div class="form-group col-md-6">
            <label for="inputPassword4">Password</label>
            <input type="password" class="form-control" name="contrasena" id="contrasena"value="<?php echo $contrasena; ?>">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="inputState">Ciudad</label>
            <select class="form-control" id="id_ciudad" name="id_ciudad">
                <?php
                foreach ($pv as $data){
                ?>
                <option value="<?php echo $data->nombre?>"><?php echo $data->nombre?></option>
                <?php
                }
                ?>
            </select>
            <script type="text/javascript">
                $("#id_ciudad option[value='<?php echo $id_ciudad; ?>'").attr("selected",true);
            </script>

        </div>
    </div>
    <button type="submit" class="btn btn-primary btn-lg" >
        Editar usuario
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
            url: "PostEdit.php",
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
    function validar2() {
        const input = document.getElementById('apellidos');
        if(!input.checkValidity()) {
            alert('El campo no es válido.');
        } else {
            alert('El campo es válido.');
        }
    }


</script>
</body>
</html>
