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

    #[ORM\Column(length: 255)]
    private ?string $sensitive_img_weapon_damage_type = null;

    #[ORM\Column(length: 255)]
    private ?string $not_sensitive_img_weapon_damage_type = null;

    #[ORM\OneToMany(mappedBy: 'damage_type_combination_weapon_damage_type_monster_part_fk', targetEntity: CombinationWeaponDamageTypeMonsterPart::class)]
    private Collection $combination_weapon_damage_type_monster_parts_fk;

    public function __construct()
    {
        $this->combination_weapon_damage_type_monster_parts_fk = new ArrayCollection();
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

    public function getSensitiveImgWeaponDamageType(): ?string
    {
        return $this->sensitive_img_weapon_damage_type;
    }

    public function setSensitiveImgWeaponDamageType(string $sensitive_img_weapon_damage_type): self
    {
        $this->sensitive_img_weapon_damage_type = $sensitive_img_weapon_damage_type;

        return $this;
    }

    public function getNotSensitiveImgWeaponDamageType(): ?string
    {
        return $this->not_sensitive_img_weapon_damage_type;
    }

    public function setNotSensitiveImgWeaponDamageType(string $not_sensitive_img_weapon_damage_type): self
    {
        $this->not_sensitive_img_weapon_damage_type = $not_sensitive_img_weapon_damage_type;

        return $this;
    }

    /**
     * @return Collection<int, CombinationWeaponDamageTypeMonsterPart>
     */
    public function getCombinationWeaponDamageTypeMonsterPartsFk(): Collection
    {
        return $this->combination_weapon_damage_type_monster_parts_fk;
    }

    public function addCombinationWeaponDamageTypeMonsterPartsFk(CombinationWeaponDamageTypeMonsterPart $combinationWeaponDamageTypeMonsterPartsFk): self
    {
        if (!$this->combination_weapon_damage_type_monster_parts_fk->contains($combinationWeaponDamageTypeMonsterPartsFk)) {
            $this->combination_weapon_damage_type_monster_parts_fk->add($combinationWeaponDamageTypeMonsterPartsFk);
            $combinationWeaponDamageTypeMonsterPartsFk->setDamageTypeCombinationWeaponDamageTypeMonsterPartFk($this);
        }

        return $this;
    }

    public function removeCombinationWeaponDamageTypeMonsterPartsFk(CombinationWeaponDamageTypeMonsterPart $combinationWeaponDamageTypeMonsterPartsFk): self
    {
        if ($this->combination_weapon_damage_type_monster_parts_fk->removeElement($combinationWeaponDamageTypeMonsterPartsFk)) {
            // set the owning side to null (unless already changed)
            if ($combinationWeaponDamageTypeMonsterPartsFk->getDamageTypeCombinationWeaponDamageTypeMonsterPartFk() === $this) {
                $combinationWeaponDamageTypeMonsterPartsFk->setDamageTypeCombinationWeaponDamageTypeMonsterPartFk(null);
            }
        }

        return $this;
    }
}
