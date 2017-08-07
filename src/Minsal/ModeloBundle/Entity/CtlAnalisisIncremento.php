<?php

namespace Minsal\ModeloBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CtlAnalisisIncremento
 *
 * @ORM\Table(name="ctl_analisis_incremento")
 * @ORM\Entity
 */
class CtlAnalisisIncremento
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="ctl_analisis_incremento_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_incremento", type="integer", nullable=true)
     */
    private $idIncremento;

    /**
     * @var integer
     *
     * @ORM\Column(name="numero_compra", type="integer", nullable=true)
     */
    private $numeroCompra;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_contrato", type="integer", nullable=true)
     */
    private $idContrato;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_proveedor", type="integer", nullable=true)
     */
    private $idProveedor;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_producto", type="integer", nullable=true)
     */
    private $idProducto;

    /**
     * @var integer
     *
     * @ORM\Column(name="cantidad_incrementada", type="integer", nullable=true)
     */
    private $cantidadIncrementada;

    /**
     * @var string
     *
     * @ORM\Column(name="precio_unitario", type="decimal", precision=8, scale=2, nullable=true)
     */
    private $precioUnitario;

    /**
     * @var string
     *
     * @ORM\Column(name="monto_incrementado", type="decimal", precision=8, scale=2, nullable=true)
     */
    private $montoIncrementado;

    /**
     * @var string
     *
     * @ORM\Column(name="observacion", type="text", nullable=true)
     */
    private $observacion;



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
     * Set idIncremento
     *
     * @param integer $idIncremento
     *
     * @return CtlAnalisisIncremento
     */
    public function setIdIncremento($idIncremento)
    {
        $this->idIncremento = $idIncremento;

        return $this;
    }

    /**
     * Get idIncremento
     *
     * @return integer
     */
    public function getIdIncremento()
    {
        return $this->idIncremento;
    }

    /**
     * Set numeroCompra
     *
     * @param integer $numeroCompra
     *
     * @return CtlAnalisisIncremento
     */
    public function setNumeroCompra($numeroCompra)
    {
        $this->numeroCompra = $numeroCompra;

        return $this;
    }

    /**
     * Get numeroCompra
     *
     * @return integer
     */
    public function getNumeroCompra()
    {
        return $this->numeroCompra;
    }

    /**
     * Set idContrato
     *
     * @param integer $idContrato
     *
     * @return CtlAnalisisIncremento
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
     * Set idProveedor
     *
     * @param integer $idProveedor
     *
     * @return CtlAnalisisIncremento
     */
    public function setIdProveedor($idProveedor)
    {
        $this->idProveedor = $idProveedor;

        return $this;
    }

    /**
     * Get idProveedor
     *
     * @return integer
     */
    public function getIdProveedor()
    {
        return $this->idProveedor;
    }

    /**
     * Set idProducto
     *
     * @param integer $idProducto
     *
     * @return CtlAnalisisIncremento
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
     * Set cantidadIncrementada
     *
     * @param integer $cantidadIncrementada
     *
     * @return CtlAnalisisIncremento
     */
    public function setCantidadIncrementada($cantidadIncrementada)
    {
        $this->cantidadIncrementada = $cantidadIncrementada;

        return $this;
    }

    /**
     * Get cantidadIncrementada
     *
     * @return integer
     */
    public function getCantidadIncrementada()
    {
        return $this->cantidadIncrementada;
    }

    /**
     * Set precioUnitario
     *
     * @param string $precioUnitario
     *
     * @return CtlAnalisisIncremento
     */
    public function setPrecioUnitario($precioUnitario)
    {
        $this->precioUnitario = $precioUnitario;

        return $this;
    }

    /**
     * Get precioUnitario
     *
     * @return string
     */
    public function getPrecioUnitario()
    {
        return $this->precioUnitario;
    }

    /**
     * Set montoIncrementado
     *
     * @param string $montoIncrementado
     *
     * @return CtlAnalisisIncremento
     */
    public function setMontoIncrementado($montoIncrementado)
    {
        $this->montoIncrementado = $montoIncrementado;

        return $this;
    }

    /**
     * Get montoIncrementado
     *
     * @return string
     */
    public function getMontoIncrementado()
    {
        return $this->montoIncrementado;
    }

    /**
     * Set observacion
     *
     * @param string $observacion
     *
     * @return CtlAnalisisIncremento
     */
    public function setObservacion($observacion)
    {
        $this->observacion = $observacion;

        return $this;
    }

    /**
     * Get observacion
     *
     * @return string
     */
    public function getObservacion()
    {
        return $this->observacion;
    }
}
