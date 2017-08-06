<?php

namespace Minsal\ModeloBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SegRol
 *
 * @ORM\Table(name="seg_rol")
 * @ORM\Entity
 */
class SegRol
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="seg_rol_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="text", nullable=false)
     */
    private $nombre;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_creacion", type="date", nullable=false)
     */
    private $fechaCreacion;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_modificacion", type="date", nullable=true)
     */
    private $fechaModificacion;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="SegUsuario", mappedBy="idSegRol")
     */
    private $segUsuarioid;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->segUsuarioid = new \Doctrine\Common\Collections\ArrayCollection();
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

    /**
     * Set nombre
     *
     * @param string $nombre
     *
     * @return SegRol
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return string
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set fechaCreacion
     *
     * @param \DateTime $fechaCreacion
     *
     * @return SegRol
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
     * Set fechaModificacion
     *
     * @param \DateTime $fechaModificacion
     *
     * @return SegRol
     */
    public function setFechaModificacion($fechaModificacion)
    {
        $this->fechaModificacion = $fechaModificacion;

        return $this;
    }

    /**
     * Get fechaModificacion
     *
     * @return \DateTime
     */
    public function getFechaModificacion()
    {
        return $this->fechaModificacion;
    }

    /**
     * Add segUsuarioid
     *
     * @param \Minsal\ModeloBundle\Entity\SegUsuario $segUsuarioid
     *
     * @return SegRol
     */
    public function addSegUsuarioid(\Minsal\ModeloBundle\Entity\SegUsuario $segUsuarioid)
    {
        $this->segUsuarioid[] = $segUsuarioid;

        return $this;
    }

    /**
     * Remove segUsuarioid
     *
     * @param \Minsal\ModeloBundle\Entity\SegUsuario $segUsuarioid
     */
    public function removeSegUsuarioid(\Minsal\ModeloBundle\Entity\SegUsuario $segUsuarioid)
    {
        $this->segUsuarioid->removeElement($segUsuarioid);
    }

    /**
     * Get segUsuarioid
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSegUsuarioid()
    {
        return $this->segUsuarioid;
    }
}
