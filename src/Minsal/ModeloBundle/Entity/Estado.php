<?php

namespace Minsal\ModeloBundle\Entity;
use Doctrine\Common\Collections\ArrayCollection;

use Doctrine\ORM\Mapping as ORM;

/**
 * Estado
 *
 * @ORM\Table(name="mnt_estado")
 * @ORM\Entity(repositoryClass="Minsal\ModeloBundle\Repository\EstadoRepository")
 */
class Estado
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
     * Un estado tiene varios resumenes.
     * @ORM\OneToMany(targetEntity="ResumenIncremento", mappedBy="estado")
     */
    private $resumenes;
    // ...

    public function __construct() {
        $this->resumenes = new ArrayCollection();
    }

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="string", length=255)
     */
    private $descripcion;

    /**
     * @var string
     *
     * @ORM\Column(name="responsable", type="string", length=255)
     */
    private $responsable;

    /**
     * @var string
     *
     * @ORM\Column(name="puesto", type="string", length=255)
     */
    private $puesto;


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
     * Set descripcion
     *
     * @param string $descripcion
     * @return Estado
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * Get descripcion
     *
     * @return string 
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set responsable
     *
     * @param string $responsable
     * @return Estado
     */
    public function setResponsable($responsable)
    {
        $this->responsable = $responsable;

        return $this;
    }

    /**
     * Get responsable
     *
     * @return string 
     */
    public function getResponsable()
    {
        return $this->responsable;
    }

    /**
     * Set puesto
     *
     * @param string $puesto
     * @return Estado
     */
    public function setPuesto($puesto)
    {
        $this->puesto = $puesto;

        return $this;
    }

    /**
     * Get puesto
     *
     * @return string 
     */
    public function getPuesto()
    {
        return $this->puesto;
    }
}
