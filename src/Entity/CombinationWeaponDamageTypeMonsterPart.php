<?php

namespace App\Entity;

use App\Repository\CombinationWeaponDamageTypeMonsterPartRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CombinationWeaponDamageTypeMonsterPartRepository::class)]
class CombinationWeaponDamageTypeMonsterPart
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?bool $sensitivity_combination_weapon_damage_type_monster_part = null;

    #[ORM\OneToMany(mappedBy: 'slash_monster_fk', targetEntity: Monster::class)]
    private Collection $slash_monsters_fk;

    #[ORM\OneToMany(mappedBy: 'blunt_monster_fk', targetEntity: Monster::class)]
    private Collection $blunt_monsters_fk;

    #[ORM\OneToMany(mappedBy: 'pierce_monster_fk', targetEntity: Monster::class)]
    private Collection $pierce_monsters_fk;

    #[ORM\ManyToOne(inversedBy: 'combination_weapon_damage_type_monster_parts_fk')]
    #[ORM\JoinColumn(nullable: false)]
    private ?MonsterPart $part_combination_weapon_damage_type_monster_part_fk = null;

    #[ORM\ManyToOne(inversedBy: 'combination_weapon_damage_type_monster_parts_fk')]
    #[ORM\JoinColumn(nullable: false)]
    private ?WeaponDamageType $damage_type_combination_weapon_damage_type_monster_part_fk = null;

    public function __construct()
    {
        $this->slash_monsters_fk = new ArrayCollection();
        $this->blunt_monsters_fk = new ArrayCollection();
        $this->pierce_monsters_fk = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function isSensitivityCombinationWeaponDamageTypeMonsterPart(): ?bool
    {
        return $this->sensitivity_combination_weapon_damage_type_monster_part;
    }

    public function setSensitivityCombinationWeaponDamageTypeMonsterPart(bool $sensitivity_combination_weapon_damage_type_monster_part): self
    {
        $this->sensitivity_combination_weapon_damage_type_monster_part = $sensitivity_combination_weapon_damage_type_monster_part;

        return $this;
    }

    /**
     * @return Collection<int, Monster>
     */
    public function getSlashMonstersFk(): Collection
    {
        return $this->slash_monsters_fk;
    }

    public function addSlashMonstersFk(Monster $slashMonstersFk): self
    {
        if (!$this->slash_monsters_fk->contains($slashMonstersFk)) {
            $this->slash_monsters_fk->add($slashMonstersFk);
            $slashMonstersFk->setSlashMonsterFk($this);
        }

        return $this;
    }

    public function removeSlashMonstersFk(Monster $slashMonstersFk): self
    {
        if ($this->slash_monsters_fk->removeElement($slashMonstersFk)) {
            // set the owning side to null (unless already changed)
            if ($slashMonstersFk->getSlashMonsterFk() === $this) {
                $slashMonstersFk->setSlashMonsterFk(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Monster>
     */
    public function getBluntMonstersFk(): Collection
    {
        return $this->blunt_monsters_fk;
    }

    public function addBluntMonstersFk(Monster $bluntMonstersFk): self
    {
        if (!$this->blunt_monsters_fk->contains($bluntMonstersFk)) {
            $this->blunt_monsters_fk->add($bluntMonstersFk);
            $bluntMonstersFk->setBluntMonsterFk($this);
        }

        return $this;
    }

    public function removeBluntMonstersFk(Monster $bluntMonstersFk): self
    {
        if ($this->blunt_monsters_fk->removeElement($bluntMonstersFk)) {
            // set the owning side to null (unless already changed)
            if ($bluntMonstersFk->getBluntMonsterFk() === $this) {
                $bluntMonstersFk->setBluntMonsterFk(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Monster>
     */
    public function getPierceMonstersFk(): Collection
    {
        return $this->pierce_monsters_fk;
    }

    public function addPierceMonstersFk(Monster $pierceMonstersFk): self
    {
        if (!$this->pierce_monsters_fk->contains($pierceMonstersFk)) {
            $this->pierce_monsters_fk->add($pierceMonstersFk);
            $pierceMonstersFk->setPierceMonsterFk($this);
        }

        return $this;
    }

    public function removePierceMonstersFk(Monster $pierceMonstersFk): self
    {
        if ($this->pierce_monsters_fk->removeElement($pierceMonstersFk)) {
            // set the owning side to null (unless already changed)
            if ($pierceMonstersFk->getPierceMonsterFk() === $this) {
                $pierceMonstersFk->setPierceMonsterFk(null);
            }
        }

        return $this;
    }

    public function getPartCombinationWeaponDamageTypeMonsterPartFk(): ?MonsterPart
    {
        return $this->part_combination_weapon_damage_type_monster_part_fk;
    }

    public function setPartCombinationWeaponDamageTypeMonsterPartFk(?MonsterPart $part_combination_weapon_damage_type_monster_part_fk): self
    {
        $this->part_combination_weapon_damage_type_monster_part_fk = $part_combination_weapon_damage_type_monster_part_fk;

        return $this;
    }

    public function getDamageTypeCombinationWeaponDamageTypeMonsterPartFk(): ?WeaponDamageType
    {
        return $this->damage_type_combination_weapon_damage_type_monster_part_fk;
    }

    public function setDamageTypeCombinationWeaponDamageTypeMonsterPartFk(?WeaponDamageType $damage_type_combination_weapon_damage_type_monster_part_fk): self
    {
        $this->damage_type_combination_weapon_damage_type_monster_part_fk = $damage_type_combination_weapon_damage_type_monster_part_fk;

        return $this;
    }
}
