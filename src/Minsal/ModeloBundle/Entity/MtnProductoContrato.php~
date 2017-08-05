<?php

namespace Minsal\ModeloBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MtnProductoContrato
 *
 * @ORM\Table(name="mtn_producto_contrato", indexes={@ORM\Index(name="idx_116672617def239f", columns={"mtn_contrato"}), @ORM\Index(name="idx_11667261bc3d40a9", columns={"mtn_producto"})})
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
     * @ORM\Column(name="mtn_producto", type="integer", nullable=true)
     */
    private $mtnProducto;

    /**
     * @var integer
     *
     * @ORM\Column(name="mtn_contrato", type="bigint", nullable=true)
     */
    private $mtnContrato;

    /**
     * @var string
     *
     * @ORM\Column(name="cantidad", type="decimal", precision=10, scale=0, nullable=false)
     */
    private $cantidad;

    /**
     * @var string
     *
     * @ORM\Column(name="precio_unitario", type="decimal", precision=16, scale=8, nullable=false)
     */
    private $precioUnitario;

    /**
     * @var integer
     *
     * @ORM\Column(name="mtn_proveedor", type="integer", nullable=true)
     */
    private $mtnProveedor;



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
     * Set mtnProducto
     *
     * @param integer $mtnProducto
     *
     * @return MtnProductoContrato
     */
    public function setMtnProducto($mtnProducto)
    {
        $this->mtnProducto = $mtnProducto;

        return $this;
    }

    /**
     * Get mtnProducto
     *
     * @return integer
     */
    public function getMtnProducto()
    {
        return $this->mtnProducto;
    }

    /**
     * Set mtnContrato
     *
     * @param integer $mtnContrato
     *
     * @return MtnProductoContrato
     */
    public function setMtnContrato($mtnContrato)
    {
        $this->mtnContrato = $mtnContrato;

        return $this;
    }

    /**
     * Get mtnContrato
     *
     * @return integer
     */
    public function getMtnContrato()
    {
        return $this->mtnContrato;
    }

    /**
     * Set cantidad
     *
     * @param string $cantidad
     *
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
     * @return string
     */
    public function getCantidad()
    {
        return $this->cantidad;
    }

    /**
     * Set precioUnitario
     *
     * @param string $precioUnitario
     *
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
     * Set mtnProveedor
     *
     * @param integer $mtnProveedor
     *
     * @return MtnProductoContrato
     */
    public function setMtnProveedor($mtnProveedor)
    {
        $this->mtnProveedor = $mtnProveedor;

        return $this;
    }

    /**
     * Get mtnProveedor
     *
     * @return integer
     */
    public function getMtnProveedor()
    {
        return $this->mtnProveedor;
    }
}
