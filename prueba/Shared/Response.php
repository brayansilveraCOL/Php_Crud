<?php
 class Response{
     public $codigo;
     public $mensaje;
     public $datos;

     public function __construct($codigo = null, $mensaje= null, $datos=null)
     {
         //Obetener la respuesta por defecto por codigo --->  me devuelve la instancia seteada con el codigo y el menaje por defecto
         if(isset($codigo)&&empty($mensaje)){
             $response = Emensajes::getMensaje($codigo);
             $this->codigo = $response->codigo;
             $this->mensaje = $response->mensaje;
             $this->datos = $response->datos;
             return;
         }

         //Comprobamos el codigo si es un string obtener el modelo por defecto de nuestra respuesta setear el codigo que recibo para que sea un entero
         if(is_string($codigo)){
             $temp = Emensajes::getMensaje($codigo);
             $codigo = $temp->codigo;
         }

         //Se remplaza los atributos con los datos recibidos en el constructor
         $this->codigo = $codigo;
         $this->mensaje =$mensaje;
         $this->datos = $datos;
     }
     //crear un metodo a partir de response codificar el objeto o la instancia de la clase respuesta a json
     public function json($obj = null) {
         header('Content-Type: application/json');
         if (is_array($obj) || is_object($obj)) {
             return json_encode($obj);
         }
         return json_encode($this);
     }

     /**
      * @return |null
      */
     public function getCodigo()
     {
         return $this->codigo;
     }

     /**
      * @param |null $codigo
      */
     public function setCodigo($codigo)
     {
         $this->codigo = $codigo;
     }

     /**
      * @return |null
      */
     public function getMensaje()
     {
         return $this->mensaje;
     }

     /**
      * @param |null $mensaje
      */
     public function setMensaje($mensaje)
     {
         $this->mensaje = $mensaje;
     }

     /**
      * @return |null
      */
     public function getDatos()
     {
         return $this->datos;
     }

     /**
      * @param |null $datos
      */
     public function setDatos($datos)
     {
         $this->datos = $datos;
     }

 }