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
     * @ORM\Column(name="nombre_proveedor", type="string", length=50, nullable=false)
     */
    private $nombreProveedor;

    /**
     * @var string
     *
     * @ORM\Column(name="nit", type="string", length=50, nullable=false)
     */
    private $nit;

    /**
     * @var integer
     *
     * @ORM\Column(name="proveedor_id_proveedor", type="integer", nullable=true)
     */
    private $proveedorIdProveedor;



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
     * Set nit
     *
     * @param string $nit
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
     * Set proveedorIdProveedor
     *
     * @param integer $proveedorIdProveedor
     * @return CtlProveedor
     */
    public function setProveedorIdProveedor($proveedorIdProveedor)
    {
        $this->proveedorIdProveedor = $proveedorIdProveedor;

        return $this;
    }

    /**
     * Get proveedorIdProveedor
     *
     * @return integer 
     */
    public function getProveedorIdProveedor()
    {
        return $this->proveedorIdProveedor;
    }
}
