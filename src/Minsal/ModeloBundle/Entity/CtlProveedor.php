<?php

namespace Minsal\ModeloBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CtlProveedor
 *
 * @ORM\Table(name="ctl_proveedor")
 * @ORM\Entity
 */
class CtlProveedor
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
     * @ORM\Column(name="codigo_proveedor", type="string", length=50, nullable=false)
     */
    private $codigoProveedor;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre_proveedor", type="string", length=50, nullable=false)
     */
    private $nombreProveedor;

    /**
     * @var string
     *
     * @ORM\Column(name="nit", type="string", length=50, nullable=false)
     */
    private $nit;


}
