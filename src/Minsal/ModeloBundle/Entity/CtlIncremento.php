<?php

namespace Minsal\ModeloBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CtlIncremento
 *
 * @ORM\Table(name="ctl_incremento", indexes={@ORM\Index(name="id_contrato", columns={"incremento_id_contrato"})})
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
     * @var \CtlContrato
     *
     * @ORM\ManyToOne(targetEntity="CtlContrato")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="incremento_id_contrato", referencedColumnName="id")
     * })
     */
    private $incrementoContrato;



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
     * Set incrementoContrato
     *
     * @param \Minsal\ModeloBundle\Entity\CtlContrato $incrementoContrato
     * @return CtlIncremento
     */
    public function setIncrementoContrato(\Minsal\ModeloBundle\Entity\CtlContrato $incrementoContrato = null)
    {
        $this->incrementoContrato = $incrementoContrato;

        return $this;
    }

    /**
     * Get incrementoContrato
     *
     * @return \Minsal\ModeloBundle\Entity\CtlContrato 
     */
    public function getIncrementoContrato()
    {
        return $this->incrementoContrato;
    }
}
