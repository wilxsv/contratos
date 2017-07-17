<?php

namespace Minsal\ModeloBundle\Entity;
use Doctrine\Common\Collections\ArrayCollection;


use Doctrine\ORM\Mapping as ORM;

/**
 * Licitacion
 *
 * @ORM\Table(name="licitacion")
 * @ORM\Entity(repositoryClass="Minsal\ModeloBundle\Repository\LicitacionRepository")
 */
class Licitacion
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
     * @ORM\OneToMany(targetEntity="Contrato", mappedBy="licitacion")
     */
    protected $contratos;

    public function __construct()
    {
        $this->contratos = new ArrayCollection();
    }

    /**
     * @var string
     *
     * @ORM\Column(name="codigo_licitacion", type="string", length=255)
     */
    private $codigoLicitacion;


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
     * Set codigoLicitacion
     *
     * @param string $codigoLicitacion
     * @return Licitacion
     */
    public function setCodigoLicitacion($codigoLicitacion)
    {
        $this->codigoLicitacion = $codigoLicitacion;

        return $this;
    }

    /**
     * Get codigoLicitacion
     *
     * @return string 
     */
    public function getCodigoLicitacion()
    {
        return $this->codigoLicitacion;
    }
}
