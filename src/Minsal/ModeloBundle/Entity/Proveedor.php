<?php

namespace Minsal\ModeloBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Proveedor
 *
 * @ORM\Table(name="proveedor")
 * @ORM\Entity(repositoryClass="Minsal\ModeloBundle\Repository\ProveedorRepository")
 */
class Proveedor
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;



    /**
     * @ORM\OneToMany(targetEntity="EstadoProveedor", mappedBy="proveedor")
     */
    private $estadosproveedor;

    public function __construct()
    {
        $this->estadosproveedor = new ArrayCollection();
    }



    /**
     * @ORM\OneToMany(targetEntity="Producto", mappedBy="proveedor")
     */
    private $productos;

    public function __construct()
    {
        $this->productos = new ArrayCollection();
    }


    /**
     * @ORM\ManyToOne(targetEntity="Contrato", inversedBy="proveedores")
     * 
     */
    private $contrato;


    /**
     * @var string
     *
     * @ORM\Column(name="codigo_proveedor", type="string", length=255)
     */
    private $codigoProveedor;

    /**
     * @var string
     *
     * @ORM\Column(name="entidad_legal", type="string", length=255)
     */
    private $entidadLegal;


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
     * @return Proveedor
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
     * Set entidadLegal
     *
     * @param string $entidadLegal
     * @return Proveedor
     */
    public function setEntidadLegal($entidadLegal)
    {
        $this->entidadLegal = $entidadLegal;

        return $this;
    }

    /**
     * Get entidadLegal
     *
     * @return string 
     */
    public function getEntidadLegal()
    {
        return $this->entidadLegal;
    }
}
