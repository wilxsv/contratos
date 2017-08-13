<?php

namespace Minsal\ModeloBundle\Entity;

/**
 * CtlProveedor
 */
class CtlProveedor
{
    /**
     * @var string
     */
    private $codigoProveedor;

    /**
     * @var string
     */
    private $nombreProveedor;

    /**
     * @var integer
     */
    private $estadoProveedor;

    /**
     * @var string
     */
    private $nit;

    /**
     * @var integer
     */
    private $id;


    /**
     * Set codigoProveedor
     *
     * @param string $codigoProveedor
     *
     * @return CtlProveedor
     */
    public function setCodigoProveedor($codigoProveedor)
    {
        $this->codigoProveedor = $codigoProveedor;

        return $this;
    }

    /**
     * Get codigoProveedor
     *
     * @return string
     */
    public function getCodigoProveedor()
    {
        return $this->codigoProveedor;
    }

    /**
     * Set nombreProveedor
     *
     * @param string $nombreProveedor
     *
     * @return CtlProveedor
     */
    public function setNombreProveedor($nombreProveedor)
    {
        $this->nombreProveedor = $nombreProveedor;

        return $this;
    }

    /**
     * Get nombreProveedor
     *
     * @return string
     */
    public function getNombreProveedor()
    {
        return $this->nombreProveedor;
    }

    /**
     * Set estadoProveedor
     *
     * @param integer $estadoProveedor
     *
     * @return CtlProveedor
     */
    public function setEstadoProveedor($estadoProveedor)
    {
        $this->estadoProveedor = $estadoProveedor;

        return $this;
    }

    /**
     * Get estadoProveedor
     *
     * @return integer
     */
    public function getEstadoProveedor()
    {
        return $this->estadoProveedor;
    }

    /**
     * Set nit
     *
     * @param string $nit
     *
     * @return CtlProveedor
     */
    public function setNit($nit)
    {
        $this->nit = $nit;

        return $this;
    }

    /**
     * Get nit
     *
     * @return string
     */
    public function getNit()
    {
        return $this->nit;
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }
}

