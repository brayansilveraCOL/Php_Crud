<?php
//Launcher
require_once "../Shared/launcher.php";




// Aca probamos la conexion
$conexion = new Conexion();
$conexion->conectar();

//Instanciamos el modelo Generio
//$generico = new Generic();
//Instanciamos el Usuario
/*$usario = new usuario();
$registro = $usario->where("nombres", "=", "brayan")->get();
var_dump($registro);*/

//$controladorUsuario = new ControladorUsuario();
//$listar = $controladorUsuario->listarUsuario();
//
//echo json_encode($listar);
/*$respuesta = $controladorUsuario->insertarUsuario([
    "nombres" => "xxxxxx",
    "apellidos" =>"dasdadad",
    "correo" => "sfasdfadsfadf",
    "estado" => true,
    "identificacion" =>"afasdfadfadf",
    "contrasena"=>"dafsdfadfas",
    "fecha_registro"=>"2020-05-23 00:00:00",
    "id_ciudad" => 1,
    "id_tipoidenti" =>1,
]);
echo "<pre>";
var_dump($respuesta);
echo "</pre>";*/



echo "<h1>Actualizar</h1>";
$usuario = [
    "idUsuario" => 106,
    "correo" => "actualizado@com",
];
$controladorUsuario = new  ControladorUsuario();
$response = $controladorUsuario->actualizarUsuario($usuario);
echo "<pre>";
var_dump($response);
echo "</pre>";

/*
echo "<h1>Actualizar</h1>";
$usuario = [
    "idUsuario" => 28,
    "correo" => "actualizado.com"
];
$response = $controladorUsuario->actualizarUsuario($usuario);
echo "<pre>";
var_dump($response);
echo "</pre>";

echo "<h1>Eliminar</h1>";
$data=22;
$response_elimi = $controladorUsuario->eliminarUsuario(27);
echo "<pre>";
var_dump($response_elimi);
echo "</pre>";

echo "<h1>Buscar</h1>";
$response_busc = $controladorUsuario->FindbyCriteria(29);
echo "<pre>";
var_dump($response_busc);
echo "</pre>";

echo "<h1>Prueba Con la encapsulacion  de los errores y mensajes</h1>";
$controladorUsuarioP = new ControladorUsuario();
$listarP = $controladorUsuarioP->listarUsuario();
echo "<pre>";
var_dump($listarP);
echo "</pre>";*/


/*$usario->setNombres("brayan");
$usario->setApellidos("Silvera");
$usario->setCorreo("adfsdfsdfsdf");
$usario->setEstado(1);
$usario->setIdentificacion("dfsdfsdfsdf");
$usario->setContrasena("adafsdfaf");
$usario->setFechaRegistro("2020-05-23 00:00:00");
$usario->setIdCiudad(1);
$usario->setIdTipoidenti(1);
$usario->insert();*/
/*echo '<hr>';
//Aca probaremos el Crud FetchAll
$crud = new Crud("usuario");
$var = $crud->get();
var_dump($var);

//Insert

$id = $crud ->insert([
    "nombres" => "daniela",
    "apellidos" =>"silvera",
    "correo" => "sfasdfadsfadf",
    "estado" => true,
    "identificacion" =>"afasdfadfadf",
    "contrasena"=>"dafsdfadfas",
    "fecha_registro"=>"2020-05-23 00:00:00",
    "id_ciudad" => 1,
    "id_tipoidenti" =>1,
]);
echo "<br>";
echo "ID: " . $id;

echo "<br>";

echo "<h1>Update</h1>";
$crud->where("id", "=", 4)->update([
    "nombres" => "asdfadsfdsfadf"
]);
echo "<br>";
echo "<h1>Delete</h1>";
$eliminados = $crud->where("id", "=", 3)->delete();
echo " ELIMINADOS: " . $eliminados;*/