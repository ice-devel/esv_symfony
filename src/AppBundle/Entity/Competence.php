<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Competence
 *
 * @ORM\Table(name="competence")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CompetenceRepository")
 */
class Competence
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @ORM\ManyToMany(targetEntity="Stagiaire", mappedBy="competences")
     */
    private $stagiaires;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->stagiaires = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Competence
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Add stagiaire
     *
     * @param \AppBundle\Entity\Stagiaire $stagiaire
     *
     * @return Competence
     */
    public function addStagiaire(\AppBundle\Entity\Stagiaire $stagiaire)
    {
        $this->stagiaires[] = $stagiaire;

        return $this;
    }

    /**
     * Remove stagiaire
     *
     * @param \AppBundle\Entity\Stagiaire $stagiaire
     */
    public function removeStagiaire(\AppBundle\Entity\Stagiaire $stagiaire)
    {
        $this->stagiaires->removeElement($stagiaire);
    }

    /**
     * Get stagiaires
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getStagiaires()
    {
        return $this->stagiaires;
    }
}
