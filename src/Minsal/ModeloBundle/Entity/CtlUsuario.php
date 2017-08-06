<?php

namespace Minsal\ModeloBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CtlUsuario
 *
 * @ORM\Table(name="ctl_usuario", indexes={@ORM\Index(name="ctl_usuario_id_rol_idx", columns={"id_rol"})})
 * @ORM\Entity
 */
class CtlUsuario
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="ctl_usuario_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="usuario", type="string", length=15, nullable=true)
     */
    private $usuario;

    /**
     * @var string
     *
     * @ORM\Column(name="clave", type="string", length=255, nullable=true)
     */
    private $clave;

    /**
     * @var \CtlRol
     *
     * @ORM\ManyToOne(targetEntity="CtlRol")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_rol", referencedColumnName="id")
     * })
     */
    private $idRol;


}

