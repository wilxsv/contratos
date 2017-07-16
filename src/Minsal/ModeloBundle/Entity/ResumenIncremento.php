<?php

namespace Minsal\ModeloBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ResumenIncremento
 *
 * @ORM\Table(name="mnt_resumen_incremento")
 * @ORM\Entity(repositoryClass="Minsal\ModeloBundle\Repository\ResumenIncrementoRepository")
 */
class ResumenIncremento
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
     * @var string
     *
     * @ORM\Column(name="codigo_compra", type="string", length=50)
     */
    private $codigoCompra;

    /**
     * @var array
     *
     * @ORM\Column(name="contratos", type="json_array", nullable=true)
     */
    private $contratos;

    /**
     * One Product has One Shipment.
     * @ORM\OneToMany(targetEntity="Estado", mappedBy="resumen")
     */
    private $estado;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->estado = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_creacion", type="date")
     */
    private $fechaCreacion;


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
     * Set codigoCompra
     *
     * @param string $codigoCompra
     * @return ResumenIncremento
     */
    public function setCodigoCompra($codigoCompra)
    {
        $this->codigoCompra = $codigoCompra;

        return $this;
    }

    /**
     * Get codigoCompra
     *
     * @return string 
     */
    public function getCodigoCompra()
    {
        return $this->codigoCompra;
    }

    /**
     * Set contratos
     *
     * @param array $contratos
     * @return ResumenIncremento
     */
    public function setContratos($contratos)
    {
        $this->contratos = $contratos;

        return $this;
    }

    /**
     * Get contratos
     *
     * @return array 
     */
    public function getContratos()
    {
        return $this->contratos;
    }

    /**
     * Set estado
     *
     * @param integer $estado
     * @return ResumenIncremento
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;

        return $this;
    }

    /**
     * Get estado
     *
     * @return integer 
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * Set fechaCreacion
     *
     * @param \DateTime $fechaCreacion
     * @return ResumenIncremento
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
}
