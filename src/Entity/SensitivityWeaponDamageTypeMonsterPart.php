<?php

namespace App\Entity;

use App\Repository\SensitivityWeaponDamageTypeMonsterPartRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SensitivityWeaponDamageTypeMonsterPartRepository::class)]
class SensitivityWeaponDamageTypeMonsterPart
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?bool $sensitivity_sensitivity_weapon_damage_type_monster_part = null;

    #[ORM\ManyToOne(inversedBy: 'sensitivity_weapon_damage_type_monster_parts_fk')]
    #[ORM\JoinColumn(nullable: false)]
    private ?MonsterPart $part_sensitivity_weapon_damage_type_monster_part_fk = null;

    #[ORM\ManyToOne(inversedBy: 'sensitivity_weapon_damage_type_monster_parts_fk')]
    #[ORM\JoinColumn(nullable: false)]
    private ?WeaponDamageType $damage_type_sensitivity_weapon_damage_type_monster_part_fk = null;

    #[ORM\ManyToOne(inversedBy: 'sensitivity_weapon_damage_type_monster_parts_fk')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Monster $monster_combination_weapon_damage_type_monster_part_fk = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function isSensitivitySensitivityWeaponDamageTypeMonsterPart(): ?bool
    {
        return $this->sensitivity_sensitivity_weapon_damage_type_monster_part;
    }

    public function setSensitivitySensitivityWeaponDamageTypeMonsterPart(bool $sensitivity_sensitivity_weapon_damage_type_monster_part): self
    {
        $this->sensitivity_sensitivity_weapon_damage_type_monster_part = $sensitivity_sensitivity_weapon_damage_type_monster_part;

        return $this;
    }

    public function getPartSensitivityWeaponDamageTypeMonsterPartFk(): ?MonsterPart
    {
        return $this->part_sensitivity_weapon_damage_type_monster_part_fk;
    }

    public function setPartSensitivityWeaponDamageTypeMonsterPartFk(?MonsterPart $part_sensitivity_weapon_damage_type_monster_part_fk): self
    {
        $this->part_sensitivity_weapon_damage_type_monster_part_fk = $part_sensitivity_weapon_damage_type_monster_part_fk;

        return $this;
    }

    public function getDamageTypeSensitivityWeaponDamageTypeMonsterPartFk(): ?WeaponDamageType
    {
        return $this->damage_type_sensitivity_weapon_damage_type_monster_part_fk;
    }

    public function setDamageTypeSensitivityWeaponDamageTypeMonsterPartFk(?WeaponDamageType $damage_type_sensitivity_weapon_damage_type_monster_part_fk): self
    {
        $this->damage_type_sensitivity_weapon_damage_type_monster_part_fk = $damage_type_sensitivity_weapon_damage_type_monster_part_fk;

        return $this;
    }

    public function getMonsterCombinationWeaponDamageTypeMonsterPartFk(): ?Monster
    {
        return $this->monster_combination_weapon_damage_type_monster_part_fk;
    }

    public function setMonsterCombinationWeaponDamageTypeMonsterPartFk(?Monster $monster_combination_weapon_damage_type_monster_part_fk): self
    {
        $this->monster_combination_weapon_damage_type_monster_part_fk = $monster_combination_weapon_damage_type_monster_part_fk;

        return $this;
    }
}
