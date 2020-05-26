<?php
/*
 * permitir consumir una tabla especifica invocando un recurso especifico
 */

class ControladorUsuario{
    public function __construct()
    {
    }

    public function insertarUsuario($data) {
        $usuarioModel = new usuario();
        $id = $usuarioModel->insert($data);
        $exitosa = ($id > 0); //condicion
        $response = new Response($exitosa ? Emensajes::INSERTADO :  Emensajes::ERROR); //Operador ternario
        //$response->setMensaje("Mensaje personalizado");
        $response->setDatos($id);
        return $response;
      /*  return [
            "codigo" => (($id > 0) ? 1 : -1),
            "mensaje" => ($id > 0) ? "Se ha insertado el usuario correctamente" : "No se pudo insertar el usuario.",
            "datos" => $id
        ];*/
    }
    public function listarUsuario(){
        $usuario = new usuario(); // Instancia de la clase usuarios
        $lista= $usuario->get();
        //$estado = count($lista);
        //$response = new Response($estado ? Emensajes::CORRECTO :  Emensajes::ERROR); //Operador ternario
        //$response->setDatos($lista);
        return $lista;

        /* return[
             "codigo" => ((count($lista)>0) ? 1 : -1),
             "mensaje" => ((count($lista)>0) ? "Exito..!!" : "Error..!!"),
             "Datos" => $lista
         ];*/
    }

    public function actualizarUsuario($data){
        $usuario = new usuario(); // Instancia de la clase usuarios
        $actualizados = $usuario->where("id","=", $data["idUsuario"])->update($data); // Recibe el objeto y hace el udate con este
        $estado = ($actualizados>0);
        $response = new Response($estado ? Emensajes::ACTUALIZADO :  Emensajes::ERROR); //Operador ternario
        $response->setDatos($actualizados);
        return $response;
        /* return[
             "codigo" => (($actualizados>0)? 1 : -1), //Se valida si el id es mayor que 0
             "mensaje" => (($actualizados>0)? "Exito..!!" : "Error"),
             "data" => $actualizados
         ];*/
    }
    public function eliminarUsuario($data){
        $usuario = new usuario();
        $eliminado = $usuario->where("id","=", $data)->delete();
        $estado = ($eliminado>0);
        $response = new Response($estado ? Emensajes::ELIMINADO :  Emensajes::ERROR); //Operador ternario
        $response->setDatos($eliminado);
        return $response;
    }
    public function  FindbyCriteria($data){
        $usuarioModel = new usuario(); // Instancia de la clase usuarios
        $Findby = $usuarioModel->where("id", "=", $data)->first();
        $estado = ($Findby!=null);
        $response = new Response($estado ? Emensajes::BUSCADO :  Emensajes::ERROR); //Operador ternario
        $response->setDatos($Findby);
        return $response;
        /*
        return[
            "codigo" => (($Findby!=null)? 1 : -1), //Se valida si el id es mayor que 0
            "mensaje" => (($Findby!=null)? "Exito..!!" : "Error"),
            "data" => $Findby
        ];*/
    }
}