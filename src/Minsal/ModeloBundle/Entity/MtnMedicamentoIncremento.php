<?php

namespace Minsal\ModeloBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MtnMedicamentoIncremento
 *
 * @ORM\Table(name="mtn_medicamento_incremento", indexes={@ORM\Index(name="idx_dfdcc5577d6e63ae", columns={"incrementoid"}), @ORM\Index(name="idx_dfdcc5573c48e38f", columns={"contratoid"})})
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


}

