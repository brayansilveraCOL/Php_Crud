<?php
class tipoIdentificacion extends Generic{
    protected $id;
    protected $tipo_id;
    protected $fecha_registro;

    public function __construct($propiedades = null)
    {
        parent::__construct("tipo_identi", tipoIdentificacion::class, $propiedades);
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
    public function getTipoId()
    {
        return $this->tipo_id;
    }

    /**
     * @param mixed $tipo_id
     */
    public function setTipoId($tipo_id)
    {
        $this->tipo_id = $tipo_id;
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