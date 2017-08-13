<?php

namespace Minsal\ModeloBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CtlContrato
 *
 * @ORM\Table(name="ctl_contrato", indexes={@ORM\Index(name="fki_contrato_modalidad", columns={"numero_modalidad"}), @ORM\Index(name="fki_prove_contrat", columns={"id_proveedor"}), @ORM\Index(name="fki_contrato_establecimiento", columns={"establecimiento"})})
 * @ORM\Entity
 */
class CtlContrato
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="monto_contrato", type="decimal", precision=16, scale=4, nullable=false)
     */
    private $montoContrato;

    /**
     * @var string
     *
     * @ORM\Column(name="numero_contrato", type="string", length=50, nullable=true)
     */
    private $numeroContrato;

    /**
     * @var \CtlEstablecimiento
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="CtlEstablecimiento")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="establecimiento", referencedColumnName="id")
     * })
     */
    private $establecimiento;

    /**
     * @var \CtlProveedor
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="CtlProveedor")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_proveedor", referencedColumnName="id")
     * })
     */
    private $idProveedor;

    /**
     * @var \CtlModalidadCompra
     *
     * @ORM\ManyToOne(targetEntity="CtlModalidadCompra")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="numero_modalidad", referencedColumnName="id")
     * })
     */
    private $numeroModalidad;



    /**
     * Set id
     *
     * @param integer $id
     *
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
     * Set establecimiento
     *
     * @param \Minsal\ModeloBundle\Entity\CtlEstablecimiento $establecimiento
     *
     * @return CtlContrato
     */
    public function setEstablecimiento(\Minsal\ModeloBundle\Entity\CtlEstablecimiento $establecimiento)
    {
        $this->establecimiento = $establecimiento;

        return $this;
    }

    /**
     * Get establecimiento
     *
     * @return \Minsal\ModeloBundle\Entity\CtlEstablecimiento
     */
    public function getEstablecimiento()
    {
        return $this->establecimiento;
    }

    /**
     * Set idProveedor
     *
     * @param \Minsal\ModeloBundle\Entity\CtlProveedor $idProveedor
     *
     * @return CtlContrato
     */
    public function setIdProveedor(\Minsal\ModeloBundle\Entity\CtlProveedor $idProveedor)
    {
        $this->idProveedor = $idProveedor;

        return $this;
    }

    /**
     * Get idProveedor
     *
     * @return \Minsal\ModeloBundle\Entity\CtlProveedor
     */
    public function getIdProveedor()
    {
        return $this->idProveedor;
    }

    /**
     * Set numeroModalidad
     *
     * @param \Minsal\ModeloBundle\Entity\CtlModalidadCompra $numeroModalidad
     *
     * @return CtlContrato
     */
    public function setNumeroModalidad(\Minsal\ModeloBundle\Entity\CtlModalidadCompra $numeroModalidad = null)
    {
        $this->numeroModalidad = $numeroModalidad;

        return $this;
    }

    /**
     * Get numeroModalidad
     *
     * @return \Minsal\ModeloBundle\Entity\CtlModalidadCompra
     */
    public function getNumeroModalidad()
    {
        return $this->numeroModalidad;
    }
}
