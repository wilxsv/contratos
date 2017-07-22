<?php

namespace Minsal\ModeloBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MtnProductoContrato
 *
 * @ORM\Table(name="mtn_producto_contrato", indexes={@ORM\Index(name="id_establecimiento", columns={"mtn_id_establecimiento", "mtn_id_contrato", "mtn_id_proveedor", "mtn_id_producto", "mtn_id_unidad_medida", "mtn_id_almacen"}), @ORM\Index(name="mtn_id_producto", columns={"mtn_id_producto"}), @ORM\Index(name="mtn_id_almacen", columns={"mtn_id_almacen"}), @ORM\Index(name="idx_1166726113ce8877", columns={"mtn_id_establecimiento"}), @ORM\Index(name="mtn_id_unidad_medida", columns={"mtn_id_unidad_medida"}), @ORM\Index(name="mtn_id_proveedor", columns={"mtn_id_proveedor"}), @ORM\Index(name="mtn_id_contrato", columns={"mtn_id_contrato"})})
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
     * @var \CtlProducto
     *
     * @ORM\ManyToOne(targetEntity="CtlProducto")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="mtn_id_producto", referencedColumnName="id")
     * })
     */
    private $mtnProducto;

    /**
     * @var \CtlProveedor
     *
     * @ORM\ManyToOne(targetEntity="CtlProveedor")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="mtn_id_proveedor", referencedColumnName="id")
     * })
     */
    private $mtnProveedor;

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
     * @var \CtlEstablecimiento
     *
     * @ORM\ManyToOne(targetEntity="CtlEstablecimiento")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="mtn_id_establecimiento", referencedColumnName="id")
     * })
     */
    private $mtnEstablecimiento;

    /**
     * @var \CtlUnidadMedida
     *
     * @ORM\ManyToOne(targetEntity="CtlUnidadMedida")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="mtn_id_unidad_medida", referencedColumnName="id")
     * })
     */
    private $mtnUnidadMedida;

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
     * Set mtnProveedor
     *
     * @param \Minsal\ModeloBundle\Entity\CtlProveedor $mtnProveedor
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

    /**
     * Set mtnEstablecimiento
     *
     * @param \Minsal\ModeloBundle\Entity\CtlEstablecimiento $mtnEstablecimiento
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

    /**
     * Set mtnUnidadMedida
     *
     * @param \Minsal\ModeloBundle\Entity\CtlUnidadMedida $mtnUnidadMedida
     * @return MtnProductoContrato
     */
    public function setMtnUnidadMedida(\Minsal\ModeloBundle\Entity\CtlUnidadMedida $mtnUnidadMedida = null)
    {
        $this->mtnUnidadMedida = $mtnUnidadMedida;

        return $this;
    }

    /**
     * Get mtnUnidadMedida
     *
     * @return \Minsal\ModeloBundle\Entity\CtlUnidadMedida 
     */
    public function getMtnUnidadMedida()
    {
        return $this->mtnUnidadMedida;
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
}
