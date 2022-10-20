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

    #[ORM\Column(length: 255)]
    private ?string $img_monster_part = null;

    #[ORM\OneToMany(mappedBy: 'part_combination_weapon_damage_type_monster_part_fk', targetEntity: CombinationWeaponDamageTypeMonsterPart::class)]
    private Collection $combination_weapon_damage_type_monster_parts_fk;

    public function __construct()
    {
        $this->combination_weapon_damage_type_monster_parts_fk = new ArrayCollection();
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

    public function getImgMonsterPart(): ?string
    {
        return $this->img_monster_part;
    }

    public function setImgMonsterPart(string $img_monster_part): self
    {
        $this->img_monster_part = $img_monster_part;

        return $this;
    }

    /**
     * @return Collection<int, CombinationWeaponDamageTypeMonsterPart>
     */
    public function getCombinationWeaponDamageTypeMonsterPartsFk(): Collection
    {
        return $this->combination_weapon_damage_type_monster_parts_fk;
    }

    public function addCombinationWeaponDamageTypeMonsterPartFk(CombinationWeaponDamageTypeMonsterPart $combinationWeaponDamageTypeMonsterPart): self
    {
        if (!$this->combination_weapon_damage_type_monster_parts_fk->contains($combinationWeaponDamageTypeMonsterPart)) {
            $this->combination_weapon_damage_type_monster_parts_fk->add($combinationWeaponDamageTypeMonsterPart);
            $combinationWeaponDamageTypeMonsterPart->setPartCombinationWeaponDamageTypeMonsterPartFk($this);
        }

        return $this;
    }

    public function removeCombinationWeaponDamageTypeMonsterPartFk(CombinationWeaponDamageTypeMonsterPart $combinationWeaponDamageTypeMonsterPart): self
    {
        if ($this->combination_weapon_damage_type_monster_parts_fk->removeElement($combinationWeaponDamageTypeMonsterPart)) {
            // set the owning side to null (unless already changed)
            if ($combinationWeaponDamageTypeMonsterPart->getPartCombinationWeaponDamageTypeMonsterPartFk() === $this) {
                $combinationWeaponDamageTypeMonsterPart->setPartCombinationWeaponDamageTypeMonsterPartFk(null);
            }
        }

        return $this;
    }
}
