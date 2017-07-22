<?php

namespace Minsal\ModeloBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CtlContrato
 *
 * @ORM\Table(name="ctl_contrato", indexes={@ORM\Index(name="id_establecimiento", columns={"contrato_id_establecimiento", "contrato_id_proveedor"}), @ORM\Index(name="contrato_id_proveedor", columns={"contrato_id_proveedor"}), @ORM\Index(name="idx_f9989f5235c3b82", columns={"contrato_id_establecimiento"})})
 * @ORM\Entity
 */
class CtlContrato
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="ctl_contrato_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="numero_contrato", type="string", length=50, nullable=false)
     */
    private $numeroContrato;

    /**
     * @var string
     *
     * @ORM\Column(name="numero_modalidad_compra", type="string", length=50, nullable=false)
     */
    private $numeroModalidadCompra;

    /**
     * @var string
     *
     * @ORM\Column(name="monto_contrato", type="decimal", precision=16, scale=2, nullable=false)
     */
    private $montoContrato;

    /**
     * @var \CtlProveedor
     *
     * @ORM\ManyToOne(targetEntity="CtlProveedor")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="contrato_id_proveedor", referencedColumnName="id")
     * })
     */
    private $contratoProveedor;

    /**
     * @var \CtlEstablecimiento
     *
     * @ORM\ManyToOne(targetEntity="CtlEstablecimiento")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="contrato_id_establecimiento", referencedColumnName="id")
     * })
     */
    private $contratoEstablecimiento;



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
     * Set numeroContrato
     *
     * @param string $numeroContrato
     * @return CtlContrato
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
     * Set numeroModalidadCompra
     *
     * @param string $numeroModalidadCompra
     * @return CtlContrato
     */
    public function setNumeroModalidadCompra($numeroModalidadCompra)
    {
        $this->numeroModalidadCompra = $numeroModalidadCompra;

        return $this;
    }

    /**
     * Get numeroModalidadCompra
     *
     * @return string 
     */
    public function getNumeroModalidadCompra()
    {
        return $this->numeroModalidadCompra;
    }

    /**
     * Set montoContrato
     *
     * @param string $montoContrato
     * @return CtlContrato
     */
    public function setMontoContrato($montoContrato)
    {
        $this->montoContrato = $montoContrato;

        return $this;
    }

    /**
     * Get montoContrato
     *
     * @return string 
     */
    public function getMontoContrato()
    {
        return $this->montoContrato;
    }

    /**
     * Set contratoProveedor
     *
     * @param \Minsal\ModeloBundle\Entity\CtlProveedor $contratoProveedor
     * @return CtlContrato
     */
    public function setContratoProveedor(\Minsal\ModeloBundle\Entity\CtlProveedor $contratoProveedor = null)
    {
        $this->contratoProveedor = $contratoProveedor;

        return $this;
    }

    /**
     * Get contratoProveedor
     *
     * @return \Minsal\ModeloBundle\Entity\CtlProveedor 
     */
    public function getContratoProveedor()
    {
        return $this->contratoProveedor;
    }

    /**
     * Set contratoEstablecimiento
     *
     * @param \Minsal\ModeloBundle\Entity\CtlEstablecimiento $contratoEstablecimiento
     * @return CtlContrato
     */
    public function setContratoEstablecimiento(\Minsal\ModeloBundle\Entity\CtlEstablecimiento $contratoEstablecimiento = null)
    {
        $this->contratoEstablecimiento = $contratoEstablecimiento;

        return $this;
    }

    /**
     * Get contratoEstablecimiento
     *
     * @return \Minsal\ModeloBundle\Entity\CtlEstablecimiento 
     */
    public function getContratoEstablecimiento()
    {
        return $this->contratoEstablecimiento;
    }
}
