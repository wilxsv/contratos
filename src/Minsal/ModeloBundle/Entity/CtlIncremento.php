<?php

namespace Minsal\ModeloBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CtlIncremento
 *
 * @ORM\Table(name="ctl_incremento", indexes={@ORM\Index(name="fki_estado_incremento", columns={"estado_incremento"}), @ORM\Index(name="fki_estimacion", columns={"estimacion"}), @ORM\Index(name="fki_compra", columns={"incremento_modalidad_compra"})})
 * @ORM\Entity
 */
class CtlIncremento
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="ctl_incremento_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="meses_desestimar", type="integer", nullable=false)
     */
    private $mesesDesestimar;

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
     *   @ORM\JoinColumn(name="estado_incremento", referencedColumnName="id")
     * })
     */
    private $estadoIncremento;

    /**
     * @var \CtlModalidadCompra
     *
     * @ORM\ManyToOne(targetEntity="CtlModalidadCompra")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="incremento_modalidad_compra", referencedColumnName="id")
     * })
     */
    private $incrementoModalidadCompra;

    /**
     * @var \CtlProgramacion
     *
     * @ORM\ManyToOne(targetEntity="CtlProgramacion")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="estimacion", referencedColumnName="id")
     * })
     */
    private $estimacion;


}

