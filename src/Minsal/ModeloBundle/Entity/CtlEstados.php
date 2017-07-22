<?php

namespace Minsal\ModeloBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CtlEstados
 *
 * @ORM\Table(name="ctl_estados")
 * @ORM\Entity
 */
class CtlEstados
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="ctl_estados_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion_estado", type="string", length=255, nullable=true)
     */
    private $descripcionEstado;



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
     * Set descripcionEstado
     *
     * @param string $descripcionEstado
     * @return CtlEstados
     */
    public function setDescripcionEstado($descripcionEstado)
    {
        $this->descripcionEstado = $descripcionEstado;

        return $this;
    }

    /**
     * Get descripcionEstado
     *
     * @return string 
     */
    public function getDescripcionEstado()
    {
        return $this->descripcionEstado;
    }
}
