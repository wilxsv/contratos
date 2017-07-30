<?php

namespace Minsal\ModeloBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CtlContrato
 *
 * @ORM\Table(name="ctl_contrato", indexes={@ORM\Index(name="fki_proveedor", columns={"contrato_proveedor"}), @ORM\Index(name="fki_modalidad_compra", columns={"numero_modalidad_compra"}), @ORM\Index(name="fki_establecimiento_contrato", columns={"contrato_establecimiento"}), @ORM\Index(name="fki_proveedor_contrato", columns={"contrato_proveedor"})})
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
     * @ORM\Column(name="id_contrato_sibasi", type="integer", nullable=true)
     */
    private $idContratoSibasi;

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
     *   @ORM\JoinColumn(name="contrato_establecimiento", referencedColumnName="establecimiento_id")
     * })
     */
    private $contratoEstablecimiento;

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
     * Set idContratoSibasi
     *
     * @param integer $idContratoSibasi
     * @return CtlContrato
     */
    public function setIdContratoSibasi($idContratoSibasi)
    {
        $this->idContratoSibasi = $idContratoSibasi;

        return $this;
    }

    /**
     * Get idContratoSibasi
     *
     * @return integer 
     */
    public function getIdContratoSibasi()
    {
        return $this->idContratoSibasi;
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
}
