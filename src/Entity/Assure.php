<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Assure
 *
 * @ORM\Table(name="assure", indexes={@ORM\Index(name="IDX_C779CC29B288C3E3", columns={"assurance_id"})})
 * @ORM\Entity
 */
class Assure
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
     * @ORM\Column(name="nom", type="string", length=255, nullable=false)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=255, nullable=false)
     */
    private $prenom;

    /**
     * @var string
     *
     * @ORM\Column(name="tel", type="string", length=255, nullable=false)
     */
    private $tel;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_naissance", type="date", nullable=false)
     */
    private $dateNaissance;

    /**
     * @var \Assurance
     *
     * @ORM\ManyToOne(targetEntity="Assurance")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="assurance_id", referencedColumnName="id")
     * })
     */
    private $assurance;


}
