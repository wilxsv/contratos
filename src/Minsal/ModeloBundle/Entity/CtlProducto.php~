<?php

namespace Minsal\ModeloBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CtlProducto
 *
 * @ORM\Table(name="ctl_producto", uniqueConstraints={@ORM\UniqueConstraint(name="id_sinab", columns={"id_producto_sibasi"})}, indexes={@ORM\Index(name="fki_um", columns={"unidad_medida_producto"})})
 * @ORM\Entity
 */
class CtlProducto
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="ctl_producto_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="codigo_producto", type="string", length=50, nullable=false)
     */
    private $codigoProducto;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre_producto", type="string", length=255, nullable=false)
     */
    private $nombreProducto;

    /**
     * @var string
     *
     * @ORM\Column(name="estado_producto", type="string", length=50, nullable=true)
     */
    private $estadoProducto;

    /**
     * @var string
     *
     * @ORM\Column(name="producto_concentracion", type="string", length=255, nullable=true)
     */
    private $productoConcentracion;

    /**
     * @var string
     *
     * @ORM\Column(name="producto_presentacion", type="string", length=255, nullable=true)
     */
    private $productoPresentacion;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_producto_sibasi", type="integer", nullable=false)
     */
    private $idProductoSibasi;

    /**
     * @var \CtlUnidadMedida
     *
     * @ORM\ManyToOne(targetEntity="CtlUnidadMedida")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="unidad_medida_producto", referencedColumnName="id")
     * })
     */
    private $unidadMedidaProducto;



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
     * Set codigoProducto
     *
     * @param string $codigoProducto
     *
     * @return CtlProducto
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
     * @return CtlProducto
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
     * Set estadoProducto
     *
     * @param string $estadoProducto
     *
     * @return CtlProducto
     */
    public function setEstadoProducto($estadoProducto)
    {
        $this->estadoProducto = $estadoProducto;

        return $this;
    }

    /**
     * Get estadoProducto
     *
     * @return string
     */
    public function getEstadoProducto()
    {
        return $this->estadoProducto;
    }

    /**
     * Set productoConcentracion
     *
     * @param string $productoConcentracion
     *
     * @return CtlProducto
     */
    public function setProductoConcentracion($productoConcentracion)
    {
        $this->productoConcentracion = $productoConcentracion;

        return $this;
    }

    /**
     * Get productoConcentracion
     *
     * @return string
     */
    public function getProductoConcentracion()
    {
        return $this->productoConcentracion;
    }

    /**
     * Set productoPresentacion
     *
     * @param string $productoPresentacion
     *
     * @return CtlProducto
     */
    public function setProductoPresentacion($productoPresentacion)
    {
        $this->productoPresentacion = $productoPresentacion;

        return $this;
    }

    /**
     * Get productoPresentacion
     *
     * @return string
     */
    public function getProductoPresentacion()
    {
        return $this->productoPresentacion;
    }

    /**
     * Set idProductoSibasi
     *
     * @param integer $idProductoSibasi
     *
     * @return CtlProducto
     */
    public function setIdProductoSibasi($idProductoSibasi)
    {
        $this->idProductoSibasi = $idProductoSibasi;

        return $this;
    }

    /**
     * Get idProductoSibasi
     *
     * @return integer
     */
    public function getIdProductoSibasi()
    {
        return $this->idProductoSibasi;
    }

    /**
     * Set unidadMedidaProducto
     *
     * @param \Minsal\ModeloBundle\Entity\CtlUnidadMedida $unidadMedidaProducto
     *
     * @return CtlProducto
     */
    public function setUnidadMedidaProducto(\Minsal\ModeloBundle\Entity\CtlUnidadMedida $unidadMedidaProducto = null)
    {
        $this->unidadMedidaProducto = $unidadMedidaProducto;

        return $this;
    }

    /**
     * Get unidadMedidaProducto
     *
     * @return \Minsal\ModeloBundle\Entity\CtlUnidadMedida
     */
    public function getUnidadMedidaProducto()
    {
        return $this->unidadMedidaProducto;
    }
}
