<?php

namespace Minsal\ModeloBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CtlContrato
 *
 * @ORM\Table(name="ctl_contrato", indexes={@ORM\Index(name="fki_establecimiento_contrato", columns={"contrato_establecimiento"}), @ORM\Index(name="fki_proveedor_contrato", columns={"contrato_proveedor"}), @ORM\Index(name="fki_modalidad_compra", columns={"numero_modalidad_compra"}), @ORM\Index(name="fki_proveedor", columns={"contrato_proveedor"})})
 * @ORM\Entity
 */
class CtlContrato
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_contrato", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="ctl_contrato_id_contrato_seq", allocationSize=1, initialValue=1)
     */
    private $idContrato;

    /**
     * @var string
     *
     * @ORM\Column(name="numero_contrato", type="string", length=50, nullable=false)
     */
    private $numeroContrato;

    /**
     * @var string
     *
     * @ORM\Column(name="monto_contrato", type="decimal", precision=16, scale=2, nullable=true)
     */
    private $montoContrato;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_contrato_sibasi", type="integer", nullable=true)
     */
    private $idContratoSibasi;

    /**
     * @var \CtlEstablecimiento
     *
     * @ORM\ManyToOne(targetEntity="CtlEstablecimiento")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="contrato_establecimiento", referencedColumnName="establecimiento_id")
     * })
     */
    private $contratoEstablecimiento;

    /**
     * @var \CtlModalidadCompra
     *
     * @ORM\ManyToOne(targetEntity="CtlModalidadCompra")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="numero_modalidad_compra", referencedColumnName="id")
     * })
     */
    private $numeroModalidadCompra;

    /**
     * @var \CtlProveedor
     *
     * @ORM\ManyToOne(targetEntity="CtlProveedor")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="contrato_proveedor", referencedColumnName="id")
     * })
     */
    private $contratoProveedor;


}

