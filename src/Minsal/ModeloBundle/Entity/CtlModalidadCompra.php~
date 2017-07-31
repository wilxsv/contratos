<?php

namespace Minsal\ModeloBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CtlModalidadCompra
 *
 * @ORM\Table(name="ctl_modalidad_compra")
 * @ORM\Entity
 */
class CtlModalidadCompra
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="ctl_modalidad_compra_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="numero_modalidad", type="string", length=50, nullable=true)
     */
    private $numeroModalidad;



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
     * Set numeroModalidad
     *
     * @param string $numeroModalidad
     *
     * @return CtlModalidadCompra
     */
    public function setNumeroModalidad($numeroModalidad)
    {
        $this->numeroModalidad = $numeroModalidad;

        return $this;
    }

    /**
     * Get numeroModalidad
     *
     * @return string
     */
    public function getNumeroModalidad()
    {
        return $this->numeroModalidad;
    }
}
