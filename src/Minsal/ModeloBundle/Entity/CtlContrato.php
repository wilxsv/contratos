<?php

namespace Minsal\ModeloBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CtlContrato
 *
 * @ORM\Table(name="ctl_contrato", indexes={@ORM\Index(name="fki_establecimiento_sinab", columns={"id_establecimiento"}), @ORM\Index(name="fki_proveedor_sinab", columns={"contrato_proveedor"}), @ORM\Index(name="fki_proveedor_contrato", columns={"contrato_proveedor"}), @ORM\Index(name="fki_proveedor", columns={"contrato_proveedor"}), @ORM\Index(name="fki_modalidad_compra", columns={"numero_modalidad_compra"})})
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
     * @var integer
     *
     * @ORM\Column(name="numero_modalidad_compra", type="integer", nullable=true)
     */
    private $numeroModalidadCompra;

    /**
     * @var integer
     *
     * @ORM\Column(name="contrato_proveedor", type="integer", nullable=true)
     */
    private $contratoProveedor;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_establecimiento", type="integer", nullable=true)
     */
    private $idEstablecimiento;

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
     * @var string
     *
     * @ORM\Column(name="numero_contrato", type="string", nullable=true)
     */
    private $numeroContrato;



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
     * @param integer $numeroModalidadCompra
     *
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
     * @return integer
     */
    public function getNumeroModalidadCompra()
    {
        return $this->numeroModalidadCompra;
    }

    /**
     * Set contratoProveedor
     *
     * @param integer $contratoProveedor
     *
     * @return CtlContrato
     */
    public function setContratoProveedor($contratoProveedor)
    {
        $this->contratoProveedor = $contratoProveedor;

        return $this;
    }

    /**
     * Get contratoProveedor
     *
     * @return integer
     */
    public function getContratoProveedor()
    {
        return $this->contratoProveedor;
    }

    /**
     * Set idEstablecimiento
     *
     * @param integer $idEstablecimiento
     *
     * @return CtlContrato
     */
    public function setIdEstablecimiento($idEstablecimiento)
    {
        $this->idEstablecimiento = $idEstablecimiento;

        return $this;
    }

    /**
     * Get idEstablecimiento
     *
     * @return integer
     */
    public function getIdEstablecimiento()
    {
        return $this->idEstablecimiento;
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
}
