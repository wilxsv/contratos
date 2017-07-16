<?php

namespace Minsal\ModeloBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;


/**
 * Contrato
 *
 * @ORM\Table(name="contrato")
 * @ORM\Entity(repositoryClass="Minsal\ModeloBundle\Repository\ContratoRepository")
 */
class Contrato
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
     * Muchos contratos tienen un resumen
     * @ORM\ManyToOne(targetEntity="ResumenIncremento", inversedBy="contrato")
     */
    protected $resumenes;


    /**
     * Un proveedor tiene varios contratos.
     * @ORM\OneToMany(targetEntity="Proveedor", mappedBy="contratos")
     */
    protected $proveedor;

    public function __construct() {
        $this->proveedor = new ArrayCollection();
    }

   
    /**
     * @var string
     *
     * @ORM\Column(name="num_contrato", type="string", length=255, nullable=true)
     */
    private $numContrato;

    /**
     * @var float
     *
     * @ORM\Column(name="monto_contrato", type="float", nullable=true)
     */
    private $montoContrato;

    /**
     * @var string
     *
     * @ORM\Column(name="codigolicitacion", type="string", length=255, nullable=true)
     */
    private $codigolicitacion;


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
     * Set numContrato
     *
     * @param string $numContrato
     * @return Contrato
     */
    public function setNumContrato($numContrato)
    {
        $this->numContrato = $numContrato;

        return $this;
    }

    /**
     * Get numContrato
     *
     * @return string 
     */
    public function getNumContrato()
    {
        return $this->numContrato;
    }

    /**
     * Set montoContrato
     *
     * @param float $montoContrato
     * @return Contrato
     */
    public function setMontoContrato($montoContrato)
    {
        $this->montoContrato = $montoContrato;

        return $this;
    }

    /**
     * Get montoContrato
     *
     * @return float 
     */
    public function getMontoContrato()
    {
        return $this->montoContrato;
    }

    /**
     * Set codigolicitacion
     *
     * @param string $codigolicitacion
     * @return Contrato
     */
    public function setCodigolicitacion($codigolicitacion)
    {
        $this->codigolicitacion = $codigolicitacion;

        return $this;
    }

    /**
     * Get codigolicitacion
     *
     * @return string 
     */
    public function getCodigolicitacion()
    {
        return $this->codigolicitacion;
    }
}
