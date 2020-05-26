<?php

class Conexion {

    private $conexion;
    //Se cera una variable array para almacenar la informacion de la base de datos
    private $configuracion = [
        "driver" => "mysql",
        "host" => "localhost",
        "database" => "database",
        "port" => "3306",
        "username" => "root",
        "password" => "",
        "charset" => "utf8mb4"
    ];

    public function __construct() {

    }

    // Se crea la funcion Conectar
    public function conectar() {
        try {

            //Aca se ponen las variables y se asignan individual
            $CONTROLADOR = $this->configuracion["driver"];
            $SERVIDOR = $this->configuracion["host"];
            $BASE_DATOS = $this->configuracion["database"];
            $PUERTO = $this->configuracion["port"];
            $USUARIO = $this->configuracion["username"];
            $CLAVE = $this->configuracion["password"];
            $CODIFICACION = $this->configuracion["charset"];
            //Se crea la url para conectar
            $url = "{$CONTROLADOR}:host={$SERVIDOR}:{$PUERTO};"
                . "dbname={$BASE_DATOS};charset={$CODIFICACION}";
            //Se crea la conexión.
            $this->conexion = new PDO($url, $USUARIO, $CLAVE);
            return $this->conexion;
        } catch (Exception $exc) {
            echo "NO SE PUDO CONECTAR";
            echo $exc->getTraceAsString();
        }
    }

}
