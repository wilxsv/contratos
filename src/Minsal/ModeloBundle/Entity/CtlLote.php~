<?php

namespace Minsal\ModeloBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CtlLote
 *
 * @ORM\Table(name="ctl_lote", indexes={@ORM\Index(name="idx_a2e4f6b156795866", columns={"lote_id_producto"}), @ORM\Index(name="id_almacen", columns={"lote_id_producto", "lote_id_unidad_medida"}), @ORM\Index(name="lote_id_unidad_medida", columns={"lote_id_unidad_medida"})})
 * @ORM\Entity
 */
class CtlLote
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="ctl_lote_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="codigo_lote", type="string", length=50, nullable=false)
     */
    private $codigoLote;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_vencimiento", type="date", nullable=false)
     */
    private $fechaVencimiento;

    /**
     * @var string
     *
     * @ORM\Column(name="precio_lote", type="decimal", precision=16, scale=8, nullable=false)
     */
    private $precioLote;

    /**
     * @var \CtlUnidadMedida
     *
     * @ORM\ManyToOne(targetEntity="CtlUnidadMedida")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="lote_id_unidad_medida", referencedColumnName="id")
     * })
     */
    private $loteUnidadMedida;

    /**
     * @var \CtlProducto
     *
     * @ORM\ManyToOne(targetEntity="CtlProducto")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="lote_id_producto", referencedColumnName="id")
     * })
     */
    private $loteProducto;



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
     * Set codigoLote
     *
     * @param string $codigoLote
     * @return CtlLote
     */
    public function setCodigoLote($codigoLote)
    {
        $this->codigoLote = $codigoLote;

        return $this;
    }

    /**
     * Get codigoLote
     *
     * @return string 
     */
    public function getCodigoLote()
    {
        return $this->codigoLote;
    }

    /**
     * Set fechaVencimiento
     *
     * @param \DateTime $fechaVencimiento
     * @return CtlLote
     */
    public function setFechaVencimiento($fechaVencimiento)
    {
        $this->fechaVencimiento = $fechaVencimiento;

        return $this;
    }

    /**
     * Get fechaVencimiento
     *
     * @return \DateTime 
     */
    public function getFechaVencimiento()
    {
        return $this->fechaVencimiento;
    }

    /**
     * Set precioLote
     *
     * @param string $precioLote
     * @return CtlLote
     */
    public function setPrecioLote($precioLote)
    {
        $this->precioLote = $precioLote;

        return $this;
    }

    /**
     * Get precioLote
     *
     * @return string 
     */
    public function getPrecioLote()
    {
        return $this->precioLote;
    }

    /**
     * Set loteUnidadMedida
     *
     * @param \Minsal\ModeloBundle\Entity\CtlUnidadMedida $loteUnidadMedida
     * @return CtlLote
     */
    public function setLoteUnidadMedida(\Minsal\ModeloBundle\Entity\CtlUnidadMedida $loteUnidadMedida = null)
    {
        $this->loteUnidadMedida = $loteUnidadMedida;

        return $this;
    }

    /**
     * Get loteUnidadMedida
     *
     * @return \Minsal\ModeloBundle\Entity\CtlUnidadMedida 
     */
    public function getLoteUnidadMedida()
    {
        return $this->loteUnidadMedida;
    }

    /**
     * Set loteProducto
     *
     * @param \Minsal\ModeloBundle\Entity\CtlProducto $loteProducto
     * @return CtlLote
     */
    public function setLoteProducto(\Minsal\ModeloBundle\Entity\CtlProducto $loteProducto = null)
    {
        $this->loteProducto = $loteProducto;

        return $this;
    }

    /**
     * Get loteProducto
     *
     * @return \Minsal\ModeloBundle\Entity\CtlProducto 
     */
    public function getLoteProducto()
    {
        return $this->loteProducto;
    }
}
