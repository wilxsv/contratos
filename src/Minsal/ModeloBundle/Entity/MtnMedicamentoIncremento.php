<?php

namespace Minsal\ModeloBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MtnMedicamentoIncremento
 *
 * @ORM\Table(name="mtn_medicamento_incremento", indexes={@ORM\Index(name="idx_dfdcc5573c48e38f", columns={"contratoid"}), @ORM\Index(name="idx_dfdcc5577d6e63ae", columns={"incrementoid"})})
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
     * @ORM\Column(name="incrementoid", type="integer", nullable=true)
     */
    private $incrementoid;

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
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set incrementoid
     *
     * @param integer $incrementoid
     *
     * @return MtnMedicamentoIncremento
     */
    public function setIncrementoid($incrementoid)
    {
        $this->incrementoid = $incrementoid;

        return $this;
    }

    /**
     * Get incrementoid
     *
     * @return integer
     */
    public function getIncrementoid()
    {
        return $this->incrementoid;
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
}
