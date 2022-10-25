<?php

namespace App\Entity;

use App\Repository\MonsterPartRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MonsterPartRepository::class)]
class MonsterPart
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 25)]
    private ?string $name_monster_part = null;

    #[ORM\OneToMany(mappedBy: 'part_sensitivity_weapon_damage_type_monster_part_fk', targetEntity: SensitivityWeaponDamageTypeMonsterPart::class)]
    private Collection $sensitivity_weapon_damage_type_monster_parts_fk;

    public function __construct()
    {
        $this->sensitivity_weapon_damage_type_monster_parts_fk = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNameMonsterPart(): ?string
    {
        return $this->name_monster_part;
    }

    public function setNameMonsterPart(string $name_monster_part): self
    {
        $this->name_monster_part = $name_monster_part;

        return $this;
    }

    /**
     * @return Collection<int, SensitivityWeaponDamageTypeMonsterPart>
     */
    public function getSensitivityWeaponDamageTypeMonsterPartsFk(): Collection
    {
        return $this->sensitivity_weapon_damage_type_monster_parts_fk;
    }

    public function addSensitivityWeaponDamageTypeMonsterPartFk(SensitivityWeaponDamageTypeMonsterPart $sensitivityWeaponDamageTypeMonsterPart): self
    {
        if (!$this->sensitivity_weapon_damage_type_monster_parts_fk->contains($sensitivityWeaponDamageTypeMonsterPart)) {
            $this->sensitivity_weapon_damage_type_monster_parts_fk->add($sensitivityWeaponDamageTypeMonsterPart);
            $sensitivityWeaponDamageTypeMonsterPart->setPartSensitivityWeaponDamageTypeMonsterPartFk($this);
        }

        return $this;
    }

    public function removeSensitivityWeaponDamageTypeMonsterPartFk(SensitivityWeaponDamageTypeMonsterPart $sensitivityWeaponDamageTypeMonsterPart): self
    {
        if ($this->sensitivity_weapon_damage_type_monster_parts_fk->removeElement($sensitivityWeaponDamageTypeMonsterPart)) {
            // set the owning side to null (unless already changed)
            if ($sensitivityWeaponDamageTypeMonsterPart->getPartSensitivityWeaponDamageTypeMonsterPartFk() === $this) {
                $sensitivityWeaponDamageTypeMonsterPart->setPartSensitivityWeaponDamageTypeMonsterPartFk(null);
            }
        }

        return $this;
    }
}
