<?php

namespace App\Entity;

use App\Repository\CombinationMonsterRidingActionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CombinationMonsterRidingActionRepository::class)]
class CombinationMonsterRidingAction
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\OneToMany(mappedBy: 'riding_action_monster_fk', targetEntity: Monster::class)]
    private Collection $monsters_fk;

    #[ORM\ManyToOne(inversedBy: 'combination_monster_riding_actions_1_fk')]
    #[ORM\JoinColumn(nullable: false)]
    private ?RidingAction $riding_action_1_combination_monster_riding_action_fk = null;

    #[ORM\ManyToOne(inversedBy: 'combination_monster_riding_actions_2_fk')]
    private ?RidingAction $riding_action_2_combination_monster_riding_action_fk = null;

    public function __construct()
    {
        $this->monsters_fk = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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
            $monstersFk->setRidingActionMonsterFk($this);
        }

        return $this;
    }

    public function removeMonstersFk(Monster $monstersFk): self
    {
        if ($this->monsters_fk->removeElement($monstersFk)) {
            // set the owning side to null (unless already changed)
            if ($monstersFk->getRidingActionMonsterFk() === $this) {
                $monstersFk->setRidingActionMonsterFk(null);
            }
        }

        return $this;
    }

    public function getRidingAction1CombinationMonsterRidingActionFk(): ?RidingAction
    {
        return $this->riding_action_1_combination_monster_riding_action_fk;
    }

    public function setRidingAction1CombinationMonsterRidingActionFk(?RidingAction $riding_action_1_combination_monster_riding_action_fk): self
    {
        $this->riding_action_1_combination_monster_riding_action_fk = $riding_action_1_combination_monster_riding_action_fk;

        return $this;
    }

    public function getRidingAction2CombinationMonsterRidingActionFk(): ?RidingAction
    {
        return $this->riding_action_2_combination_monster_riding_action_fk;
    }

    public function setRidingAction2CombinationMonsterRidingActionFk(?RidingAction $riding_action_2_combination_monster_riding_action_fk): self
    {
        $this->riding_action_2_combination_monster_riding_action_fk = $riding_action_2_combination_monster_riding_action_fk;

        return $this;
    }
}
