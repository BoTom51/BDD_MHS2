<?php

namespace App\Entity;

use App\Repository\RidingActionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RidingActionRepository::class)]
class RidingAction
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 20)]
    private ?string $name_riding_action = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description_riding_action = null;

    #[ORM\OneToMany(mappedBy: 'riding_action_1_combination_monster_riding_action_fk', targetEntity: CombinationMonsterRidingAction::class)]
    private Collection $combination_monster_riding_actions_1_fk;

    #[ORM\OneToMany(mappedBy: 'riding_action_2_combination_monster_riding_action_fk', targetEntity: CombinationMonsterRidingAction::class)]
    private Collection $combination_monster_riding_actions_2_fk;

    public function __construct()
    {
        $this->combination_monster_riding_actions_1_fk = new ArrayCollection();
        $this->combination_monster_riding_actions_2_fk = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNameRidingAction(): ?string
    {
        return $this->name_riding_action;
    }

    public function setNameRidingAction(string $name_riding_action): self
    {
        $this->name_riding_action = $name_riding_action;

        return $this;
    }

    public function getDescriptionRidingAction(): ?string
    {
        return $this->description_riding_action;
    }

    public function setDescriptionRidingAction(string $description_riding_action): self
    {
        $this->description_riding_action = $description_riding_action;

        return $this;
    }

    /**
     * @return Collection<int, CombinationMonsterRidingAction>
     */
    public function getCombinationMonsterRidingActions1Fk(): Collection
    {
        return $this->combination_monster_riding_actions_1_fk;
    }

    public function addCombinationMonsterRidingActions1Fk(CombinationMonsterRidingAction $combinationMonsterRidingActions1Fk): self
    {
        if (!$this->combination_monster_riding_actions_1_fk->contains($combinationMonsterRidingActions1Fk)) {
            $this->combination_monster_riding_actions_1_fk->add($combinationMonsterRidingActions1Fk);
            $combinationMonsterRidingActions1Fk->setRidingAction1CombinationMonsterRidingActionFk($this);
        }

        return $this;
    }

    public function removeCombinationMonsterRidingActions1Fk(CombinationMonsterRidingAction $combinationMonsterRidingActions1Fk): self
    {
        if ($this->combination_monster_riding_actions_1_fk->removeElement($combinationMonsterRidingActions1Fk)) {
            // set the owning side to null (unless already changed)
            if ($combinationMonsterRidingActions1Fk->getRidingAction1CombinationMonsterRidingActionFk() === $this) {
                $combinationMonsterRidingActions1Fk->setRidingAction1CombinationMonsterRidingActionFk(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, CombinationMonsterRidingAction>
     */
    public function getCombinationMonsterRidingActions2Fk(): Collection
    {
        return $this->combination_monster_riding_actions_2_fk;
    }

    public function addCombinationMonsterRidingActions2Fk(CombinationMonsterRidingAction $combinationMonsterRidingActions2Fk): self
    {
        if (!$this->combination_monster_riding_actions_2_fk->contains($combinationMonsterRidingActions2Fk)) {
            $this->combination_monster_riding_actions_2_fk->add($combinationMonsterRidingActions2Fk);
            $combinationMonsterRidingActions2Fk->setRidingAction2CombinationMonsterRidingActionFk($this);
        }

        return $this;
    }

    public function removeCombinationMonsterRidingActions2Fk(CombinationMonsterRidingAction $combinationMonsterRidingActions2Fk): self
    {
        if ($this->combination_monster_riding_actions_2_fk->removeElement($combinationMonsterRidingActions2Fk)) {
            // set the owning side to null (unless already changed)
            if ($combinationMonsterRidingActions2Fk->getRidingAction2CombinationMonsterRidingActionFk() === $this) {
                $combinationMonsterRidingActions2Fk->setRidingAction2CombinationMonsterRidingActionFk(null);
            }
        }

        return $this;
    }
}
