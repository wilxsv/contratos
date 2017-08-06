<?php

namespace Minsal\ModeloBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CtlLote
 *
 * @ORM\Table(name="ctl_lote", indexes={@ORM\Index(name="idx_a2e4f6b156795866", columns={"lote_id_producto"}), @ORM\Index(name="lote_id_unidad_medida", columns={"lote_id_unidad_medida"}), @ORM\Index(name="id_almacen", columns={"lote_id_producto", "lote_id_unidad_medida"})})
 * @ORM\Entity
 */
class CtlLote
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="ctl_lote_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="lote_id_producto", type="integer", nullable=true)
     */
    private $loteIdProducto;

    /**
     * @var string
     *
     * @ORM\Column(name="codigo_lote", type="string", length=50, nullable=false)
     */
    private $codigoLote;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_vencimiento", type="date", nullable=false)
     */
    private $fechaVencimiento;

    /**
     * @var string
     *
     * @ORM\Column(name="precio_lote", type="decimal", precision=16, scale=8, nullable=false)
     */
    private $precioLote;

    /**
     * @var \CtlUnidadMedida
     *
     * @ORM\ManyToOne(targetEntity="CtlUnidadMedida")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="lote_id_unidad_medida", referencedColumnName="id")
     * })
     */
    private $loteUnidadMedida;


}

