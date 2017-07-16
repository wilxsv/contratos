<?php

namespace Minsal\ModeloBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

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
     * Un proveedor tiene varios contratos.
     * @ORM\OneToMany(targetEntity="Contrato", mappedBy="proveedor")
     */
    private $contrato;

    /**
     * Muchos contratos tienen un resumen
     * @ORM\ManyToOne(targetEntity="Contrato", inversedBy="proveedor")
     */
    private $contratos;

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
