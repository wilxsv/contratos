<?php

namespace Minsal\ModeloBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CtlEstablecimiento
 *
 * @ORM\Table(name="ctl_establecimiento", uniqueConstraints={@ORM\UniqueConstraint(name="idsinab", columns={"id_establecimiento_sinab"}), @ORM\UniqueConstraint(name="ctl_establecimiento_id_key", columns={"establecimiento_id"})}, indexes={@ORM\Index(name="idx_332bd42c66617f31", columns={"establecimiento_id_almacen"})})
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
     * @ORM\Column(name="id_establecimiento_sinab", type="integer", nullable=true)
     */
    private $idEstablecimientoSinab;

    /**
     * @var \CtlAlmacen
     *
     * @ORM\ManyToOne(targetEntity="CtlAlmacen")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="establecimiento_id_almacen", referencedColumnName="id")
     * })
     */
    private $establecimientoAlmacen;


}

