<?php

namespace App\Entity;

use App\Repository\LocationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LocationRepository::class)]
class Location
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name_location = null;

    #[ORM\OneToMany(mappedBy: 'location_monster_fk', targetEntity: Monster::class)]
    private Collection $monsters_fk;

    public function __construct()
    {
        $this->monsters_fk = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNameLocation(): ?string
    {
        return $this->name_location;
    }

    public function setNameLocation(string $name_location): self
    {
        $this->name_location = $name_location;

        return $this;
    }

    /**
     * @return Collection<int, Monster>
     */
    public function getMonstersFk(): Collection
    {
        return $this->monsters_fk;
    }

    public function addMonstersFk(Monster $monstersFk): self
    {
        if (!$this->monsters_fk->contains($monstersFk)) {
            $this->monsters_fk->add($monstersFk);
            $monstersFk->setLocationMonsterFk($this);
        }

        return $this;
    }

    public function removeMonstersFk(Monster $monstersFk): self
    {
        if ($this->monsters_fk->removeElement($monstersFk)) {
            // set the owning side to null (unless already changed)
            if ($monstersFk->getLocationMonsterFk() === $this) {
                $monstersFk->setLocationMonsterFk(null);
            }
        }

        return $this;
    }
}
