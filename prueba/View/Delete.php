<?php
require_once "../Shared/launcher.php";
    if(isset($_GET['id'])){

        $id = $_GET['id'];

        $instContUsurario = new ControladorUsuario();
        $responde = $instContUsurario->eliminarUsuario($id);
        echo json_encode($responde);
        ?>
        <script language='javascript'>
            alert('Registro Eliminado');
            window.location="index.php";
        </script>

        <?php

    }//end if
?>

