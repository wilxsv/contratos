<?php

namespace Minsal\ModeloBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MtnProductoContrato
 *
 * @ORM\Table(name="mtn_producto_contrato", indexes={@ORM\Index(name="idx_116672617def239f", columns={"mtn_contrato"}), @ORM\Index(name="idx_11667261bc3d40a9", columns={"mtn_producto"})})
 * @ORM\Entity
 */
class MtnProductoContrato
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="mtn_producto_contrato_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="mtn_producto", type="integer", nullable=true)
     */
    private $mtnProducto;

    /**
     * @var integer
     *
     * @ORM\Column(name="mtn_contrato", type="bigint", nullable=true)
     */
    private $mtnContrato;

    /**
     * @var string
     *
     * @ORM\Column(name="cantidad", type="decimal", precision=10, scale=0, nullable=false)
     */
    private $cantidad;

    /**
     * @var string
     *
     * @ORM\Column(name="precio_unitario", type="decimal", precision=16, scale=8, nullable=false)
     */
    private $precioUnitario;

    /**
     * @var integer
     *
     * @ORM\Column(name="mtn_proveedor", type="integer", nullable=true)
     */
    private $mtnProveedor;


}

