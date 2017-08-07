<?php

namespace Minsal\ModeloBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CtlProducto
 *
 * @ORM\Table(name="ctl_producto", indexes={@ORM\Index(name="fki_producto_unidad_medida", columns={"unidad_medida_producto"}), @ORM\Index(name="fki_esta_prod", columns={"estado_producto"}), @ORM\Index(name="fki_producto_establecimiento", columns={"establecimiento_producto"})})
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
     * @ORM\Column(name="codigo_producto", type="string", length=50, nullable=true)
     */
    private $codigoProducto;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre_producto", type="string", length=1000, nullable=true)
     */
    private $nombreProducto;

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
     * @var \CtlEstados
     *
     * @ORM\ManyToOne(targetEntity="CtlEstados")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="estado_producto", referencedColumnName="id")
     * })
     */
    private $estadoProducto;

    /**
     * @var \CtlEstablecimiento
     *
     * @ORM\ManyToOne(targetEntity="CtlEstablecimiento")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="establecimiento_producto", referencedColumnName="id")
     * })
     */
    private $establecimientoProducto;



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

    /**
     * Set estadoProducto
     *
     * @param \Minsal\ModeloBundle\Entity\CtlEstados $estadoProducto
     *
     * @return CtlProducto
     */
    public function setEstadoProducto(\Minsal\ModeloBundle\Entity\CtlEstados $estadoProducto = null)
    {
        $this->estadoProducto = $estadoProducto;

        return $this;
    }

    /**
     * Get estadoProducto
     *
     * @return \Minsal\ModeloBundle\Entity\CtlEstados
     */
    public function getEstadoProducto()
    {
        return $this->estadoProducto;
    }

    /**
     * Set establecimientoProducto
     *
     * @param \Minsal\ModeloBundle\Entity\CtlEstablecimiento $establecimientoProducto
     *
     * @return CtlProducto
     */
    public function setEstablecimientoProducto(\Minsal\ModeloBundle\Entity\CtlEstablecimiento $establecimientoProducto = null)
    {
        $this->establecimientoProducto = $establecimientoProducto;

        return $this;
    }

    /**
     * Get establecimientoProducto
     *
     * @return \Minsal\ModeloBundle\Entity\CtlEstablecimiento
     */
    public function getEstablecimientoProducto()
    {
        return $this->establecimientoProducto;
    }
}
