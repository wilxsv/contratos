<?php

namespace Minsal\ModeloBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CtlEstablecimiento
 *
 * @ORM\Table(name="ctl_establecimiento", uniqueConstraints={@ORM\UniqueConstraint(name="ctl_establecimiento_id_key", columns={"establecimiento_id"})}, indexes={@ORM\Index(name="IDX_332BD42C66617F31", columns={"establecimiento_id_almacen"})})
 * @ORM\Entity
 */
class CtlEstablecimiento
{
    /**
     * @var integer
     *
     * @ORM\Column(name="establecimiento_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="ctl_establecimiento_establecimiento_id_seq", allocationSize=1, initialValue=1)
     */
    private $establecimientoId;

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
     * @var integer
     *
     * @ORM\Column(name="id_establecimiento_sibasi", type="integer", nullable=true)
     */
    private $idEstablecimientoSibasi;

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
     * Get establecimientoId
     *
     * @return integer 
     */
    public function getEstablecimientoId()
    {
        return $this->establecimientoId;
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
     * Set idEstablecimientoSibasi
     *
     * @param integer $idEstablecimientoSibasi
     * @return CtlEstablecimiento
     */
    public function setIdEstablecimientoSibasi($idEstablecimientoSibasi)
    {
        $this->idEstablecimientoSibasi = $idEstablecimientoSibasi;

        return $this;
    }

    /**
     * Get idEstablecimientoSibasi
     *
     * @return integer 
     */
    public function getIdEstablecimientoSibasi()
    {
        return $this->idEstablecimientoSibasi;
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
