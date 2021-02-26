<?php

namespace App\Entity;

use App\Repository\CompeticionesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CompeticionesRepository::class)
 */
class Competiciones
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $place;

    /**
     * @ORM\Column(type="date")
     */
    private $date;

    /**
     * @ORM\OneToMany(targetEntity=Deportistas::class, mappedBy="deportista")
     */
    private $deportista_id;

    public function __construct()
    {
        $this->deportista_id = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPlace(): ?string
    {
        return $this->place;
    }

    public function setPlace(string $place): self
    {
        $this->place = $place;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    /**
     * @return Collection|Deportistas[]
     */
    public function getDeportistaId(): Collection
    {
        return $this->deportista_id;
    }

    public function addDeportistaId(Deportistas $deportistaId): self
    {
        if (!$this->deportista_id->contains($deportistaId)) {
            $this->deportista_id[] = $deportistaId;
            $deportistaId->setDeportista($this);
        }

        return $this;
    }

    public function removeDeportistaId(Deportistas $deportistaId): self
    {
        if ($this->deportista_id->removeElement($deportistaId)) {
            // set the owning side to null (unless already changed)
            if ($deportistaId->getDeportista() === $this) {
                $deportistaId->setDeportista(null);
            }
        }

        return $this;
    }
}
