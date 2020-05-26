<?php
require_once "../Shared/launcher.php";
if(isset($_POST['nombres'])) {
    $nombres = $_POST['nombres'];
    $apellidos = $_POST['apellidos'];
    $correo = $_POST['correo'];
    if (!isset($_POST['estado'])){
        $estado = 0;
    }else {
        $estado=1;
    }
    $identificacion = $_POST['identificacion'];
    $contrasena = $_POST['contrasena'];
    $id_ciudad = $_POST['id_ciudad'];
    $id_tipoidenti=$_POST['id_tipoidenti'];
    $usurioInsertar = new ControladorUsuario();
    $respuesta = $usurioInsertar->insertarUsuario([
        "nombres" => $nombres,
        "apellidos" =>$apellidos,
        "correo" => $correo,
        "estado" => $estado,
        "identificacion" =>$identificacion,
        "contrasena"=>$contrasena,
        "fecha_registro"=>"2020-05-23 00:00:00",
        "id_ciudad" => $id_ciudad,
        "id_tipoidenti" =>$id_tipoidenti,
    ]);
    ?>
    <script language='javascript'>
        alert('Registro Insertado');
        window.location="/prueba/View";
    </script>

    <?php

}//end if
?>






