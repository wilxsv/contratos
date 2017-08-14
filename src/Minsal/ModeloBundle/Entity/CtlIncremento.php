<?php

namespace Minsal\ModeloBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CtlIncremento
 *
 * @ORM\Table(name="ctl_incremento", indexes={@ORM\Index(name="fki_incremento_modalidad", columns={"numero_modalidad_compra"}), @ORM\Index(name="fki_programacion_incremento", columns={"estimacion"}), @ORM\Index(name="fki_estado_incremento", columns={"estado_incremento"})})
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
     * @ORM\Column(name="meses_desestimar", type="integer", nullable=true)
     */
    private $mesesDesestimar;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_creacion", type="date", nullable=true)
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
     *   @ORM\JoinColumn(name="numero_modalidad_compra", referencedColumnName="id")
     * })
     */
    private $numeroModalidadCompra;

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
     * Set numeroModalidadCompra
     *
     * @param \Minsal\ModeloBundle\Entity\CtlModalidadCompra $numeroModalidadCompra
     *
     * @return CtlIncremento
     */
    public function setNumeroModalidadCompra(\Minsal\ModeloBundle\Entity\CtlModalidadCompra $numeroModalidadCompra = null)
    {
        $this->numeroModalidadCompra = $numeroModalidadCompra;

        return $this;
    }

    /**
     * Get numeroModalidadCompra
     *
     * @return \Minsal\ModeloBundle\Entity\CtlModalidadCompra
     */
    public function getNumeroModalidadCompra()
    {
        return $this->numeroModalidadCompra;
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
