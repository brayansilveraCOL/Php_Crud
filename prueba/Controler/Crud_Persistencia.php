<?php
require_once "../Modelo/Conexion.php";

class Crud{
    protected $tabla;
    protected $conexion; //Objeto PDO
    protected $where = "";
    protected $sql = null;

    public function __construct($tabla=null)
    {
        $this->conexion = (new Conexion())->conectar(); //Se crea una instancia de la clase Conexion
                                                        // Se llama al metodo conectar y  se le asigna
                                                        // a la varable conexion local que tendra su estado
       $this->tabla = $tabla; //Instanciamos el atributo tabla
    }
    // Consultar los datos de cualquier tabla Generic
    public function get(){
        try {
            //Se crea la consulta y se la asigna a la variable sql
            $this->sql = "SELECT * FROM {$this->tabla} {$this->where}";
            $std = $this->conexion->prepare($this->sql); // Se crea la variable invocamos la conexion invocamos el metodo prepare se pasa la consulta
            $std->execute();             //Ejecuta la transaccion anterior// se hace referencia a la instancia  de la transacion de preprare y ejecutamos el metodo execute
            return $std->fetchAll(PDO::FETCH_OBJ); //Organiza la data en objetos, obtenemos un arreglo con la data
        }catch (Exception $exception){
            $exception->getTraceAsString();
        }
    }

    public function first(){
        $lista = $this->get();
        if(count($lista)>0){
            return $lista[0];
        }else{
            return null;
        }
    }

    public function insert($obj){
        try {
            $campos = implode("`, `", array_keys($obj)); // recibimos el obejto el implode no genera una estructura  como esta `nombre`, `edad` arrey_keys solo obtiene los keys de los objetos osea nombre: edad:
            $valores = ":" . implode(", :", array_keys($obj));//Nos genera la siguiente estructura :nombre, :edad
            $this->sql = "INSERT INTO {$this->tabla} (`{$campos}`) VALUES ({$valores})";
            $this->ejecutar($obj);
            $id = $this->conexion->lastInsertId(); //se obtiene el ID del objeto
            return $id;
        }catch (Exception $exception){
            $exception->getTraceAsString();
        }
    }

    private function ejecutar($obj=null){
        $std = $this->conexion->prepare($this->sql); //Se prepara la consulta
        if($obj !== null){ //verifica si el objeto viene vacio
            foreach ($obj as $llave=>$valor){ //se itera cuantas keys tenga el objeto
                    if(empty($valor)){    //si el objeto viene vacio se  setea en null
                        $valor=null;
                    }
                    $std->bindValue(":$llave", $valor); // replace de los array_keys
            }
        }
        $std->execute(); // Se ejecuta la consulta
        $this->reinicia();

        return $std->rowCount();  // retornar el numero de las filas que fueron afectadas

    }

    //setea los valores

    private function reinicia (){
        $this->where = "";
        $this->sql=null;
    }

    public function update($obj){
        try {
            $campos =""; // aca se guarda las keys ya formateadas
            foreach ($obj as $llave=>$valor){ //se itera el objeto con sus llaves y valor
                $campos .= "`$llave`=:$llave,"; //`nombres`=:nombres,`edad`=:edad,  se concatena las llaves
            }
            $campos =rtrim($campos, ","); //se limpia el string de la ulima coma que guarda campos se limpia la consulta
            $this->sql = "UPDATE {$this->tabla} SET {$campos} {$this->where}";
            $filasafectas = $this->ejecutar($obj);
            return $filasafectas;
        }catch (Exception $ex){
            $ex->getTraceAsString();
        }
    }
    public function delete() {
        try {
            $this->sql = "DELETE FROM {$this->tabla} {$this->where}"; // se realiza la consulta
            $filesAfectadas = $this->ejecutar(); // Filas afectadas
            return $filesAfectadas;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function where($llave, $condicion, $valor) {
        $this->where .= (strpos($this->where, "WHERE")) ? " AND " : " WHERE "; //Validar si en la sentencia ya existe la palabra where concatenar el AND si no declare WHERE
        $this->where .= "`$llave` $condicion " . ((is_string($valor)) ? "\"$valor\"" : $valor) . " ";// pasamos la sentencia a ejecutar nombre del campo la condicion y evaluamos si el valor ess un string para concatenar las comillas dobles y si no pasar el valor en bruto si es entero
        return $this;
    }

    public function orWhere($llave, $condicion, $valor) {
        $this->where .= (strpos($this->where, "WHERE")) ? " OR " : " WHERE ";
        $this->where .= "`$llave` $condicion " . ((is_string($valor)) ? "\"$valor\"" : $valor) . " ";
        return $this;
    }
}