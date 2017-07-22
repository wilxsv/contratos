<?php

namespace Minsal\ModeloBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CtlProducto
 *
 * @ORM\Table(name="ctl_producto")
 * @ORM\Entity
 */
class CtlProducto
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="ctl_producto_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="producto_id_unidad_medida", type="integer", nullable=true)
     */
    private $productoIdUnidadMedida;

    /**
     * @var integer
     *
     * @ORM\Column(name="producto_id_establecimiento", type="integer", nullable=true)
     */
    private $productoIdEstablecimiento;

    /**
     * @var string
     *
     * @ORM\Column(name="codigo_producto", type="string", length=50, nullable=false)
     */
    private $codigoProducto;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre_producto", type="string", length=50, nullable=false)
     */
    private $nombreProducto;

    /**
     * @var string
     *
     * @ORM\Column(name="estado_producto", type="string", length=50, nullable=false)
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
     * Set productoIdUnidadMedida
     *
     * @param integer $productoIdUnidadMedida
     * @return CtlProducto
     */
    public function setProductoIdUnidadMedida($productoIdUnidadMedida)
    {
        $this->productoIdUnidadMedida = $productoIdUnidadMedida;

        return $this;
    }

    /**
     * Get productoIdUnidadMedida
     *
     * @return integer 
     */
    public function getProductoIdUnidadMedida()
    {
        return $this->productoIdUnidadMedida;
    }

    /**
     * Set productoIdEstablecimiento
     *
     * @param integer $productoIdEstablecimiento
     * @return CtlProducto
     */
    public function setProductoIdEstablecimiento($productoIdEstablecimiento)
    {
        $this->productoIdEstablecimiento = $productoIdEstablecimiento;

        return $this;
    }

    /**
     * Get productoIdEstablecimiento
     *
     * @return integer 
     */
    public function getProductoIdEstablecimiento()
    {
        return $this->productoIdEstablecimiento;
    }

    /**
     * Set codigoProducto
     *
     * @param string $codigoProducto
     * @return CtlProducto
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
     * @return CtlProducto
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
     * Set estadoProducto
     *
     * @param string $estadoProducto
     * @return CtlProducto
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
