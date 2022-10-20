<?php

namespace App\Entity;

use App\Repository\MonsterStateRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MonsterStateRepository::class)]
class MonsterState
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 15)]
    private ?string $name_monster_state = null;

    #[ORM\OneToMany(mappedBy: 'state_1_combination_attack_type_state_fk', targetEntity: CombinationAttackTypeState::class)]
    private Collection $combination_attack_types_states_1_fk;

    #[ORM\OneToMany(mappedBy: 'state_2_combination_attack_type_state_fk', targetEntity: CombinationAttackTypeState::class)]
    private Collection $combination_attack_type_states_2_fk;

    public function __construct()
    {
        $this->combination_attack_types_states_1_fk = new ArrayCollection();
        $this->combination_attack_type_states_2_fk = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNameMonsterState(): ?string
    {
        return $this->name_monster_state;
    }

    public function setNameMonsterState(string $name_monster_state): self
    {
        $this->name_monster_state = $name_monster_state;

        return $this;
    }

    /**
     * @return Collection<int, CombinationAttackTypeState>
     */
    public function getCombinationAttackTypesStates1Fk(): Collection
    {
        return $this->combination_attack_types_states_1_fk;
    }

    public function addCombinationAttackTypesStates1Fk(CombinationAttackTypeState $combinationAttackTypesStatesFk): self
    {
        if (!$this->combination_attack_types_states_1_fk->contains($combinationAttackTypesStatesFk)) {
            $this->combination_attack_types_states_1_fk->add($combinationAttackTypesStatesFk);
            $combinationAttackTypesStatesFk->setState1CombinationAttackTypeStateFk($this);
        }

        return $this;
    }

    public function removeCombinationAttackTypesStates1Fk(CombinationAttackTypeState $combinationAttackTypesStatesFk): self
    {
        if ($this->combination_attack_types_states_1_fk->removeElement($combinationAttackTypesStatesFk)) {
            // set the owning side to null (unless already changed)
            if ($combinationAttackTypesStatesFk->getState1CombinationAttackTypeStateFk() === $this) {
                $combinationAttackTypesStatesFk->setState1CombinationAttackTypeStateFk(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, CombinationAttackTypeState>
     */
    public function getCombinationAttackTypeStates2Fk(): Collection
    {
        return $this->combination_attack_type_states_2_fk;
    }

    public function addCombinationAttackTypeStates2Fk(CombinationAttackTypeState $combinationAttackTypeStates2Fk): self
    {
        if (!$this->combination_attack_type_states_2_fk->contains($combinationAttackTypeStates2Fk)) {
            $this->combination_attack_type_states_2_fk->add($combinationAttackTypeStates2Fk);
            $combinationAttackTypeStates2Fk->setState2CombinationAttackTypeStateFk($this);
        }

        return $this;
    }

    public function removeCombinationAttackTypeStates2Fk(CombinationAttackTypeState $combinationAttackTypeStates2Fk): self
    {
        if ($this->combination_attack_type_states_2_fk->removeElement($combinationAttackTypeStates2Fk)) {
            // set the owning side to null (unless already changed)
            if ($combinationAttackTypeStates2Fk->getState2CombinationAttackTypeStateFk() === $this) {
                $combinationAttackTypeStates2Fk->setState2CombinationAttackTypeStateFk(null);
            }
        }

        return $this;
    }
}
