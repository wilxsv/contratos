<?php

namespace Minsal\ModeloBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CtlEstablecimiento
 *
 * @ORM\Table(name="ctl_establecimiento", indexes={@ORM\Index(name="establecimiento_id_almacen", columns={"establecimiento_id_almacen"})})
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
     * @ORM\Column(name="codigo_establecimiento", type="string", length=50, nullable=false)
     */
    private $codigoEstablecimiento;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre_establecimiento", type="string", length=100, nullable=false)
     */
    private $nombreEstablecimiento;

    /**
     * @var \CtlAlmacen
     *
     * @ORM\ManyToOne(targetEntity="CtlAlmacen")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="establecimiento_id_almacen", referencedColumnName="id")
     * })
     */
    private $establecimientoAlmacen;

    /**
     * Set id
     *
     * @param integer $id
     * @return CtlEstablecimiento
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
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
     * Set codigoEstablecimiento
     *
     * @param string $codigoEstablecimiento
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
     * Set establecimientoAlmacen
     *
     * @param \Minsal\ModeloBundle\Entity\CtlAlmacen $establecimientoAlmacen
     * @return CtlEstablecimiento
     */
    public function setEstablecimientoAlmacen(\Minsal\ModeloBundle\Entity\CtlAlmacen $establecimientoAlmacen = null)
    {
        $this->establecimientoAlmacen = $establecimientoAlmacen;

        return $this;
    }

    /**
     * Get establecimientoAlmacen
     *
     * @return \Minsal\ModeloBundle\Entity\CtlAlmacen 
     */
    public function getEstablecimientoAlmacen()
    {
        return $this->establecimientoAlmacen;
    }
}
