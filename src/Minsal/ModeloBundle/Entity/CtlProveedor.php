<?php

namespace Minsal\ModeloBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CtlProveedor
 *
 * @ORM\Table(name="ctl_proveedor", uniqueConstraints={@ORM\UniqueConstraint(name="ctl_proveedor_id_proveedor_sinab_key", columns={"id_proveedor_sinab"})})
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
     * @ORM\Column(name="codigo_proveedor", type="string", length=50, nullable=true)
     */
    private $codigoProveedor;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre_proveedor", type="string", length=255, nullable=true)
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
     * @ORM\Column(name="nit", type="string", length=100, nullable=true)
     */
    private $nit;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_proveedor_sinab", type="integer", nullable=true)
     */
    private $idProveedorSinab;



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
     * Set codigoProveedor
     *
     * @param string $codigoProveedor
     *
     * @return CtlProveedor
     */
    public function setCodigoProveedor($codigoProveedor)
    {
        $this->codigoProveedor = $codigoProveedor;

        return $this;
    }

    /**
     * Get codigoProveedor
     *
     * @return string
     */
    public function getCodigoProveedor()
    {
        return $this->codigoProveedor;
    }

    /**
     * Set nombreProveedor
     *
     * @param string $nombreProveedor
     *
     * @return CtlProveedor
     */
    public function setNombreProveedor($nombreProveedor)
    {
        $this->nombreProveedor = $nombreProveedor;

        return $this;
    }

    /**
     * Get nombreProveedor
     *
     * @return string
     */
    public function getNombreProveedor()
    {
        return $this->nombreProveedor;
    }

    /**
     * Set estadoProveedor
     *
     * @param integer $estadoProveedor
     *
     * @return CtlProveedor
     */
    public function setEstadoProveedor($estadoProveedor)
    {
        $this->estadoProveedor = $estadoProveedor;

        return $this;
    }

    /**
     * Get estadoProveedor
     *
     * @return integer
     */
    public function getEstadoProveedor()
    {
        return $this->estadoProveedor;
    }

    /**
     * Set nit
     *
     * @param string $nit
     *
     * @return CtlProveedor
     */
    public function setNit($nit)
    {
        $this->nit = $nit;

        return $this;
    }

    /**
     * Get nit
     *
     * @return string
     */
    public function getNit()
    {
        return $this->nit;
    }

    /**
     * Set idProveedorSinab
     *
     * @param integer $idProveedorSinab
     *
     * @return CtlProveedor
     */
    public function setIdProveedorSinab($idProveedorSinab)
    {
        $this->idProveedorSinab = $idProveedorSinab;

        return $this;
    }

    /**
     * Get idProveedorSinab
     *
     * @return integer
     */
    public function getIdProveedorSinab()
    {
        return $this->idProveedorSinab;
    }
}
