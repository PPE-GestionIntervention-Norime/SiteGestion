<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\OSRepository")
 * @ORM\Table(name="tbl_os")
 */
class OS
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
     * @ORM\OneToMany(targetEntity="App\Entity\Intervention", mappedBy="OS", orphanRemoval=true)
     */
    private $Intervention;

    public function __construct()
    {
        $this->Intervention = new ArrayCollection();
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
    public function getIntervention(): Collection
    {
        return $this->Intervention;
    }

    public function addIntervention(Intervention $intervention): self
    {
        if (!$this->Intervention->contains($intervention)) {
            $this->Intervention[] = $intervention;
            $intervention->setOS($this);
        }

        return $this;
    }

    public function removeIntervention(Intervention $intervention): self
    {
        if ($this->Intervention->contains($intervention)) {
            $this->Intervention->removeElement($intervention);
            // set the owning side to null (unless already changed)
            if ($intervention->getOS() === $this) {
                $intervention->setOS(null);
            }
        }

        return $this;
    }
}
