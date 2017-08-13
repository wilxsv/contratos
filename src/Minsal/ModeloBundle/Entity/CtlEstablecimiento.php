<?php

namespace Minsal\ModeloBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CtlEstablecimiento
 *
 * @ORM\Table(name="ctl_establecimiento")
 * @ORM\Entity
 */
class CtlEstablecimiento
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="ctl_establecimiento_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="codigo_establecimiento", type="string", length=100, nullable=true)
     */
    private $codigoEstablecimiento;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre_establecimiento", type="string", length=255, nullable=true)
     */
    private $nombreEstablecimiento;



    /**
     * Set codigoEstablecimiento
     *
     * @param string $codigoEstablecimiento
     *
     * @return CtlEstablecimiento
     */
    public function setCodigoEstablecimiento($codigoEstablecimiento)
    {
        $this->codigoEstablecimiento = $codigoEstablecimiento;

        return $this;
    }

    /**
     * Get codigoEstablecimiento
     *
     * @return string
     */
    public function getCodigoEstablecimiento()
    {
        return $this->codigoEstablecimiento;
    }

    /**
     * Set nombreEstablecimiento
     *
     * @param string $nombreEstablecimiento
     *
     * @return CtlEstablecimiento
     */
    public function setNombreEstablecimiento($nombreEstablecimiento)
    {
        $this->nombreEstablecimiento = $nombreEstablecimiento;

        return $this;
    }

    /**
     * Get nombreEstablecimiento
     *
     * @return string
     */
    public function getNombreEstablecimiento()
    {
        return $this->nombreEstablecimiento;
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
