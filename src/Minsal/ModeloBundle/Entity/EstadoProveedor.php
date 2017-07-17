<?php

namespace Minsal\ModeloBundle\Entity;

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
     * @ORM\Column(name="fecha_cambio_at", type="datetime")
     */
    private $fechaCambioAt;

    /**
     * @var string
     *
     * @ORM\Column(name="estado_actual", type="string", length=255)
     */
    private $estadoActual;


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
     * Set fechaCambioAt
     *
     * @param \DateTime $fechaCambioAt
     * @return EstadoProveedor
     */
    public function setFechaCambioAt($fechaCambioAt)
    {
        $this->fechaCambioAt = $fechaCambioAt;

        return $this;
    }

    /**
     * Get fechaCambioAt
     *
     * @return \DateTime 
     */
    public function getFechaCambioAt()
    {
        return $this->fechaCambioAt;
    }

    /**
     * Set estadoActual
     *
     * @param string $estadoActual
     * @return EstadoProveedor
     */
    public function setEstadoActual($estadoActual)
    {
        $this->estadoActual = $estadoActual;

        return $this;
    }

    /**
     * Get estadoActual
     *
     * @return string 
     */
    public function getEstadoActual()
    {
        return $this->estadoActual;
    }
}
