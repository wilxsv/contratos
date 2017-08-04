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
     * @var string
     *
     * @ORM\Column(name="numero_compra", type="string", length=255, nullable=true)
     */
    private $numeroCompra;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_contrato", type="integer", nullable=true)
     */
    private $idContrato;

    /**
     * @var string
     *
     * @ORM\Column(name="numero_contrato", type="string", length=100, nullable=true)
     */
    private $numeroContrato;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_proveedor", type="integer", nullable=true)
     */
    private $idProveedor;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre_proveedor", type="string", length=255, nullable=true)
     */
    private $nombreProveedor;

    /**
     * @var string
     *
     * @ORM\Column(name="codigo_producto", type="string", length=100, nullable=true)
     */
    private $codigoProducto;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre_producto", type="string", length=255, nullable=true)
     */
    private $nombreProducto;

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
     * @ORM\Column(name="monto_contrato_incrementado", type="decimal", precision=8, scale=2, nullable=true)
     */
    private $montoContratoIncrementado;

    /**
     * @var string
     *
     * @ORM\Column(name="observacion", type="text", nullable=true)
     */
    private $observacion;

    /**
     * @var integer
     *
     * @ORM\Column(name="estado_producto", type="integer", nullable=true)
     */
    private $estadoProducto;



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
     * @param string $numeroCompra
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
     * @return string
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
     * Set numeroContrato
     *
     * @param string $numeroContrato
     *
     * @return CtlAnalisisIncremento
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
     * Set nombreProveedor
     *
     * @param string $nombreProveedor
     *
     * @return CtlAnalisisIncremento
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
     * Set codigoProducto
     *
     * @param string $codigoProducto
     *
     * @return CtlAnalisisIncremento
     */
    public function setCodigoProducto($codigoProducto)
    {
        $this->codigoProducto = $codigoProducto;

        return $this;
    }

    /**
     * Get codigoProducto
     *
     * @return string
     */
    public function getCodigoProducto()
    {
        return $this->codigoProducto;
    }

    /**
     * Set nombreProducto
     *
     * @param string $nombreProducto
     *
     * @return CtlAnalisisIncremento
     */
    public function setNombreProducto($nombreProducto)
    {
        $this->nombreProducto = $nombreProducto;

        return $this;
    }

    /**
     * Get nombreProducto
     *
     * @return string
     */
    public function getNombreProducto()
    {
        return $this->nombreProducto;
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
     * Set montoContratoIncrementado
     *
     * @param string $montoContratoIncrementado
     *
     * @return CtlAnalisisIncremento
     */
    public function setMontoContratoIncrementado($montoContratoIncrementado)
    {
        $this->montoContratoIncrementado = $montoContratoIncrementado;

        return $this;
    }

    /**
     * Get montoContratoIncrementado
     *
     * @return string
     */
    public function getMontoContratoIncrementado()
    {
        return $this->montoContratoIncrementado;
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

    /**
     * Set estadoProducto
     *
     * @param integer $estadoProducto
     *
     * @return CtlAnalisisIncremento
     */
    public function setEstadoProducto($estadoProducto)
    {
        $this->estadoProducto = $estadoProducto;

        return $this;
    }

    /**
     * Get estadoProducto
     *
     * @return integer
     */
    public function getEstadoProducto()
    {
        return $this->estadoProducto;
    }
}
