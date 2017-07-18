<?php

namespace Minsal\ModeloBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;


/**
 * ProcesoIncremento
 *
 * @ORM\Table(name="proceso_incremento")
 * @ORM\Entity(repositoryClass="Minsal\ModeloBundle\Repository\ProcesoIncrementoRepository")
 */
class ProcesoIncremento
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
    *  @ORM\OneToOne(targetEntity="EstadoProceso", inversedBy="procesoincremento")
     */
    private $estadoproceso;

    


    /**
     * @var string
     *
     * @ORM\Column(name="codigo_compra", type="string", length=255)
     */
    private $codigoCompra;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_creacion_at", type="datetime")
     */
    private $fechaCreacionAt;



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
     * Set codigoCompra
     *
     * @param string $codigoCompra
     * @return ProcesoIncremento
     */
    public function setCodigoCompra($codigoCompra)
    {
        $this->codigoCompra = $codigoCompra;

        return $this;
    }

    /**
     * Get codigoCompra
     *
     * @return string 
     */
    public function getCodigoCompra()
    {
        return $this->codigoCompra;
    }

    /**
     * Set fechaCreacionAt
     *
     * @param \DateTime $fechaCreacionAt
     * @return ProcesoIncremento
     */
    public function setFechaCreacionAt($fechaCreacionAt)
    {
        $this->fechaCreacionAt = $fechaCreacionAt;

        return $this;
    }

    /**
     * Get fechaCreacionAt
     *
     * @return \DateTime 
     */
    public function getFechaCreacionAt()
    {
        return $this->fechaCreacionAt;
    }

    /**
     * Set numeroContrato
     *
     * @param string $numeroContrato
     * @return ProcesoIncremento
     */
    public function setNumeroContrato($numeroContrato)
    {
        $this->numeroContrato = $numeroContrato;

        return $this;
    }

    /**
     * Get numeroContrato
     *
     * @return string 
     */
    public function getNumeroContrato()
    {
        return $this->numeroContrato;
    }

    /**
     * Set codigoProveedor
     *
     * @param string $codigoProveedor
     * @return ProcesoIncremento
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
     * Set isProveedorValido
     *
     * @param boolean $isProveedorValido
     * @return ProcesoIncremento
     */
    public function setIsProveedorValido($isProveedorValido)
    {
        $this->isProveedorValido = $isProveedorValido;

        return $this;
    }

    /**
     * Get isProveedorValido
     *
     * @return boolean 
     */
    public function getIsProveedorValido()
    {
        return $this->isProveedorValido;
    }

    /**
     * Set codigoMedicamento
     *
     * @param string $codigoMedicamento
     * @return ProcesoIncremento
     */
    public function setCodigoMedicamento($codigoMedicamento)
    {
        $this->codigoMedicamento = $codigoMedicamento;

        return $this;
    }

    /**
     * Get codigoMedicamento
     *
     * @return string 
     */
    public function getCodigoMedicamento()
    {
        return $this->codigoMedicamento;
    }

    /**
     * Set isMedicamentoValido
     *
     * @param boolean $isMedicamentoValido
     * @return ProcesoIncremento
     */
    public function setIsMedicamentoValido($isMedicamentoValido)
    {
        $this->isMedicamentoValido = $isMedicamentoValido;

        return $this;
    }

    /**
     * Get isMedicamentoValido
     *
     * @return boolean 
     */
    public function getIsMedicamentoValido()
    {
        return $this->isMedicamentoValido;
    }

    /**
     * Set precioUnitario
     *
     * @param float $precioUnitario
     * @return ProcesoIncremento
     */
    public function setPrecioUnitario($precioUnitario)
    {
        $this->precioUnitario = $precioUnitario;

        return $this;
    }

    /**
     * Get precioUnitario
     *
     * @return float 
     */
    public function getPrecioUnitario()
    {
        return $this->precioUnitario;
    }

    /**
     * Set cantidad
     *
     * @param integer $cantidad
     * @return ProcesoIncremento
     */
    public function setCantidad($cantidad)
    {
        $this->cantidad = $cantidad;

        return $this;
    }

    /**
     * Get cantidad
     *
     * @return integer 
     */
    public function getCantidad()
    {
        return $this->cantidad;
    }

    /**
     * Set estadoproceso
     *
     * @param \Minsal\ModeloBundle\Entity\EstadoProceso $estadoproceso
     * @return ProcesoIncremento
     */
    public function setEstadoproceso(Minsal\ModeloBundle\Entity\EstadoProceso $estadoproceso = null)
    {
        $this->estadoproceso = $estadoproceso;

        return $this;
    }

    /**
     * Get estadoproceso
     *
     * @return \Minsal\ModeloBundle\Entity\EstadoProceso 
     */
    public function getEstadoproceso()
    {
        return $this->estadoproceso;
    }
}
