<?php

require_once "../Shared/launcher.php";

if(isset($_POST['id'])){
    $id = $_POST['id'];
    $nombres = $_POST['nombres'];
    $apellidos = $_POST['apellidos'];
    $correo = $_POST['correo'];
    $identificacion = $_POST['identificacion'];
    $contrasena = $_POST['contrasena'];
    $id_ciudad = $_POST['id_ciudad'];
    $id_tipoidenti=$_POST['id_tipoidenti'];
    $usuarioUpdate = new ControladorUsuario();
    $respuesta = $usuarioUpdate->actualizarUsuario([
            "idUsuario"=>$id,
        "nombres" => $nombres,
        "apellidos" =>$apellidos,
        "correo" => $correo,
        "identificacion" =>$identificacion,
        "contrasena"=>$contrasena,
        "fecha_registro"=>"2020-05-23 00:00:00",
        "id_ciudad" => $id_ciudad,
        "id_tipoidenti" =>$id_tipoidenti,
    ]);

    echo json_encode($respuesta);
?>
    <script language='javascript'>
        alert('Registro Update');
        window.location="/prueba/View";
    </script>

<?php
}
?>