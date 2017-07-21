<?php

namespace Minsal\ModeloBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CtlContrato
 *
 * @ORM\Table(name="ctl_contrato", indexes={@ORM\Index(name="id_establecimiento", columns={"contrato_id_establecimiento", "contrato_id_proveedor"}), @ORM\Index(name="contrato_id_proveedor", columns={"contrato_id_proveedor"}), @ORM\Index(name="IDX_F9989F5235C3B82", columns={"contrato_id_establecimiento"})})
 * @ORM\Entity
 */
class CtlContrato
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
     * @ORM\Column(name="numero_contrato", type="string", length=50, nullable=false)
     */
    private $numeroContrato;

    /**
     * @var string
     *
     * @ORM\Column(name="numero_modalidad_compra", type="string", length=50, nullable=false)
     */
    private $numeroModalidadCompra;

    /**
     * @var string
     *
     * @ORM\Column(name="monto_contrato", type="decimal", precision=16, scale=2, nullable=false)
     */
    private $montoContrato;

    /**
     * @var string
     *
     * @ORM\Column(name="codigo_licitacion", type="string", length=50, nullable=false)
     */
    private $codigoLicitacion;

    /**
     * @var \CtlProveedor
     *
     * @ORM\ManyToOne(targetEntity="CtlProveedor")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="contrato_id_proveedor", referencedColumnName="id")
     * })
     */
    private $contratoProveedor;

    /**
     * @var \CtlEstablecimiento
     *
     * @ORM\ManyToOne(targetEntity="CtlEstablecimiento")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="contrato_id_establecimiento", referencedColumnName="id")
     * })
     */
    private $contratoEstablecimiento;


}
