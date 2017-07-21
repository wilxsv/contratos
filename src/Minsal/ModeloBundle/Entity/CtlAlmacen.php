<?php

namespace Minsal\ModeloBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CtlAlmacen
 *
 * @ORM\Table(name="ctl_almacen")
 * @ORM\Entity
 */
class CtlAlmacen
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
     * @ORM\Column(name="nombre_almacen", type="string", length=100, nullable=false)
     */
    private $nombreAlmacen;


}
