<?php
class usuario extends Generic {
    protected $id;
    protected $nombres;
    protected $apellidos;
    protected $correo;
    protected $estado;
    protected $identificacion;
    protected $contrasena;
    protected $fecha_registro;
    protected $id_ciudad;
    protected $id_tipoidenti;

    public function __construct($propiedades = null)
    {
        parent::__construct("usuario", usuario::class, $propiedades);
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
    public function getNombres()
    {
        return $this->nombres;
    }

    /**
     * @param mixed $nombres
     */
    public function setNombres($nombres)
    {
        $this->nombres = $nombres;
    }

    /**
     * @return mixed
     */
    public function getApellidos()
    {
        return $this->apellidos;
    }

    /**
     * @param mixed $apellidos
     */
    public function setApellidos($apellidos)
    {
        $this->apellidos = $apellidos;
    }

    /**
     * @return mixed
     */
    public function getCorreo()
    {
        return $this->correo;
    }

    /**
     * @param mixed $correo
     */
    public function setCorreo($correo)
    {
        $this->correo = $correo;
    }

    /**
     * @return mixed
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * @param mixed $estado
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;
    }

    /**
     * @return mixed
     */
    public function getIdentificacion()
    {
        return $this->identificacion;
    }

    /**
     * @param mixed $identificacion
     */
    public function setIdentificacion($identificacion)
    {
        $this->identificacion = $identificacion;
    }

    /**
     * @return mixed
     */
    public function getContrasena($contrasena)
    {
        return $this->contrasena;
    }

    /**
     * @param mixed $contrasena
     */
    public function setContrasena($contrasena)
    {
        $this->contrasena = $contrasena;
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

    /**
     * @return mixed
     */
    public function getIdCiudad()
    {
        return $this->id_ciudad;
    }

    /**
     * @param mixed $id_ciudad
     */
    public function setIdCiudad($id_ciudad)
    {
        $this->id_ciudad = $id_ciudad;
    }

    /**
     * @return mixed
     */
    public function getIdTipoidenti()
    {
        return $this->id_tipoidenti;
    }

    /**
     * @param mixed $id_tipoidenti
     */
    public function setIdTipoidenti($id_tipoidenti)
    {
        $this->id_tipoidenti = $id_tipoidenti;
    }


}