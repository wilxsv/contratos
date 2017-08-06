<?php

namespace Minsal\ModeloBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CtlContrato
 *
 * @ORM\Table(name="ctl_contrato", indexes={@ORM\Index(name="fki_establecimiento_sinab", columns={"id_establecimiento"}), @ORM\Index(name="fki_proveedor_sinab", columns={"contrato_proveedor"}), @ORM\Index(name="fki_modalidad_compra", columns={"numero_modalidad_compra"}), @ORM\Index(name="fki_proveedor", columns={"contrato_proveedor"}), @ORM\Index(name="fki_proveedor_contrato", columns={"contrato_proveedor"})})
 * @ORM\Entity
 */
class CtlContrato
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="ctl_contrato_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="numero_modalidad_compra", type="integer", nullable=true)
     */
    private $numeroModalidadCompra;

    /**
     * @var integer
     *
     * @ORM\Column(name="contrato_proveedor", type="integer", nullable=true)
     */
    private $idEstablecimiento;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_establecimiento", type="integer", nullable=true)
     */
    private $contratoProveedor;

    /***
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
     * @ORM\Column(name="id_contrato_sinab", type="integer", nullable=true)
     */
    private $idContratoSinab;

}

