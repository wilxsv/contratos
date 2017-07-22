<?php

namespace Minsal\ModeloBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CtlUnidadMedida
 *
 * @ORM\Table(name="ctl_unidad_medida")
 * @ORM\Entity
 */
class CtlUnidadMedida
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="ctl_unidad_medida_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="string", length=50, nullable=false)
     */
    private $descripcion;

    /**
     * @var integer
     *
     * @ORM\Column(name="unidades_contenidas", type="integer", nullable=false)
     */
    private $unidadesContenidas;

    /**
     * @var string
     *
     * @ORM\Column(name="cantidad_decimal", type="decimal", precision=16, scale=8, nullable=false)
     */
    private $cantidadDecimal;



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
     * @return CtlUnidadMedida
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
     * Set unidadesContenidas
     *
     * @param integer $unidadesContenidas
     * @return CtlUnidadMedida
     */
    public function setUnidadesContenidas($unidadesContenidas)
    {
        $this->unidadesContenidas = $unidadesContenidas;

        return $this;
    }

    /**
     * Get unidadesContenidas
     *
     * @return integer 
     */
    public function getUnidadesContenidas()
    {
        return $this->unidadesContenidas;
    }

    /**
     * Set cantidadDecimal
     *
     * @param string $cantidadDecimal
     * @return CtlUnidadMedida
     */
    public function setCantidadDecimal($cantidadDecimal)
    {
        $this->cantidadDecimal = $cantidadDecimal;

        return $this;
    }

    /**
     * Get cantidadDecimal
     *
     * @return string 
     */
    public function getCantidadDecimal()
    {
        return $this->cantidadDecimal;
    }
}
