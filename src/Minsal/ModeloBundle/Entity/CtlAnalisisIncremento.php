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
     * @var integer
     *
     * @ORM\Column(name="numero_compra", type="integer", nullable=true)
     */
    private $numeroCompra;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_contrato", type="integer", nullable=true)
     */
    private $idContrato;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_proveedor", type="integer", nullable=true)
     */
    private $idProveedor;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_producto", type="integer", nullable=true)
     */
    private $idProducto;

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
     * @ORM\Column(name="monto_incrementado", type="decimal", precision=8, scale=2, nullable=true)
     */
    private $montoIncrementado;

    /**
     * @var string
     *
     * @ORM\Column(name="observacion", type="text", nullable=true)
     */
    private $observacion;


}

