<?php

namespace Minsal\ModeloBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CtlProducto
 *
 * @ORM\Table(name="ctl_producto", indexes={@ORM\Index(name="fki_producto_unidad_medida", columns={"unidad_medida_producto"}), @ORM\Index(name="fki_producto_establecimiento", columns={"establecimiento_producto"}), @ORM\Index(name="fki_esta_prod", columns={"estado_producto"})})
 * @ORM\Entity
 */
class CtlProducto
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="ctl_producto_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="codigo_producto", type="string", length=50, nullable=true)
     */
    private $codigoProducto;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre_producto", type="string", length=1000, nullable=true)
     */
    private $nombreProducto;

    /**
     * @var \CtlUnidadMedida
     *
     * @ORM\ManyToOne(targetEntity="CtlUnidadMedida")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="unidad_medida_producto", referencedColumnName="id")
     * })
     */
    private $unidadMedidaProducto;

    /**
     * @var \CtlEstados
     *
     * @ORM\ManyToOne(targetEntity="CtlEstados")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="estado_producto", referencedColumnName="id")
     * })
     */
    private $estadoProducto;

    /**
     * @var \CtlEstablecimiento
     *
     * @ORM\ManyToOne(targetEntity="CtlEstablecimiento")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="establecimiento_producto", referencedColumnName="id")
     * })
     */
    private $establecimientoProducto;


}

