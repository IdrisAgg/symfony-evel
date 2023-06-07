<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AssureSinistre
 *
 * @ORM\Table(name="assure_sinistre", indexes={@ORM\Index(name="IDX_AD2AE2733256915B", columns={"relation_id"}), @ORM\Index(name="IDX_AD2AE2734E0AA1CD", columns={"rel_id"})})
 * @ORM\Entity
 */
class AssureSinistre
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="type_bien", type="string", length=255, nullable=false)
     */
    private $typeBien;

    /**
     * @var \Assure
     *
     * @ORM\ManyToOne(targetEntity="Assure")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="relation_id", referencedColumnName="id")
     * })
     */
    private $relation;

    /**
     * @var \Sinistre
     *
     * @ORM\ManyToOne(targetEntity="Sinistre")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="rel_id", referencedColumnName="id")
     * })
     */
    private $rel;


}
