<?php

namespace App\Entity;

use App\Repository\MonsterSpeciesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MonsterSpeciesRepository::class)]
class MonsterSpecies
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 30)]
    private ?string $name_monster_species = null;

    #[ORM\OneToMany(mappedBy: 'species_monster_fk', targetEntity: Monster::class)]
    private Collection $monsters_fk;

    public function __construct()
    {
        $this->monsters_fk = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNameMonsterSpecies(): ?string
    {
        return $this->name_monster_species;
    }

    public function setNameMonsterSpecies(string $name_monster_species): self
    {
        $this->name_monster_species = $name_monster_species;

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
            $monstersFk->setSpeciesMonsterFk($this);
        }

        return $this;
    }

    public function removeMonstersFk(Monster $monstersFk): self
    {
        if ($this->monsters_fk->removeElement($monstersFk)) {
            // set the owning side to null (unless already changed)
            if ($monstersFk->getSpeciesMonsterFk() === $this) {
                $monstersFk->setSpeciesMonsterFk(null);
            }
        }

        return $this;
    }
}
