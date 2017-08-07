<?php

namespace Minsal\ModeloBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MtnProductoContrato
 *
 * @ORM\Table(name="mtn_producto_contrato", indexes={@ORM\Index(name="fki_mtn_producto", columns={"mtn_producto"}), @ORM\Index(name="idx_11667261736a527d", columns={"mtn_establecimiento"}), @ORM\Index(name="fki_mtn_proveedor", columns={"mtn_proveedor"}), @ORM\Index(name="fki_mtn_contrato", columns={"mtn_contrato"})})
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
     * @ORM\Column(name="mtn_contrato", type="integer", nullable=true)
     */
    private $mtnContrato;

    /**
     * @var string
     *
     * @ORM\Column(name="cantidad", type="decimal", precision=12, scale=2, nullable=true)
     */
    private $cantidad;

    /**
     * @var string
     *
     * @ORM\Column(name="precio_unitario", type="decimal", precision=15, scale=5, nullable=true)
     */
    private $precioUnitario;

    /**
     * @var \CtlProducto
     *
     * @ORM\ManyToOne(targetEntity="CtlProducto")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="mtn_producto", referencedColumnName="id")
     * })
     */
    private $mtnProducto;

    /**
     * @var \CtlProveedor
     *
     * @ORM\ManyToOne(targetEntity="CtlProveedor")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="mtn_proveedor", referencedColumnName="id")
     * })
     */
    private $mtnProveedor;

    /**
     * @var \CtlEstablecimiento
     *
     * @ORM\ManyToOne(targetEntity="CtlEstablecimiento")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="mtn_establecimiento", referencedColumnName="id")
     * })
     */
    private $mtnEstablecimiento;


}

