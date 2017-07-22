<?php

namespace Minsal\ModeloBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CtlIncremento
 *
 * @ORM\Table(name="ctl_incremento", indexes={@ORM\Index(name="fki_estado_incremento", columns={"estado_incremento"})})
 * @ORM\Entity
 */
class CtlIncremento
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="ctl_incremento_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="meses_desestimar", type="integer", nullable=false)
     */
    private $mesesDesestimar;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_creacion", type="date", nullable=false)
     */
    private $fechaCreacion;

    /**
     * @var integer
     *
     * @ORM\Column(name="incremento_modalidad_compra", type="integer", nullable=true)
     */
    private $incrementoModalidadCompra;

    /**
     * @var \CtlEstados
     *
     * @ORM\ManyToOne(targetEntity="CtlEstados")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="estado_incremento", referencedColumnName="id")
     * })
     */
    private $estadoIncremento;



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
     * Set mesesDesestimar
     *
     * @param integer $mesesDesestimar
     * @return CtlIncremento
     */
    public function setMesesDesestimar($mesesDesestimar)
    {
        $this->mesesDesestimar = $mesesDesestimar;

        return $this;
    }

    /**
     * Get mesesDesestimar
     *
     * @return integer 
     */
    public function getMesesDesestimar()
    {
        return $this->mesesDesestimar;
    }

    /**
     * Set fechaCreacion
     *
     * @param \DateTime $fechaCreacion
     * @return CtlIncremento
     */
    public function setFechaCreacion($fechaCreacion)
    {
        $this->fechaCreacion = $fechaCreacion;

        return $this;
    }

    /**
     * Get fechaCreacion
     *
     * @return \DateTime 
     */
    public function getFechaCreacion()
    {
        return $this->fechaCreacion;
    }

    /**
     * Set incrementoModalidadCompra
     *
     * @param integer $incrementoModalidadCompra
     * @return CtlIncremento
     */
    public function setIncrementoModalidadCompra($incrementoModalidadCompra)
    {
        $this->incrementoModalidadCompra = $incrementoModalidadCompra;

        return $this;
    }

    /**
     * Get incrementoModalidadCompra
     *
     * @return integer 
     */
    public function getIncrementoModalidadCompra()
    {
        return $this->incrementoModalidadCompra;
    }

    /**
     * Set estadoIncremento
     *
     * @param \Minsal\ModeloBundle\Entity\CtlEstados $estadoIncremento
     * @return CtlIncremento
     */
    public function setEstadoIncremento(\Minsal\ModeloBundle\Entity\CtlEstados $estadoIncremento = null)
    {
        $this->estadoIncremento = $estadoIncremento;

        return $this;
    }

    /**
     * Get estadoIncremento
     *
     * @return \Minsal\ModeloBundle\Entity\CtlEstados 
     */
    public function getEstadoIncremento()
    {
        return $this->estadoIncremento;
    }
}
