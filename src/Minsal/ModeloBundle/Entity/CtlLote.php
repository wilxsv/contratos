<?php

namespace Minsal\ModeloBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CtlLote
 *
 * @ORM\Table(name="ctl_lote", indexes={@ORM\Index(name="id_almacen", columns={"lote_id_almacen", "lote_id_producto", "lote_id_unidad_medida"}), @ORM\Index(name="lote_id_producto", columns={"lote_id_producto"}), @ORM\Index(name="lote_id_unidad_medida", columns={"lote_id_unidad_medida"}), @ORM\Index(name="IDX_A2E4F6B1C30EE381", columns={"lote_id_almacen"})})
 * @ORM\Entity
 */
class CtlLote
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

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
     * @var \CtlAlmacen
     *
     * @ORM\ManyToOne(targetEntity="CtlAlmacen")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="lote_id_almacen", referencedColumnName="id")
     * })
     */
    private $loteAlmacen;

    /**
     * @var \CtlProducto
     *
     * @ORM\ManyToOne(targetEntity="CtlProducto")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="lote_id_producto", referencedColumnName="id")
     * })
     */
    private $loteProducto;

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
