<?php

namespace Minsal\ModeloBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CtlProrroga
 *
 * @ORM\Table(name="ctl_prorroga", indexes={@ORM\Index(name="fki_estad_pro", columns={"estado_prorroga"}), @ORM\Index(name="ctl_prorroga_planificacion_idx", columns={"planificacion"}), @ORM\Index(name="idx_337125a911b7b911", columns={"prorroga_modalidad_compra"})})
 * @ORM\Entity
 */
class CtlProrroga
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="ctl_prorroga_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

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
     *   @ORM\JoinColumn(name="estado_prorroga", referencedColumnName="id")
     * })
     */
    private $estadoProrroga;

    /**
     * @var \CtlModalidadCompra
     *
     * @ORM\ManyToOne(targetEntity="CtlModalidadCompra")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="prorroga_modalidad_compra", referencedColumnName="id")
     * })
     */
    private $prorrogaModalidadCompra;

    /**
     * @var \CtlPlanificacion
     *
     * @ORM\ManyToOne(targetEntity="CtlPlanificacion")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="planificacion", referencedColumnName="id")
     * })
     */
    private $planificacion;



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
     * Set fechaCreacion
     *
     * @param \DateTime $fechaCreacion
     *
     * @return CtlProrroga
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
     * Set estadoProrroga
     *
     * @param \Minsal\ModeloBundle\Entity\CtlEstados $estadoProrroga
     *
     * @return CtlProrroga
     */
    public function setEstadoProrroga(\Minsal\ModeloBundle\Entity\CtlEstados $estadoProrroga = null)
    {
        $this->estadoProrroga = $estadoProrroga;

        return $this;
    }

    /**
     * Get estadoProrroga
     *
     * @return \Minsal\ModeloBundle\Entity\CtlEstados
     */
    public function getEstadoProrroga()
    {
        return $this->estadoProrroga;
    }

    /**
     * Set prorrogaModalidadCompra
     *
     * @param \Minsal\ModeloBundle\Entity\CtlModalidadCompra $prorrogaModalidadCompra
     *
     * @return CtlProrroga
     */
    public function setProrrogaModalidadCompra(\Minsal\ModeloBundle\Entity\CtlModalidadCompra $prorrogaModalidadCompra = null)
    {
        $this->prorrogaModalidadCompra = $prorrogaModalidadCompra;

        return $this;
    }

    /**
     * Get prorrogaModalidadCompra
     *
     * @return \Minsal\ModeloBundle\Entity\CtlModalidadCompra
     */
    public function getProrrogaModalidadCompra()
    {
        return $this->prorrogaModalidadCompra;
    }

    /**
     * Set planificacion
     *
     * @param \Minsal\ModeloBundle\Entity\CtlPlanificacion $planificacion
     *
     * @return CtlProrroga
     */
    public function setPlanificacion(\Minsal\ModeloBundle\Entity\CtlPlanificacion $planificacion = null)
    {
        $this->planificacion = $planificacion;

        return $this;
    }

    /**
     * Get planificacion
     *
     * @return \Minsal\ModeloBundle\Entity\CtlPlanificacion
     */
    public function getPlanificacion()
    {
        return $this->planificacion;
    }
}
