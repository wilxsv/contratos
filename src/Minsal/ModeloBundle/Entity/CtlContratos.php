<?php

namespace Minsal\ModeloBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CtlContratos
 */
class CtlContratos
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $numeroContrato;

    /**
     * @var string
     */
    private $numeroModalidadCompra;

    /**
     * @var string
     */
    private $montoContrato;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set numeroContrato
     *
     * @param string $numeroContrato
     * @return CtlContratos
     */
    public function setNumeroContrato($numeroContrato)
    {
        $this->numeroContrato = $numeroContrato;

        return $this;
    }

    /**
     * Get numeroContrato
     *
     * @return string 
     */
    public function getNumeroContrato()
    {
        return $this->numeroContrato;
    }

    /**
     * Set numeroModalidadCompra
     *
     * @param string $numeroModalidadCompra
     * @return CtlContratos
     */
    public function setNumeroModalidadCompra($numeroModalidadCompra)
    {
        $this->numeroModalidadCompra = $numeroModalidadCompra;

        return $this;
    }

    /**
     * Get numeroModalidadCompra
     *
     * @return string 
     */
    public function getNumeroModalidadCompra()
    {
        return $this->numeroModalidadCompra;
    }

    /**
     * Set montoContrato
     *
     * @param string $montoContrato
     * @return CtlContratos
     */
    public function setMontoContrato($montoContrato)
    {
        $this->montoContrato = $montoContrato;

        return $this;
    }

    /**
     * Get montoContrato
     *
     * @return string 
     */
    public function getMontoContrato()
    {
        return $this->montoContrato;
    }
}
