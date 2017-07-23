<?php

namespace Minsal\ModeloBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MtnProductoContrato
 *
 * @ORM\Table(name="mtn_producto_contrato", indexes={@ORM\Index(name="idx_116672617def239f", columns={"mtn_id_contrato"}), @ORM\Index(name="idx_11667261bc3d40a9", columns={"mtn_id_producto"})})
 * @ORM\Entity
 */
class MtnProductoContrato
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="mtn_producto_contrato_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="mtn_id_contrato", type="bigint", nullable=true)
     */
    private $mtnIdContrato;

    /**
     * @var integer
     *
     * @ORM\Column(name="renglon", type="integer", nullable=false)
     */
    private $renglon;

    /**
     * @var integer
     *
     * @ORM\Column(name="cantidad", type="integer", nullable=false)
     */
    private $cantidad;

    /**
     * @var string
     *
     * @ORM\Column(name="precio_unitario", type="decimal", precision=16, scale=8, nullable=false)
     */
    private $precioUnitario;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion_proveedor", type="string", length=100, nullable=false)
     */
    private $descripcionProveedor;

    /**
     * @var \CtlProducto
     *
     * @ORM\ManyToOne(targetEntity="CtlProducto")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="mtn_id_producto", referencedColumnName="id")
     * })
     */
    private $mtnProducto;



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
     * Set mtnIdContrato
     *
     * @param integer $mtnIdContrato
     * @return MtnProductoContrato
     */
    public function setMtnIdContrato($mtnIdContrato)
    {
        $this->mtnIdContrato = $mtnIdContrato;

        return $this;
    }

    /**
     * Get mtnIdContrato
     *
     * @return integer 
     */
    public function getMtnIdContrato()
    {
        return $this->mtnIdContrato;
    }

    /**
     * Set renglon
     *
     * @param integer $renglon
     * @return MtnProductoContrato
     */
    public function setRenglon($renglon)
    {
        $this->renglon = $renglon;

        return $this;
    }

    /**
     * Get renglon
     *
     * @return integer 
     */
    public function getRenglon()
    {
        return $this->renglon;
    }

    /**
     * Set cantidad
     *
     * @param integer $cantidad
     * @return MtnProductoContrato
     */
    public function setCantidad($cantidad)
    {
        $this->cantidad = $cantidad;

        return $this;
    }

    /**
     * Get cantidad
     *
     * @return integer 
     */
    public function getCantidad()
    {
        return $this->cantidad;
    }

    /**
     * Set precioUnitario
     *
     * @param string $precioUnitario
     * @return MtnProductoContrato
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
     * Set descripcionProveedor
     *
     * @param string $descripcionProveedor
     * @return MtnProductoContrato
     */
    public function setDescripcionProveedor($descripcionProveedor)
    {
        $this->descripcionProveedor = $descripcionProveedor;

        return $this;
    }

    /**
     * Get descripcionProveedor
     *
     * @return string 
     */
    public function getDescripcionProveedor()
    {
        return $this->descripcionProveedor;
    }

    /**
     * Set mtnProducto
     *
     * @param \Minsal\ModeloBundle\Entity\CtlProducto $mtnProducto
     * @return MtnProductoContrato
     */
    public function setMtnProducto(\Minsal\ModeloBundle\Entity\CtlProducto $mtnProducto = null)
    {
        $this->mtnProducto = $mtnProducto;

        return $this;
    }

    /**
     * Get mtnProducto
     *
     * @return \Minsal\ModeloBundle\Entity\CtlProducto 
     */
    public function getMtnProducto()
    {
        return $this->mtnProducto;
    }
}
