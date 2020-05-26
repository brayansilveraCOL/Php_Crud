<?php
class ciudades extends Generic{
    protected $id;
    protected $nombre;
    protected $fecha_registro;

    public function __construct($propiedades = null)
    {
        parent::__construct("ciudades", ciudades::class, $propiedades);
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * @param mixed $nombre
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    /**
     * @return mixed
     */
    public function getFechaRegistro()
    {
        return $this->fecha_registro;
    }

    /**
     * @param mixed $fecha_registro
     */
    public function setFechaRegistro($fecha_registro)
    {
        $this->fecha_registro = $fecha_registro;
    }

}
