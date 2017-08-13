<?php

namespace Minsal\ModeloBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CtlPlanificacion
 *
 * @ORM\Table(name="ctl_planificacion")
 * @ORM\Entity
 */
class CtlPlanificacion
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="ctl_planificacion_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_programacion_sinab", type="integer", nullable=true)
     */
    private $idProgramacionSinab;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion_programacion", type="string", length=255, nullable=true)
     */
    private $descripcionProgramacion;



    /**
     * Set idProgramacionSinab
     *
     * @param integer $idProgramacionSinab
     *
     * @return CtlPlanificacion
     */
    public function setIdProgramacionSinab($idProgramacionSinab)
    {
        $this->idProgramacionSinab = $idProgramacionSinab;

        return $this;
    }

    /**
     * Get idProgramacionSinab
     *
     * @return integer
     */
    public function getIdProgramacionSinab()
    {
        return $this->idProgramacionSinab;
    }

    /**
     * Set descripcionProgramacion
     *
     * @param string $descripcionProgramacion
     *
     * @return CtlPlanificacion
     */
    public function setDescripcionProgramacion($descripcionProgramacion)
    {
        $this->descripcionProgramacion = $descripcionProgramacion;

        return $this;
    }

    /**
     * Get descripcionProgramacion
     *
     * @return string
     */
    public function getDescripcionProgramacion()
    {
        return $this->descripcionProgramacion;
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }
}
