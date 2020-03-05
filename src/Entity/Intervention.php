<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\InterventionRepository")
 * @ORM\Table(name="tbl_intervention")
 */
class Intervention
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date_depot;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date_restitution;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $session_user;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $password;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\OS", inversedBy="Intervention")
     * @ORM\JoinColumn(nullable=false)
     */
    private $OS;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Equipment", inversedBy="intervention")
     * @ORM\JoinColumn(nullable=false)
     */
    private $equipment;


    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\EquipmentIncomplete", mappedBy="intervention")
     */
    private $equipmentIncompletes;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Technician", mappedBy="intervention")
     */
    private $technicians;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Observation", mappedBy="intervention", cascade={"persist", "remove"})
     */
    /* private $observation;*/
    
    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Client", inversedBy="intervention")
     * @ORM\JoinColumn(nullable=false)
     */
    private $client;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\TypeIntervention", mappedBy="intevention_typeIntervention")
     */
    private $typeInterventions;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Observation;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Status", inversedBy="status")
     */
    private $status;




    public function __construct()
    {
        $this->equipmentIncompletes = new ArrayCollection();
        $this->technicians = new ArrayCollection();
        $this->typeInterventions = new ArrayCollection();
        $this->statuses = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateDepot(): ?\DateTimeInterface
    {
        return $this->date_depot;
    }

    public function setDateDepot(\DateTimeInterface $date_depot): self
    {
        $this->date_depot = $date_depot;

        return $this;
    }

    public function getDateRestitution(): ?\DateTimeInterface
    {
        return $this->date_restitution;
    }

    public function setDateRestitution(\DateTimeInterface $date_restitution): self
    {
        $this->date_restitution = $date_restitution;

        return $this;
    }

    public function getSessionUser(): ?string
    {
        return $this->session_user;
    }

    public function setSessionUser(?string $session_user): self
    {
        $this->session_user = $session_user;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(?string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getOS(): ?OS
    {
        return $this->OS;
    }

    public function setOS(?OS $OS): self
    {
        $this->OS = $OS;

        return $this;
    }

    public function getEquipment(): ?Equipment
    {
        return $this->equipment;
    }

    public function setEquipment(?Equipment $equipment): self
    {
        $this->equipment = $equipment;

        return $this;
    }


    /**
     * @return Collection|EquipmentIncomplete[]
     */
    public function getEquipmentIncompletes(): Collection
    {
        return $this->equipmentIncompletes;
    }

    public function addEquipmentIncomplete(EquipmentIncomplete $equipmentIncomplete): self
    {
        if (!$this->equipmentIncompletes->contains($equipmentIncomplete)) {
            $this->equipmentIncompletes[] = $equipmentIncomplete;
            $equipmentIncomplete->addIntervention($this);
        }

        return $this;
    }

    public function removeEquipmentIncomplete(EquipmentIncomplete $equipmentIncomplete): self
    {
        if ($this->equipmentIncompletes->contains($equipmentIncomplete)) {
            $this->equipmentIncompletes->removeElement($equipmentIncomplete);
            $equipmentIncomplete->removeIntervention($this);
        }

        return $this;
    }

    /**
     * @return Collection|Technician[]
     */
    public function getTechnicians(): Collection
    {
        return $this->technicians;
    }

    public function addTechnician(Technician $technician): self
    {
        if (!$this->technicians->contains($technician)) {
            $this->technicians[] = $technician;
            $technician->addIntervention($this);
        }

        return $this;
    }

    public function removeTechnician(Technician $technician): self
    {
        if ($this->technicians->contains($technician)) {
            $this->technicians->removeElement($technician);
            $technician->removeIntervention($this);
        }

        return $this;
    }

    /* public function getObservation(): ?Observation
    {
        return $this->observation;
    }

    public function setObservation(?Observation $observation): self
    {
        $this->observation = $observation;

        // set (or unset) the owning side of the relation if necessary
        $newIntervention = null === $observation ? null : $this;
        if ($observation->getIntervention() !== $newIntervention) {
            $observation->setIntervention($newIntervention);
        }

        return $this;
    }*/

    public function getClient(): ?Client
    {
        return $this->client;
    }

    public function setClient(?Client $client): self
    {
        $this->client = $client;

        return $this;
    }

    /**
     * @return Collection|TypeIntervention[]
     */
    public function getTypeInterventions(): Collection
    {
        return $this->typeInterventions;
    }

    public function addTypeIntervention(TypeIntervention $typeIntervention): self
    {
        if (!$this->typeInterventions->contains($typeIntervention)) {
            $this->typeInterventions[] = $typeIntervention;
            $typeIntervention->addInteventionTypeIntervention($this);
        }

        return $this;
    }

    public function removeTypeIntervention(TypeIntervention $typeIntervention): self
    {
        if ($this->typeInterventions->contains($typeIntervention)) {
            $this->typeInterventions->removeElement($typeIntervention);
            $typeIntervention->removeInteventionTypeIntervention($this);
        }

        return $this;
    }

    public function getObservation(): ?string
    {
        return $this->Observation;
    }

    public function setObservation(?string $Observation): self
    {
        $this->Observation = $Observation;

        return $this;
    }

    public function getStatus(): ?Status
    {
        return $this->status;
    }

    public function setStatus(?Status $status): self
    {
        $this->status = $status;

        return $this;
    }
    
}
