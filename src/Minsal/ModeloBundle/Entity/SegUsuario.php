<?php

namespace Minsal\ModeloBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SegUsuario
 *
 * @ORM\Table(name="seg_usuario")
 * @ORM\Entity
 */
class SegUsuario
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="seg_usuario_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="text", nullable=false)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=255, nullable=false)
     */
    private $password;

    /**
     * @var string
     *
     * @ORM\Column(name="token_sinab", type="string", length=255, nullable=false)
     */
    private $tokenSinab;

    /**
     * @var integer
     *
     * @ORM\Column(name="establecimientoid", type="integer", nullable=false)
     */
    private $establecimientoid;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_creacion", type="date", nullable=false)
     */
    private $fechaCreacion;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_modificacion", type="date", nullable=false)
     */
    private $fechaModificacion;

    /**
     * @var string
     *
     * @ORM\Column(name="salt", type="text", nullable=true)
     */
    private $salt;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="SegRol", inversedBy="segUsuarioid")
     * @ORM\JoinTable(name="seg_usuarios_roles",
     *   joinColumns={
     *     @ORM\JoinColumn(name="seg_usuarioid", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="id_seg_rol", referencedColumnName="id")
     *   }
     * )
     */
    private $idSegRol;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idSegRol = new \Doctrine\Common\Collections\ArrayCollection();
    }

}

