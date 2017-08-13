<?php

namespace Minsal\ModeloBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MtnMedicamentoProrroga
 *
 * @ORM\Table(name="mtn_medicamento_prorroga", indexes={@ORM\Index(name="mtn_medicamento_prorroga_prorrogaid_idx", columns={"prorrogaid"}), @ORM\Index(name="mtn_medicamento_prorroga_contratopid_idx", columns={"contratopid"})})
 * @ORM\Entity
 */
class MtnMedicamentoProrroga
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="mtn_medicamento_prorroga_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="contratopid", type="integer", nullable=true)
     */
    private $contratopid;

    /**
     * @var string
     *
     * @ORM\Column(name="medicamentos", type="text", nullable=true)
     */
    private $medicamentos;

    /**
     * @var \CtlProrroga
     *
     * @ORM\ManyToOne(targetEntity="CtlProrroga")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="prorrogaid", referencedColumnName="id")
     * })
     */
    private $prorrogaid;



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
     * Set contratopid
     *
     * @param integer $contratopid
     *
     * @return MtnMedicamentoProrroga
     */
    public function setContratopid($contratopid)
    {
        $this->contratopid = $contratopid;

        return $this;
    }

    /**
     * Get contratopid
     *
     * @return integer
     */
    public function getContratopid()
    {
        return $this->contratopid;
    }

    /**
     * Set medicamentos
     *
     * @param string $medicamentos
     *
     * @return MtnMedicamentoProrroga
     */
    public function setMedicamentos($medicamentos)
    {
        $this->medicamentos = $medicamentos;

        return $this;
    }

    /**
     * Get medicamentos
     *
     * @return string
     */
    public function getMedicamentos()
    {
        return $this->medicamentos;
    }

    /**
     * Set prorrogaid
     *
     * @param \Minsal\ModeloBundle\Entity\CtlProrroga $prorrogaid
     *
     * @return MtnMedicamentoProrroga
     */
    public function setProrrogaid(\Minsal\ModeloBundle\Entity\CtlProrroga $prorrogaid = null)
    {
        $this->prorrogaid = $prorrogaid;

        return $this;
    }

    /**
     * Get prorrogaid
     *
     * @return \Minsal\ModeloBundle\Entity\CtlProrroga
     */
    public function getProrrogaid()
    {
        return $this->prorrogaid;
    }
}
