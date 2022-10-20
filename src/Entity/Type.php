<?php

namespace App\Entity;

use App\Repository\TypeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TypeRepository::class)]
class Type
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 10)]
    private ?string $name_type = null;

    #[ORM\Column(length: 255)]
    private ?string $img_type = null;

    #[ORM\OneToMany(mappedBy: 'egg_type_monster_fk', targetEntity: Monster::class)]
    private Collection $monsters_fk;

    #[ORM\OneToMany(mappedBy: 'type_combination_attack_type_state_fk', targetEntity: CombinationAttackTypeState::class)]
    private Collection $combination_attack_type_states_fk;

    public function __construct()
    {
        $this->monsters_fk = new ArrayCollection();
        $this->combination_attack_type_states_fk = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNameType(): ?string
    {
        return $this->name_type;
    }

    public function setNameType(string $name_type): self
    {
        $this->name_type = $name_type;

        return $this;
    }

    public function getImgType(): ?string
    {
        return $this->img_type;
    }

    public function setImgType(string $img_type): self
    {
        $this->img_type = $img_type;

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
            $monstersFk->setEggTypeMonsterFk($this);
        }

        return $this;
    }

    public function removeMonstersFk(Monster $monstersFk): self
    {
        if ($this->monsters_fk->removeElement($monstersFk)) {
            // set the owning side to null (unless already changed)
            if ($monstersFk->getEggTypeMonsterFk() === $this) {
                $monstersFk->setEggTypeMonsterFk(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, CombinationAttackTypeState>
     */
    public function getCombinationAttackTypeStatesFk(): Collection
    {
        return $this->combination_attack_type_states_fk;
    }

    public function addCombinationAttackTypeStatesFk(CombinationAttackTypeState $combinationAttackTypeStatesFk): self
    {
        if (!$this->combination_attack_type_states_fk->contains($combinationAttackTypeStatesFk)) {
            $this->combination_attack_type_states_fk->add($combinationAttackTypeStatesFk);
            $combinationAttackTypeStatesFk->setTypeCombinationAttackTypeStateFk($this);
        }

        return $this;
    }

    public function removeCombinationAttackTypeStatesFk(CombinationAttackTypeState $combinationAttackTypeStatesFk): self
    {
        if ($this->combination_attack_type_states_fk->removeElement($combinationAttackTypeStatesFk)) {
            // set the owning side to null (unless already changed)
            if ($combinationAttackTypeStatesFk->getTypeCombinationAttackTypeStateFk() === $this) {
                $combinationAttackTypeStatesFk->setTypeCombinationAttackTypeStateFk(null);
            }
        }

        return $this;
    }
}
