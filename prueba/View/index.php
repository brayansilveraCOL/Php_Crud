<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <title>Home list</title>
</head>
<body>
    <div class="container">
        <div class="text-justify py-4 d-flex align-items-center">
            <div class="mr-3">
                <h1>Registro de usuarios</h1>
            </div>
            <div>
                <a href="../ViewUsuario/" class="btn btn-primary">Crear Usuario</a>
            </div>
        </div>


        <table id="example" class="table table-striped">
            <thead>
            <tr>
                <th scope="col">Nombres</th>
                <th scope="col">Apellidos</th>
                <th scope="col">Correo</th>
                <th scope="col">Estado</th>
                <th scope="col">Tipo identificacion</th>
                <th scope="col">identificacion</th>
                <th scope="col">Ciudad</th>
                <th scope="col">Opciones</th>
            </tr>
            </thead>
            <?php
            require_once '../Shared/launcher.php';
            $controladorUsuario = new ControladorUsuario();
            $listar = $controladorUsuario->listarUsuario();
            foreach ($listar as $dato){
            ?>
            <tbody>
            <td><?php echo $dato->nombres?></td>
            <td><?php echo $dato->apellidos?></td>
            <td><?php echo $dato->correo?></td>
            <td><?php echo var_dump((bool)$dato->estado)?></td>
            <td><?php echo $dato->id_tipoidenti?></td>
            <td><?php echo $dato->identificacion?></td>
            <td><?php echo $dato->id_ciudad?></td>
            <td>
                <a href="Edit.php?id=<?php echo $dato->id;?>" class="btn btn-primary" onclick="return confirm('¿esta seguro que desea editar?');">Editar</a>
                <a href="Delete.php?id=<?php echo $dato->id;?>" class="btn btn-danger py-2" onclick="return confirm('¿esta seguro que desea eliminar?');">Eliminar</a>
            </td>                                                                                        
            </tbody>
            <?php
            }
            ?>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

</body>
</html>