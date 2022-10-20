<?php

namespace App\Entity;

use App\Repository\ElementRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ElementRepository::class)]
class Element
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 10)]
    private ?string $name_element = null;

    #[ORM\Column(length: 255)]
    private ?string $img_element = null;

    #[ORM\OneToMany(mappedBy: 'elem_strength_monster_fk', targetEntity: Monster::class)]
    private Collection $strong_monsters_fk;

    #[ORM\OneToMany(mappedBy: 'elem_weakness_monster_fk', targetEntity: Monster::class)]
    private Collection $weak_monsters_fk;

    public function __construct()
    {
        $this->strong_monsters_fk = new ArrayCollection();
        $this->weak_monsters_fk = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNameElement(): ?string
    {
        return $this->name_element;
    }

    public function setNameElement(string $name_element): self
    {
        $this->name_element = $name_element;

        return $this;
    }

    public function getImgElement(): ?string
    {
        return $this->img_element;
    }

    public function setImgElement(string $img_element): self
    {
        $this->img_element = $img_element;

        return $this;
    }

    /**
     * @return Collection<int, Monster>
     */
    public function getStrongMonstersFk(): Collection
    {
        return $this->strong_monsters_fk;
    }

    public function addStrongMonstersFk(Monster $strongMonstersFk): self
    {
        if (!$this->strong_monsters_fk->contains($strongMonstersFk)) {
            $this->strong_monsters_fk->add($strongMonstersFk);
            $strongMonstersFk->setElemStrengthMonsterFk($this);
        }

        return $this;
    }

    public function removeMonstersFk(Monster $strongMonstersFk): self
    {
        if ($this->strong_monsters_fk->removeElement($strongMonstersFk)) {
            // set the owning side to null (unless already changed)
            if ($strongMonstersFk->getElemStrengthMonsterFk() === $this) {
                $strongMonstersFk->setElemStrengthMonsterFk(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Monster>
     */
    public function getWeakMonstersFk(): Collection
    {
        return $this->weak_monsters_fk;
    }

    public function addWeakMonstersFk(Monster $weakMonstersFk): self
    {
        if (!$this->weak_monsters_fk->contains($weakMonstersFk)) {
            $this->weak_monsters_fk->add($weakMonstersFk);
            $weakMonstersFk->setElemWeaknessMonsterFk($this);
        }

        return $this;
    }

    public function removeWeakMonstersFk(Monster $weakMonstersFk): self
    {
        if ($this->weak_monsters_fk->removeElement($weakMonstersFk)) {
            // set the owning side to null (unless already changed)
            if ($weakMonstersFk->getElemWeaknessMonsterFk() === $this) {
                $weakMonstersFk->setElemWeaknessMonsterFk(null);
            }
        }

        return $this;
    }
}
