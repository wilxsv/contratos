<?php

namespace Minsal\ModeloBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MtnProductoContrato
 *
 * @ORM\Table(name="mtn_producto_contrato", indexes={@ORM\Index(name="fki_fk-estab", columns={"id_establecimiento_sinab"}), @ORM\Index(name="fki_prov", columns={"mtn_proveedor"}), @ORM\Index(name="idx_11667261bc3d40a9", columns={"mtn_producto"}), @ORM\Index(name="idx_116672617def239f", columns={"mtn_contrato"})})
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
     * @var \CtlEstablecimiento
     *
     * @ORM\ManyToOne(targetEntity="CtlEstablecimiento")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_establecimiento_sinab", referencedColumnName="establecimiento_id")
     * })
     */
    private $idEstablecimientoSinab;

    /**
     * @var \CtlProducto
     *
     * @ORM\ManyToOne(targetEntity="CtlProducto")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="mtn_producto", referencedColumnName="id_producto_sibasi")
     * })
     */
    private $mtnProducto;

    /**
     * @var \CtlProveedor
     *
     * @ORM\ManyToOne(targetEntity="CtlProveedor")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="mtn_proveedor", referencedColumnName="id_proveedor_sinab")
     * })
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
     * Set idEstablecimientoSinab
     *
     * @param \Minsal\ModeloBundle\Entity\CtlEstablecimiento $idEstablecimientoSinab
     *
     * @return MtnProductoContrato
     */
    public function setIdEstablecimientoSinab(\Minsal\ModeloBundle\Entity\CtlEstablecimiento $idEstablecimientoSinab = null)
    {
        $this->idEstablecimientoSinab = $idEstablecimientoSinab;

        return $this;
    }

    /**
     * Get idEstablecimientoSinab
     *
     * @return \Minsal\ModeloBundle\Entity\CtlEstablecimiento
     */
    public function getIdEstablecimientoSinab()
    {
        return $this->idEstablecimientoSinab;
    }

    /**
     * Set mtnProducto
     *
     * @param \Minsal\ModeloBundle\Entity\CtlProducto $mtnProducto
     *
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

    /**
     * Set mtnProveedor
     *
     * @param \Minsal\ModeloBundle\Entity\CtlProveedor $mtnProveedor
     *
     * @return MtnProductoContrato
     */
    public function setMtnProveedor(\Minsal\ModeloBundle\Entity\CtlProveedor $mtnProveedor = null)
    {
        $this->mtnProveedor = $mtnProveedor;

        return $this;
    }

    /**
     * Get mtnProveedor
     *
     * @return \Minsal\ModeloBundle\Entity\CtlProveedor
     */
    public function getMtnProveedor()
    {
        return $this->mtnProveedor;
    }
}
