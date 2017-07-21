<?php

namespace Minsal\ModeloBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CtlUnidadMedida
 *
 * @ORM\Table(name="ctl_unidad_medida")
 * @ORM\Entity
 */
class CtlUnidadMedida
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
     * @ORM\Column(name="descripcion", type="string", length=50, nullable=false)
     */
    private $descripcion;

    /**
     * @var integer
     *
     * @ORM\Column(name="unidades_contenidas", type="integer", nullable=false)
     */
    private $unidadesContenidas;

    /**
     * @var string
     *
     * @ORM\Column(name="cantidad_decimal", type="decimal", precision=16, scale=8, nullable=false)
     */
    private $cantidadDecimal;


}
