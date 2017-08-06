<?php

namespace Minsal\ModeloBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CtlContrato
 *
 * @ORM\Table(name="ctl_contrato", indexes={@ORM\Index(name="fki_modalidad_compra", columns={"numero_modalidad_compra"}), @ORM\Index(name="fki_establecimiento_sinab", columns={"id_establecimiento"}), @ORM\Index(name="fki_proveedor", columns={"contrato_proveedor"}), @ORM\Index(name="fki_proveedor_contrato", columns={"contrato_proveedor"}), @ORM\Index(name="fki_proveedor_sinab", columns={"contrato_proveedor"})})
 * @ORM\Entity
 */
class CtlContrato
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_contrato", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="ctl_contrato_id_contrato_seq", allocationSize=1, initialValue=1)
     */
    private $idContrato;

    /**
     * @var string
     *
     * @ORM\Column(name="numero_contrato", type="string", length=50, nullable=false)
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
     * @ORM\Column(name="id_contrato_sinab", type="integer", nullable=true)
     */
    private $idContratoSinab;

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
     * @var \CtlEstablecimiento
     *
     * @ORM\ManyToOne(targetEntity="CtlEstablecimiento")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_establecimiento", referencedColumnName="id_establecimiento_sinab")
     * })
     */
    private $idEstablecimiento;

    /**
     * @var \CtlProveedor
     *
     * @ORM\ManyToOne(targetEntity="CtlProveedor")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="contrato_proveedor", referencedColumnName="id_proveedor_sinab")
     * })
     */
    private $contratoProveedor;



    /**
     * Get idContrato
     *
     * @return integer
     */
    public function getIdContrato()
    {
        return $this->idContrato;
    }

    /**
     * Set numeroContrato
     *
     * @param string $numeroContrato
     *
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
     *
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
     * Set idContratoSinab
     *
     * @param integer $idContratoSinab
     *
     * @return CtlContrato
     */
    public function setIdContratoSinab($idContratoSinab)
    {
        $this->idContratoSinab = $idContratoSinab;

        return $this;
    }

    /**
     * Get idContratoSinab
     *
     * @return integer
     */
    public function getIdContratoSinab()
    {
        return $this->idContratoSinab;
    }

    /**
     * Set numeroModalidadCompra
     *
     * @param \Minsal\ModeloBundle\Entity\CtlModalidadCompra $numeroModalidadCompra
     *
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
     * Set idEstablecimiento
     *
     * @param \Minsal\ModeloBundle\Entity\CtlEstablecimiento $idEstablecimiento
     *
     * @return CtlContrato
     */
    public function setIdEstablecimiento(\Minsal\ModeloBundle\Entity\CtlEstablecimiento $idEstablecimiento = null)
    {
        $this->idEstablecimiento = $idEstablecimiento;

        return $this;
    }

    /**
     * Get idEstablecimiento
     *
     * @return \Minsal\ModeloBundle\Entity\CtlEstablecimiento
     */
    public function getIdEstablecimiento()
    {
        return $this->idEstablecimiento;
    }

    /**
     * Set contratoProveedor
     *
     * @param \Minsal\ModeloBundle\Entity\CtlProveedor $contratoProveedor
     *
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
}
