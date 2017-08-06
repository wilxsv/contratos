<?php

namespace Minsal\ModeloBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CtlContratosIncrementos
 *
 * @ORM\Table(name="ctl_contratos_incrementos")
 * @ORM\Entity
 */
class CtlContratosIncrementos
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="ctl_contratos_incrementos_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_producto", type="integer", nullable=true)
     */
    private $idProducto;

    /**
     * @var integer
     *
     * @ORM\Column(name="cantidad_incrementar", type="integer", nullable=true)
     */
    private $cantidadIncrementar;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_contrato", type="integer", nullable=true)
     */
    private $idContrato;

    /**
     * @var string
     *
     * @ORM\Column(name="monto_incrementar", type="decimal", precision=10, scale=0, nullable=true)
     */
    private $montoIncrementar;


}

