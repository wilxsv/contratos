<?php

namespace Minsal\ModeloBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CtlContrato
 *
 * @ORM\Table(name="ctl_contrato", uniqueConstraints={@ORM\UniqueConstraint(name="ctl_contrato_id_key", columns={"id"})}, indexes={@ORM\Index(name="fki_proveedor", columns={"contrato_proveedor"}), @ORM\Index(name="fki_modalidad_compra", columns={"numero_modalidad_compra"}), @ORM\Index(name="fki_proveedor_contrato", columns={"contrato_proveedor"}), @ORM\Index(name="fki_establecimiento_contrato", columns={"contrato_establecimiento"})})
 * @ORM\Entity
 */
class CtlContrato
{
    /**
     * @var string
     *
     * @ORM\Column(name="numero_contrato", type="string", length=50, nullable=false)
     * @ORM\Id
     */
    private $numeroContrato;

    /**
     * @var string
     *
     * @ORM\Column(name="monto_contrato", type="decimal", precision=16, scale=2, nullable=true)
     */
    private $montoContrato;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=true)
     */
    private $id;

    /**
     * @var \CtlModalidadCompra
     *
     * @ORM\ManyToOne(targetEntity="CtlModalidadCompra")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="numero_modalidad_compra", referencedColumnName="id")
     * })
     */
    private $numeroModalidadCompra;

    /**
     * @var \CtlProveedor
     *
     * @ORM\ManyToOne(targetEntity="CtlProveedor")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="contrato_proveedor", referencedColumnName="id")
     * })
     */
    private $contratoProveedor;

    /**
     * @var \CtlEstablecimiento
     *
     * @ORM\ManyToOne(targetEntity="CtlEstablecimiento")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="contrato_establecimiento", referencedColumnName="id")
     * })
     */
    private $contratoEstablecimiento;

    /**
     * Set numeroContrato
     *
     * @param integer $numeroContrato
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
     * Set id
     *
     * @param integer $id
     * @return CtlContrato
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
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
     * Set numeroModalidadCompra
     *
     * @param \Minsal\ModeloBundle\Entity\CtlModalidadCompra $numeroModalidadCompra
     * @return CtlContrato
     */
    public function setNumeroModalidadCompra(\Minsal\ModeloBundle\Entity\CtlModalidadCompra $numeroModalidadCompra = null)
    {
        $this->numeroModalidadCompra = $numeroModalidadCompra;

        return $this;
    }

    /**
     * Get numeroModalidadCompra
     *
     * @return \Minsal\ModeloBundle\Entity\CtlModalidadCompra 
     */
    public function getNumeroModalidadCompra()
    {
        return $this->numeroModalidadCompra;
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
