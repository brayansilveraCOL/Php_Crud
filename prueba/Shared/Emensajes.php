<?php
class Emensajes{
    const CORRECTO= "CORECTO";
    const INSERTADO="INSERTADO CON EXITO";
    const ELIMINADO = "ELIMINADO CON EXITO";
    const BUSCADO = "BUSCADO CON EXITO";
    const ACTUALIZADO = "ACTUALIZADO CON EXITO";
    const ERROR = "ERROR";


    public static function getMensaje($codigo){
        switch ($codigo){
            case Emensajes::CORRECTO:
                return new Response(1, "Se a realizado la operacion de manera correcta");
            case Emensajes::INSERTADO:
                return new Response(1, "Se a insertado la operacion de manera correcta");
            case Emensajes::ELIMINADO:
                return new Response(1, "Se a ELIMINADO la operacion de manera correcta");
            case Emensajes::BUSCADO:
                return new Response(1, "Se a BUSCADO la operacion de manera correcta");
            case Emensajes::ACTUALIZADO:
                return new Response(1, "Se a ACTUALIZADO la operacion de manera correcta");
            case Emensajes::ERROR:
                return new Response(-1, "Se a producido un ERROR EN la operacion");
        }
    }


}