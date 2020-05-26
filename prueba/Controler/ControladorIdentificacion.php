<?php
class ControladorIdentificacion{
    public function __construct()
    {
    }
    public function listarIdentificacion(){
        $ciudadesModel = new tipoIdentificacion(); // Instancia de la clase usuarios
        $lista= $ciudadesModel->get();
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
}