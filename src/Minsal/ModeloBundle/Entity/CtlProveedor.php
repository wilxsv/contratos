<?php

namespace Minsal\ModeloBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CtlProveedor
 *
 * @ORM\Table(name="ctl_proveedor", uniqueConstraints={@ORM\UniqueConstraint(name="uniq_sinab", columns={"id_proveedor_sinab"})})
 * @ORM\Entity
 */
class CtlProveedor
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="ctl_proveedor_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="codigo_proveedor", type="string", length=50, nullable=false)
     */
    private $codigoProveedor;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre_proveedor", type="string", length=255, nullable=false)
     */
    private $nombreProveedor;

    /**
     * @var integer
     *
     * @ORM\Column(name="estado_proveedor", type="integer", nullable=true)
     */
    private $estadoProveedor;

    /**
     * @var string
     *
     * @ORM\Column(name="nit", type="string", length=255, nullable=true)
     */
    private $nit;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_proveedor_sinab", type="integer", nullable=false)
     */
    private $idProveedorSinab;


}

