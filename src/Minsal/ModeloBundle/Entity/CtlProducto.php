<?php

namespace Minsal\ModeloBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CtlProducto
 *
 * @ORM\Table(name="ctl_producto", indexes={@ORM\Index(name="id_establecimiento", columns={"producto_id_establecimiento", "producto_id_unidad_medida"}), @ORM\Index(name="producto_id_unidad_medida", columns={"producto_id_unidad_medida"}), @ORM\Index(name="IDX_CE4BEAC37E474584", columns={"producto_id_establecimiento"})})
 * @ORM\Entity
 */
class CtlProducto
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
     * @ORM\Column(name="codigo_producto", type="string", length=50, nullable=false)
     */
    private $codigoProducto;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre_producto", type="string", length=50, nullable=false)
     */
    private $nombreProducto;

    /**
     * @var string
     *
     * @ORM\Column(name="estado_producto", type="string", length=50, nullable=false)
     */
    private $estadoProducto;

    /**
     * @var \CtlUnidadMedida
     *
     * @ORM\ManyToOne(targetEntity="CtlUnidadMedida")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="producto_id_unidad_medida", referencedColumnName="id")
     * })
     */
    private $productoUnidadMedida;

    /**
     * @var \CtlEstablecimiento
     *
     * @ORM\ManyToOne(targetEntity="CtlEstablecimiento")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="producto_id_establecimiento", referencedColumnName="id")
     * })
     */
    private $productoEstablecimiento;


}
