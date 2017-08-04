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
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="ctl_almacen_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre_almacen", type="string", length=100, nullable=false)
     */
    private $nombreAlmacen;


}

