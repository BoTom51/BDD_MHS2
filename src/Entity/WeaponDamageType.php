<?php

namespace App\Entity;

use App\Repository\WeaponDamageTypeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: WeaponDamageTypeRepository::class)]
class WeaponDamageType
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 20)]
    private ?string $name_weapon_damage_type = null;

    #[ORM\OneToMany(mappedBy: 'damage_type_sensitivity_weapon_damage_type_monster_part_fk', targetEntity: SensitivityWeaponDamageTypeMonsterPart::class)]
    private Collection $sensitivity_weapon_damage_type_monster_parts_fk;

    public function __construct()
    {
        $this->sensitivity_weapon_damage_type_monster_parts_fk = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNameWeaponDamageType(): ?string
    {
        return $this->name_weapon_damage_type;
    }

    public function setNameWeaponDamageType(string $name_weapon_damage_type): self
    {
        $this->name_weapon_damage_type = $name_weapon_damage_type;

        return $this;
    }

    /**
     * @return Collection<int, SensitivityWeaponDamageTypeMonsterPart>
     */
    public function getSensitivityWeaponDamageTypeMonsterPartsFk(): Collection
    {
        return $this->sensitivity_weapon_damage_type_monster_parts_fk;
    }

    public function addSensitivityWeaponDamageTypeMonsterPartsFk(SensitivityWeaponDamageTypeMonsterPart $sensitivityWeaponDamageTypeMonsterPartsFk): self
    {
        if (!$this->sensitivity_weapon_damage_type_monster_parts_fk->contains($sensitivityWeaponDamageTypeMonsterPartsFk)) {
            $this->sensitivity_weapon_damage_type_monster_parts_fk->add($sensitivityWeaponDamageTypeMonsterPartsFk);
            $sensitivityWeaponDamageTypeMonsterPartsFk->setDamageTypeSensitivityWeaponDamageTypeMonsterPartFk($this);
        }

        return $this;
    }

    public function removeSensitivityWeaponDamageTypeMonsterPartsFk(SensitivityWeaponDamageTypeMonsterPart $sensitivityWeaponDamageTypeMonsterPartsFk): self
    {
        if ($this->sensitivity_weapon_damage_type_monster_parts_fk->removeElement($sensitivityWeaponDamageTypeMonsterPartsFk)) {
            // set the owning side to null (unless already changed)
            if ($sensitivityWeaponDamageTypeMonsterPartsFk->getDamageTypeSensitivityWeaponDamageTypeMonsterPartFk() === $this) {
                $sensitivityWeaponDamageTypeMonsterPartsFk->setDamageTypeSensitivityWeaponDamageTypeMonsterPartFk(null);
            }
        }

        return $this;
    }
}
