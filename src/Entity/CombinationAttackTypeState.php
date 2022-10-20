<?php

namespace App\Entity;

use App\Repository\CombinationAttackTypeStateRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CombinationAttackTypeStateRepository::class)]
class CombinationAttackTypeState
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\OneToMany(mappedBy: 'attack_type_1_monster_fk', targetEntity: Monster::class)]
    private Collection $attack_type_1_monsters_fk;

    #[ORM\OneToMany(mappedBy: 'attack_type_2_monster_fk', targetEntity: Monster::class)]
    private Collection $attack_type_2_monsters_fk;

    #[ORM\OneToMany(mappedBy: 'attack_type_3_monster_fk', targetEntity: Monster::class)]
    private Collection $attack_type_3_monsters_fk;

    #[ORM\ManyToOne(inversedBy: 'combination_attack_type_states_fk')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Type $type_combination_attack_type_state_fk = null;

    #[ORM\ManyToOne(inversedBy: 'combination_attack_types_states_1_fk')]
    #[ORM\JoinColumn(nullable: false)]
    private ?MonsterState $state_1_combination_attack_type_state_fk = null;

    #[ORM\ManyToOne(inversedBy: 'combination_attack_type_states_2_fk')]
    private ?MonsterState $state_2_combination_attack_type_state_fk = null;

    public function __construct()
    {
        $this->attack_type_1_monsters_fk = new ArrayCollection();
        $this->attack_type_2_monsters_fk = new ArrayCollection();
        $this->attack_type_3_monsters_fk = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection<int, Monster>
     */
    public function getAttackType1MonstersFk(): Collection
    {
        return $this->attack_type_1_monsters_fk;
    }

    public function addAttackType1MonstersFk(Monster $attackType1MonstersFk): self
    {
        if (!$this->attack_type_1_monsters_fk->contains($attackType1MonstersFk)) {
            $this->attack_type_1_monsters_fk->add($attackType1MonstersFk);
            $attackType1MonstersFk->setAttackType1MonsterFk($this);
        }

        return $this;
    }

    public function removeAttackType1MonstersFk(Monster $attackType1MonstersFk): self
    {
        if ($this->attack_type_1_monsters_fk->removeElement($attackType1MonstersFk)) {
            // set the owning side to null (unless already changed)
            if ($attackType1MonstersFk->getAttackType1MonsterFk() === $this) {
                $attackType1MonstersFk->setAttackType1MonsterFk(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Monster>
     */
    public function getAttackType2MonstersFk(): Collection
    {
        return $this->attack_type_2_monsters_fk;
    }

    public function addAttackType2MonstersFk(Monster $attackType2MonstersFk): self
    {
        if (!$this->attack_type_2_monsters_fk->contains($attackType2MonstersFk)) {
            $this->attack_type_2_monsters_fk->add($attackType2MonstersFk);
            $attackType2MonstersFk->setAttackType2MonsterFk($this);
        }

        return $this;
    }

    public function removeAttackType2MonstersFk(Monster $attackType2MonstersFk): self
    {
        if ($this->attack_type_2_monsters_fk->removeElement($attackType2MonstersFk)) {
            // set the owning side to null (unless already changed)
            if ($attackType2MonstersFk->getAttackType2MonsterFk() === $this) {
                $attackType2MonstersFk->setAttackType2MonsterFk(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Monster>
     */
    public function getAttackType3MonstersFk(): Collection
    {
        return $this->attack_type_3_monsters_fk;
    }

    public function addAttackType3MonstersFk(Monster $attackType3MonstersFk): self
    {
        if (!$this->attack_type_3_monsters_fk->contains($attackType3MonstersFk)) {
            $this->attack_type_3_monsters_fk->add($attackType3MonstersFk);
            $attackType3MonstersFk->setAttackType3MonsterFk($this);
        }

        return $this;
    }

    public function removeAttackType3MonstersFk(Monster $attackType3MonstersFk): self
    {
        if ($this->attack_type_3_monsters_fk->removeElement($attackType3MonstersFk)) {
            // set the owning side to null (unless already changed)
            if ($attackType3MonstersFk->getAttackType3MonsterFk() === $this) {
                $attackType3MonstersFk->setAttackType3MonsterFk(null);
            }
        }

        return $this;
    }

    public function getTypeCombinationAttackTypeStateFk(): ?Type
    {
        return $this->type_combination_attack_type_state_fk;
    }

    public function setTypeCombinationAttackTypeStateFk(?Type $type_combination_attack_type_state_fk): self
    {
        $this->type_combination_attack_type_state_fk = $type_combination_attack_type_state_fk;

        return $this;
    }

    public function getState1CombinationAttackTypeStateFk(): ?MonsterState
    {
        return $this->state_1_combination_attack_type_state_fk;
    }

    public function setState1CombinationAttackTypeStateFk(?MonsterState $state_1_combination_attack_type_state_fk): self
    {
        $this->state_1_combination_attack_type_state_fk = $state_1_combination_attack_type_state_fk;

        return $this;
    }

    public function getState2CombinationAttackTypeStateFk(): ?MonsterState
    {
        return $this->state_2_combination_attack_type_state_fk;
    }

    public function setState2CombinationAttackTypeStateFk(?MonsterState $state_2_combination_attack_type_state_fk): self
    {
        $this->state_2_combination_attack_type_state_fk = $state_2_combination_attack_type_state_fk;

        return $this;
    }
}
