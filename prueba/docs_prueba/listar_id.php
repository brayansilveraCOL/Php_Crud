<?php
require_once "../Shared/launcher.php";

$const = new ControladorIdentificacion();
$lista = $const->listarIdentificacion();

echo json_encode($lista);