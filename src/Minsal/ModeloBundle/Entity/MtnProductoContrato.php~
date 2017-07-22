<?php

namespace Minsal\ModeloBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MtnProductoContrato
 *
 * @ORM\Table(name="mtn_producto_contrato", indexes={@ORM\Index(name="IDX_1166726152511505", columns={"mtn_id_almacen"}), @ORM\Index(name="IDX_11667261BC3D40A9", columns={"mtn_id_producto"}), @ORM\Index(name="IDX_116672617DEF239F", columns={"mtn_id_contrato"})})
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
     * @var \CtlAlmacen
     *
     * @ORM\ManyToOne(targetEntity="CtlAlmacen")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="mtn_id_almacen", referencedColumnName="id")
     * })
     */
    private $mtnAlmacen;

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
     * @var \CtlContrato
     *
     * @ORM\ManyToOne(targetEntity="CtlContrato")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="mtn_id_contrato", referencedColumnName="id")
     * })
     */
    private $mtnContrato;



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
     * Set mtnAlmacen
     *
     * @param \Minsal\ModeloBundle\Entity\CtlAlmacen $mtnAlmacen
     * @return MtnProductoContrato
     */
    public function setMtnAlmacen(\Minsal\ModeloBundle\Entity\CtlAlmacen $mtnAlmacen = null)
    {
        $this->mtnAlmacen = $mtnAlmacen;

        return $this;
    }

    /**
     * Get mtnAlmacen
     *
     * @return \Minsal\ModeloBundle\Entity\CtlAlmacen 
     */
    public function getMtnAlmacen()
    {
        return $this->mtnAlmacen;
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

    /**
     * Set mtnContrato
     *
     * @param \Minsal\ModeloBundle\Entity\CtlContrato $mtnContrato
     * @return MtnProductoContrato
     */
    public function setMtnContrato(\Minsal\ModeloBundle\Entity\CtlContrato $mtnContrato = null)
    {
        $this->mtnContrato = $mtnContrato;

        return $this;
    }

    /**
     * Get mtnContrato
     *
     * @return \Minsal\ModeloBundle\Entity\CtlContrato 
     */
    public function getMtnContrato()
    {
        return $this->mtnContrato;
    }
}
