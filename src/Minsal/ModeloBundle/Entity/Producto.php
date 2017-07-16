<?php

namespace Minsal\ModeloBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;


/**
 * Producto
 *
 * @ORM\Table(name="producto")
 * @ORM\Entity(repositoryClass="Minsal\ModeloBundle\Repository\ProductoRepository")
 */
class Producto
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
     * @var string
     *
     * @ORM\Column(name="codigo_producto", type="string", length=255)
     */
    private $codigoProducto;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre_producto", type="string", length=255)
     */
    private $nombreProducto;

    /**
     * @var float
     *
     * @ORM\Column(name="precio_actual", type="float")
     */
    private $precioActual;

    /**
     * @var string
     *
     * @ORM\Column(name="estado_producto", type="string", length=255)
     */
    private $estadoProducto;


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
     * Set codigoProducto
     *
     * @param string $codigoProducto
     * @return Producto
     */
    public function setCodigoProducto($codigoProducto)
    {
        $this->codigoProducto = $codigoProducto;

        return $this;
    }

    /**
     * Get codigoProducto
     *
     * @return string 
     */
    public function getCodigoProducto()
    {
        return $this->codigoProducto;
    }

    /**
     * Set nombreProducto
     *
     * @param string $nombreProducto
     * @return Producto
     */
    public function setNombreProducto($nombreProducto)
    {
        $this->nombreProducto = $nombreProducto;

        return $this;
    }

    /**
     * Get nombreProducto
     *
     * @return string 
     */
    public function getNombreProducto()
    {
        return $this->nombreProducto;
    }

    /**
     * Set precioActual
     *
     * @param float $precioActual
     * @return Producto
     */
    public function setPrecioActual($precioActual)
    {
        $this->precioActual = $precioActual;

        return $this;
    }

    /**
     * Get precioActual
     *
     * @return float 
     */
    public function getPrecioActual()
    {
        return $this->precioActual;
    }

    /**
     * Set estadoProducto
     *
     * @param string $estadoProducto
     * @return Producto
     */
    public function setEstadoProducto($estadoProducto)
    {
        $this->estadoProducto = $estadoProducto;

        return $this;
    }

    /**
     * Get estadoProducto
     *
     * @return string 
     */
    public function getEstadoProducto()
    {
        return $this->estadoProducto;
    }
}