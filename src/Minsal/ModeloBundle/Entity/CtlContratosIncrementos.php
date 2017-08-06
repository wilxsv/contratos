<?php

namespace Minsal\ModeloBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CtlContratosIncrementos
 *
 * @ORM\Table(name="ctl_contratos_incrementos")
 * @ORM\Entity
 */
class CtlContratosIncrementos
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="ctl_contratos_incrementos_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_producto", type="integer", nullable=true)
     */
    private $idProducto;

    /**
     * @var integer
     *
     * @ORM\Column(name="cantidad_incrementar", type="integer", nullable=true)
     */
    private $cantidadIncrementar;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_contrato", type="integer", nullable=true)
     */
    private $idContrato;

    /**
     * @var string
     *
     * @ORM\Column(name="monto_incrementar", type="decimal", precision=10, scale=0, nullable=true)
     */
    private $montoIncrementar;



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
     * Set idProducto
     *
     * @param integer $idProducto
     *
     * @return CtlContratosIncrementos
     */
    public function setIdProducto($idProducto)
    {
        $this->idProducto = $idProducto;

        return $this;
    }

    /**
     * Get idProducto
     *
     * @return integer
     */
    public function getIdProducto()
    {
        return $this->idProducto;
    }

    /**
     * Set cantidadIncrementar
     *
     * @param integer $cantidadIncrementar
     *
     * @return CtlContratosIncrementos
     */
    public function setCantidadIncrementar($cantidadIncrementar)
    {
        $this->cantidadIncrementar = $cantidadIncrementar;

        return $this;
    }

    /**
     * Get cantidadIncrementar
     *
     * @return integer
     */
    public function getCantidadIncrementar()
    {
        return $this->cantidadIncrementar;
    }

    /**
     * Set idContrato
     *
     * @param integer $idContrato
     *
     * @return CtlContratosIncrementos
     */
    public function setIdContrato($idContrato)
    {
        $this->idContrato = $idContrato;

        return $this;
    }

    /**
     * Get idContrato
     *
     * @return integer
     */
    public function getIdContrato()
    {
        return $this->idContrato;
    }

    /**
     * Set montoIncrementar
     *
     * @param string $montoIncrementar
     *
     * @return CtlContratosIncrementos
     */
    public function setMontoIncrementar($montoIncrementar)
    {
        $this->montoIncrementar = $montoIncrementar;

        return $this;
    }

    /**
     * Get montoIncrementar
     *
     * @return string
     */
    public function getMontoIncrementar()
    {
        return $this->montoIncrementar;
    }
}
