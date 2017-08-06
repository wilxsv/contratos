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
     * @ORM\Column(name="id_programacion", type="integer", nullable=true)
     */
    private $idProgramacion;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion_programacion", type="string", length=500, nullable=true)
     */
    private $descripcionProgramacion;



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
     * Set idProgramacion
     *
     * @param integer $idProgramacion
     *
     * @return CtlPlanificacion
     */
    public function setIdProgramacion($idProgramacion)
    {
        $this->idProgramacion = $idProgramacion;

        return $this;
    }

    /**
     * Get idProgramacion
     *
     * @return integer
     */
    public function getIdProgramacion()
    {
        return $this->idProgramacion;
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
}
