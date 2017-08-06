<?php

namespace Minsal\ModeloBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CtlAnalisisIncremento
 *
 * @ORM\Table(name="ctl_analisis_incremento")
 * @ORM\Entity
 */
class CtlAnalisisIncremento
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="ctl_analisis_incremento_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_incremento", type="integer", nullable=true)
     */
    private $idIncremento;

    /**
     * @var string
     *
     * @ORM\Column(name="numero_compra", type="string", length=255, nullable=true)
     */
    private $numeroCompra;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_contrato", type="integer", nullable=true)
     */
    private $idContrato;

    /**
     * @var string
     *
     * @ORM\Column(name="numero_contrato", type="string", length=100, nullable=true)
     */
    private $numeroContrato;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_proveedor", type="integer", nullable=true)
     */
    private $idProveedor;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre_proveedor", type="string", length=255, nullable=true)
     */
    private $nombreProveedor;

    /**
     * @var string
     *
     * @ORM\Column(name="codigo_producto", type="string", length=100, nullable=true)
     */
    private $codigoProducto;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre_producto", type="string", length=255, nullable=true)
     */
    private $nombreProducto;

    /**
     * @var integer
     *
     * @ORM\Column(name="cantidad_incrementada", type="integer", nullable=true)
     */
    private $cantidadIncrementada;

    /**
     * @var string
     *
     * @ORM\Column(name="precio_unitario", type="decimal", precision=8, scale=2, nullable=true)
     */
    private $precioUnitario;

    /**
     * @var string
     *
     * @ORM\Column(name="monto_contrato_incrementado", type="decimal", precision=8, scale=2, nullable=true)
     */
    private $montoContratoIncrementado;

    /**
     * @var string
     *
     * @ORM\Column(name="observacion", type="text", nullable=true)
     */
    private $observacion;


}

