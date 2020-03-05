<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\StatusRepository")
 * @ORM\Table(name="tbl_status")
 */
class Status
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
     * @ORM\OneToMany(targetEntity="App\Entity\Intervention", mappedBy="status")
     */
    private $status;

    public function __construct()
    {
        $this->status = new ArrayCollection();
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
    public function getStatus(): Collection
    {
        return $this->status;
    }

    public function addStatus(Intervention $status): self
    {
        if (!$this->status->contains($status)) {
            $this->status[] = $status;
            $status->setStatus($this);
        }

        return $this;
    }

    public function removeStatus(Intervention $status): self
    {
        if ($this->status->contains($status)) {
            $this->status->removeElement($status);
            // set the owning side to null (unless already changed)
            if ($status->getStatus() === $this) {
                $status->setStatus(null);
            }
        }

        return $this;
    }

   
}
