<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TypeInterventionRepository")
 * @ORM\Table(name="tbl_TypeIntervention")
 */
class TypeIntervention
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Intervention", inversedBy="typeInterventions")
     */
    private $intevention_typeIntervention;

    public function __construct()
    {
        $this->intevention_typeIntervention = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection|Intervention[]
     */
    public function getInteventionTypeIntervention(): Collection
    {
        return $this->intevention_typeIntervention;
    }

    public function addInteventionTypeIntervention(Intervention $inteventionTypeIntervention): self
    {
        if (!$this->intevention_typeIntervention->contains($inteventionTypeIntervention)) {
            $this->intevention_typeIntervention[] = $inteventionTypeIntervention;
        }

        return $this;
    }

    public function removeInteventionTypeIntervention(Intervention $inteventionTypeIntervention): self
    {
        if ($this->intevention_typeIntervention->contains($inteventionTypeIntervention)) {
            $this->intevention_typeIntervention->removeElement($inteventionTypeIntervention);
        }

        return $this;
    }
}
