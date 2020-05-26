<?php
require_once "../Shared/launcher.php";




// Aca probamos la conexion
$conexion = new Conexion();
$conexion->conectar();


$controladorUsuario = new ControladorUsuario();
$listar = $controladorUsuario->listarUsuario();

echo json_encode($listar);