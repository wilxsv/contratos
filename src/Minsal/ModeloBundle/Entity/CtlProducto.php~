<?php

namespace Minsal\ModeloBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CtlProducto
 *
 * @ORM\Table(name="ctl_producto", uniqueConstraints={@ORM\UniqueConstraint(name="id_sinab", columns={"id_producto_sibasi"})}, indexes={@ORM\Index(name="fki_um", columns={"unidad_medida_producto"})})
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
     * @ORM\Column(name="codigo_producto", type="string", length=50, nullable=false)
     */
    private $codigoProducto;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre_producto", type="string", length=1000, nullable=false)
     */
    private $nombreProducto;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_producto_sibasi", type="integer", nullable=false)
     */
    private $idProductoSibasi;

    /**
     * @var integer
     *
     * @ORM\Column(name="estado_producto", type="integer", nullable=true)
     */
    private $estadoProducto;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_establecimiento_sinab", type="integer", nullable=true)
     */
    private $idEstablecimientoSinab;

    /**
     * @var \CtlUnidadMedida
     *
     * @ORM\ManyToOne(targetEntity="CtlUnidadMedida")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="unidad_medida_producto", referencedColumnName="id")
     * })
     */
    private $unidadMedidaProducto;


}

