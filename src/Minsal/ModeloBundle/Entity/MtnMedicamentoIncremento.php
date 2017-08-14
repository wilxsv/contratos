<?php

namespace Minsal\ModeloBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MtnMedicamentoIncremento
 *
 * @ORM\Table(name="mtn_medicamento_incremento", indexes={@ORM\Index(name="fki_med_incre", columns={"incrementoid"}), @ORM\Index(name="fki_med_incr_contr", columns={"contratoid"})})
 * @ORM\Entity
 */
class MtnMedicamentoIncremento
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="mtn_medicamento_incremento_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="contratoid", type="integer", nullable=true)
     */
    private $contratoid;

    /**
     * @var string
     *
     * @ORM\Column(name="medicamentos", type="text", nullable=true)
     */
    private $medicamentos;

    /**
     * @var \CtlIncremento
     *
     * @ORM\ManyToOne(targetEntity="CtlIncremento")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="incrementoid", referencedColumnName="id")
     * })
     */
    private $incrementoid;



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
     * Set contratoid
     *
     * @param integer $contratoid
     *
     * @return MtnMedicamentoIncremento
     */
    public function setContratoid($contratoid)
    {
        $this->contratoid = $contratoid;

        return $this;
    }

    /**
     * Get contratoid
     *
     * @return integer
     */
    public function getContratoid()
    {
        return $this->contratoid;
    }

    /**
     * Set medicamentos
     *
     * @param string $medicamentos
     *
     * @return MtnMedicamentoIncremento
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
     * Set incrementoid
     *
     * @param \Minsal\ModeloBundle\Entity\CtlIncremento $incrementoid
     *
     * @return MtnMedicamentoIncremento
     */
    public function setIncrementoid(\Minsal\ModeloBundle\Entity\CtlIncremento $incrementoid = null)
    {
        $this->incrementoid = $incrementoid;

        return $this;
    }

    /**
     * Get incrementoid
     *
     * @return \Minsal\ModeloBundle\Entity\CtlIncremento
     */
    public function getIncrementoid()
    {
        return $this->incrementoid;
    }
}
