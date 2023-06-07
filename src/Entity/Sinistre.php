<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Sinistre
 *
 * @ORM\Table(name="sinistre")
 * @ORM\Entity
 */
class Sinistre
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
     * @var \DateTime
     *
     * @ORM\Column(name="date_declaration", type="date", nullable=false)
     */
    private $dateDeclaration;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_expertise", type="date", nullable=false)
     */
    private $dateExpertise;

    /**
     * @var string
     *
     * @ORM\Column(name="estimation_expertise", type="string", length=255, nullable=false)
     */
    private $estimationExpertise;


}
