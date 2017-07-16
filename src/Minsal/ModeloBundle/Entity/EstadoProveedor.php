<?php

namespace Minsal\ModeloBundle\Entity;
use Doctrine\Common\Collections\ArrayCollection;


use Doctrine\ORM\Mapping as ORM;

/**
 * EstadoProveedor
 *
 * @ORM\Table(name="estado_proveedor")
 * @ORM\Entity(repositoryClass="Minsal\ModeloBundle\Repository\EstadoProveedorRepository")
 */
class EstadoProveedor
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fechaCambio", type="datetime", nullable=true)
     */
    private $fechaCambio;


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
     * Set fechaCambio
     *
     * @param \DateTime $fechaCambio
     * @return EstadoProveedor
     */
    public function setFechaCambio($fechaCambio)
    {
        $this->fechaCambio = $fechaCambio;

        return $this;
    }

    /**
     * Get fechaCambio
     *
     * @return \DateTime 
     */
    public function getFechaCambio()
    {
        return $this->fechaCambio;
    }
}
