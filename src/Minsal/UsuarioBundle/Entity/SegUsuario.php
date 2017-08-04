<?php

namespace Minsal\UsuarioBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

use Symfony\Component\Security\Core\User\UserInterface;


/**
 * SegUsuario
 *
 * @ORM\Table(name="seg_usuario")
 * @ORM\Entity
 */
class SegUsuario implements UserInterface, \Serializable
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


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     *
     * @return SegUsuario
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return string
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set password
     *
     * @param string $password
     *
     * @return SegUsuario
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set tokenSinab
     *
     * @param string $tokenSinab
     *
     * @return SegUsuario
     */
    public function setTokenSinab($tokenSinab)
    {
        $this->tokenSinab = $tokenSinab;

        return $this;
    }

    /**
     * Get tokenSinab
     *
     * @return string
     */
    public function getTokenSinab()
    {
        return $this->tokenSinab;
    }

    /**
     * Set establecimientoid
     *
     * @param integer $establecimientoid
     *
     * @return SegUsuario
     */
    public function setEstablecimientoid($establecimientoid)
    {
        $this->establecimientoid = $establecimientoid;

        return $this;
    }

    /**
     * Get establecimientoid
     *
     * @return integer
     */
    public function getEstablecimientoid()
    {
        return $this->establecimientoid;
    }

    /**
     * Set fechaCreacion
     *
     * @param \DateTime $fechaCreacion
     *
     * @return SegUsuario
     */
    public function setFechaCreacion($fechaCreacion)
    {
        $this->fechaCreacion = $fechaCreacion;

        return $this;
    }

    /**
     * Get fechaCreacion
     *
     * @return \DateTime
     */
    public function getFechaCreacion()
    {
        return $this->fechaCreacion;
    }

    /**
     * Set fechaModificacion
     *
     * @param \DateTime $fechaModificacion
     *
     * @return SegUsuario
     */
    public function setFechaModificacion($fechaModificacion)
    {
        $this->fechaModificacion = $fechaModificacion;

        return $this;
    }

    /**
     * Get fechaModificacion
     *
     * @return \DateTime
     */
    public function getFechaModificacion()
    {
        return $this->fechaModificacion;
    }

    /**
     * Set salt
     *
     * @param string $salt
     *
     * @return SegUsuario
     */
    public function setSalt($salt)
    {
        $this->salt = $salt;

        return $this;
    }

    /**
     * Get salt
     *
     * @return string
     */
    public function getSalt()
    {
        return $this->salt;
    }

    /**
     * Add idSegRol
     *
     * @param \Minsal\UsuarioBundle\Entity\SegRol $idSegRol
     *
     * @return SegUsuario
     */
    public function addIdSegRol(\Minsal\UsuarioBundle\Entity\SegRol $idSegRol)
    {
        $this->idSegRol[] = $idSegRol;

        return $this;
    }

    /**
     * Remove idSegRol
     *
     * @param \Minsal\UsuarioBundle\Entity\SegRol $idSegRol
     */
    public function removeIdSegRol(\Minsal\UsuarioBundle\Entity\SegRol $idSegRol)
    {
        $this->idSegRol->removeElement($idSegRol);
    }

    /**
     * Get idSegRol
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getIdSegRol()
    {
        return $this->idSegRol;
    }

    public function eraseCredentials()
    {
        
    }

    public function serialize()
    {
        return serialize(array(
            $this->id,
            $this->nombre,
            $this->password
        ));
    }

    public function unserialize($serialized)
    {
        list (
            $this->id,
            $this->nombre,
            $this->password
        ) = unserialize($serialized);
    }
}
