<?php

namespace Minsal\ModeloBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CtlProrroga
 *
 * @ORM\Table(name="ctl_prorroga", indexes={@ORM\Index(name="fki_estado_prorroga", columns={"estado_prorroga"}), @ORM\Index(name="fki_prorroga_modalidad_compra", columns={"prorroga_modalidad_compra"})})
 * @ORM\Entity
 */
class CtlProrroga
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="ctl_prorroga_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_creacion", type="date", nullable=false)
     */
    private $fechaCreacion;

    /**
     * @var \CtlEstados
     *
     * @ORM\ManyToOne(targetEntity="CtlEstados")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="estado_prorroga", referencedColumnName="id")
     * })
     */
    private $estadoProrroga;

    /**
     * @var \CtlModalidadCompra
     *
     * @ORM\ManyToOne(targetEntity="CtlModalidadCompra")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="prorroga_modalidad_compra", referencedColumnName="id")
     * })
     */
    private $prorrogaModalidadCompra;


}

