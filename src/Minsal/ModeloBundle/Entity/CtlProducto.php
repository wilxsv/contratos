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
     * @ORM\Column(name="nombre_producto", type="string", length=1000, nullable=false)
     */
    private $nombreProducto;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_producto_sibasi", type="integer", nullable=false)
     */
    private $idProductoSibasi;

    /**
     * @var integer
     *
     * @ORM\Column(name="estado_producto", type="integer", nullable=true)
     */
    private $estadoProducto;

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
     * Set estadoProducto
     *
     * @param integer $estadoProducto
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
     * @return integer
     */
    public function getEstadoProducto()
    {
        return $this->estadoProducto;
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
