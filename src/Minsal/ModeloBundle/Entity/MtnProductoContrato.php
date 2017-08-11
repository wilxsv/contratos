<?php

namespace Minsal\ModeloBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MtnProductoContrato
 *
 * @ORM\Table(name="mtn_producto_contrato", indexes={@ORM\Index(name="fki_mtn_proveedor", columns={"mtn_proveedor"}), @ORM\Index(name="fki_mtn_producto", columns={"mtn_producto"}), @ORM\Index(name="fki_mtn_contrato", columns={"mtn_contrato"}), @ORM\Index(name="idx_11667261736a527d", columns={"mtn_establecimiento"})})
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
     * @ORM\Column(name="mtn_contrato", type="integer", nullable=true)
     */
    private $mtnContrato;

    /**
     * @var string
     *
     * @ORM\Column(name="cantidad", type="decimal", precision=16, scale=4, nullable=true)
     */
    private $cantidad;

    /**
     * @var string
     *
     * @ORM\Column(name="precio_unitario", type="decimal", precision=8, scale=2, nullable=true)
     */
    private $precioUnitario;

    /**
     * @var \CtlProducto
     *
     * @ORM\ManyToOne(targetEntity="CtlProducto")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="mtn_producto", referencedColumnName="id")
     * })
     */
    private $mtnProducto;

    /**
     * @var \CtlProveedor
     *
     * @ORM\ManyToOne(targetEntity="CtlProveedor")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="mtn_proveedor", referencedColumnName="id")
     * })
     */
    private $mtnProveedor;

    /**
     * @var \CtlEstablecimiento
     *
     * @ORM\ManyToOne(targetEntity="CtlEstablecimiento")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="mtn_establecimiento", referencedColumnName="id")
     * })
     */
    private $mtnEstablecimiento;



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

    /**
     * Set mtnEstablecimiento
     *
     * @param \Minsal\ModeloBundle\Entity\CtlEstablecimiento $mtnEstablecimiento
     *
     * @return MtnProductoContrato
     */
    public function setMtnEstablecimiento(\Minsal\ModeloBundle\Entity\CtlEstablecimiento $mtnEstablecimiento = null)
    {
        $this->mtnEstablecimiento = $mtnEstablecimiento;

        return $this;
    }

    /**
     * Get mtnEstablecimiento
     *
     * @return \Minsal\ModeloBundle\Entity\CtlEstablecimiento
     */
    public function getMtnEstablecimiento()
    {
        return $this->mtnEstablecimiento;
    }
}
