<?php

namespace Minsal\ModeloBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CtlIncremento
 *
 * @ORM\Table(name="ctl_incremento", indexes={@ORM\Index(name="fki_compra", columns={"incremento_modalidad_compra"}), @ORM\Index(name="fki_estimacion", columns={"estimacion"}), @ORM\Index(name="fki_estado_incremento", columns={"estado_incremento"})})
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
     * @var \CtlEstados
     *
     * @ORM\ManyToOne(targetEntity="CtlEstados")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="estado_incremento", referencedColumnName="id")
     * })
     */
    private $estadoIncremento;

    /**
     * @var \CtlModalidadCompra
     *
     * @ORM\ManyToOne(targetEntity="CtlModalidadCompra")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="incremento_modalidad_compra", referencedColumnName="id")
     * })
     */
    private $incrementoModalidadCompra;

    /**
     * @var \CtlProgramacion
     *
     * @ORM\ManyToOne(targetEntity="CtlProgramacion")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="estimacion", referencedColumnName="id")
     * })
     */
    private $estimacion;



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
     *
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
     *
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
     * Set estadoIncremento
     *
     * @param \Minsal\ModeloBundle\Entity\CtlEstados $estadoIncremento
     *
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

    /**
     * Set incrementoModalidadCompra
     *
     * @param \Minsal\ModeloBundle\Entity\CtlModalidadCompra $incrementoModalidadCompra
     *
     * @return CtlIncremento
     */
    public function setIncrementoModalidadCompra(\Minsal\ModeloBundle\Entity\CtlModalidadCompra $incrementoModalidadCompra = null)
    {
        $this->incrementoModalidadCompra = $incrementoModalidadCompra;

        return $this;
    }

    /**
     * Get incrementoModalidadCompra
     *
     * @return \Minsal\ModeloBundle\Entity\CtlModalidadCompra
     */
    public function getIncrementoModalidadCompra()
    {
        return $this->incrementoModalidadCompra;
    }

    /**
     * Set estimacion
     *
     * @param \Minsal\ModeloBundle\Entity\CtlProgramacion $estimacion
     *
     * @return CtlIncremento
     */
    public function setEstimacion(\Minsal\ModeloBundle\Entity\CtlProgramacion $estimacion = null)
    {
        $this->estimacion = $estimacion;

        return $this;
    }

    /**
     * Get estimacion
     *
     * @return \Minsal\ModeloBundle\Entity\CtlProgramacion
     */
    public function getEstimacion()
    {
        return $this->estimacion;
    }
}
