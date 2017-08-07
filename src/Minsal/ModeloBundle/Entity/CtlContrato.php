<?php

namespace Minsal\ModeloBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CtlContrato
 *
 * @ORM\Table(name="ctl_contrato", uniqueConstraints={@ORM\UniqueConstraint(name="ctl_contrato_id_contrato_sinab_key", columns={"id_contrato_sinab"})}, indexes={@ORM\Index(name="fki_contrato_modalidad", columns={"numero_modalidad"}), @ORM\Index(name="fki_contrato_establecimiento", columns={"establecimiento"})})
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
     * @ORM\Column(name="monto_contrato", type="decimal", precision=8, scale=2, nullable=true)
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
     * @ORM\Column(name="numero_contrato", type="string", length=50, nullable=true)
     */
    private $numeroContrato;

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
     * @var \CtlEstablecimiento
     *
     * @ORM\ManyToOne(targetEntity="CtlEstablecimiento")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="establecimiento", referencedColumnName="id")
     * })
     */
    private $establecimiento;



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

    /**
     * Set establecimiento
     *
     * @param \Minsal\ModeloBundle\Entity\CtlEstablecimiento $establecimiento
     *
     * @return CtlContrato
     */
    public function setEstablecimiento(\Minsal\ModeloBundle\Entity\CtlEstablecimiento $establecimiento = null)
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
}
