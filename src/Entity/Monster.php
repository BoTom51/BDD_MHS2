<?php

namespace App\Entity;

use App\Repository\MonsterRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MonsterRepository::class)]
class Monster
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 30)]
    private ?string $name_monster = null;

    #[ORM\Column(length: 255)]
    private ?string $img_monster = null;

    #[ORM\Column]
    private ?bool $hatching_monster = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $retreat_monster = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $egg_img_monster = null;

    #[ORM\Column(nullable: true)]
    private ?int $monstie_stat_attack_lvl75_monster = null;

    #[ORM\ManyToOne(inversedBy: 'monsters_fk')]
    #[ORM\JoinColumn(nullable: false)]
    private ?MonsterSpecies $species_monster_fk = null;

    #[ORM\ManyToOne(inversedBy: 'strong_monsters_fk')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Element $elem_strength_monster_fk = null;

    #[ORM\ManyToOne(inversedBy: 'weak_monsters_fk')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Element $elem_weakness_monster_fk = null;

    #[ORM\ManyToOne(inversedBy: 'attack_type_1_monsters_fk')]
    #[ORM\JoinColumn(nullable: false)]
    private ?CombinationAttackTypeState $attack_type_1_monster_fk = null;

    #[ORM\ManyToOne(inversedBy: 'attack_type_2_monsters_fk')]
    #[ORM\JoinColumn(nullable: false)]
    private ?CombinationAttackTypeState $attack_type_2_monster_fk = null;

    #[ORM\ManyToOne(inversedBy: 'attack_type_3_monsters_fk')]
    private ?CombinationAttackTypeState $attack_type_3_monster_fk = null;

    #[ORM\ManyToOne(inversedBy: 'slash_monsters_fk')]
    #[ORM\JoinColumn(nullable: false)]
    private ?CombinationWeaponDamageTypeMonsterPart $slash_monster_fk = null;

    #[ORM\ManyToOne(inversedBy: 'blunt_monsters_fk')]
    #[ORM\JoinColumn(nullable: false)]
    private ?CombinationWeaponDamageTypeMonsterPart $blunt_monster_fk = null;

    #[ORM\ManyToOne(inversedBy: 'pierce_monsters_fk')]
    #[ORM\JoinColumn(nullable: false)]
    private ?CombinationWeaponDamageTypeMonsterPart $pierce_monster_fk = null;

    #[ORM\ManyToOne(inversedBy: 'monsters_fk')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Location $location_monster_fk = null;

    #[ORM\ManyToOne(inversedBy: 'monsters_fk')]
    #[ORM\JoinColumn(nullable: true)]
    private ?Type $egg_type_monster_fk = null;

    #[ORM\ManyToOne(inversedBy: 'monsters_fk')]
    private ?CombinationMonsterRidingAction $riding_action_monster_fk = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNameMonster(): ?string
    {
        return $this->name_monster;
    }

    public function setNameMonster(string $name_monster): self
    {
        $this->name_monster = $name_monster;

        return $this;
    }

    public function getImgMonster(): ?string
    {
        return $this->img_monster;
    }

    public function setImgMonster(string $img_monster): self
    {
        $this->img_monster = $img_monster;

        return $this;
    }

    public function isHatchingMonster(): ?bool
    {
        return $this->hatching_monster;
    }

    public function setHatchingMonster(bool $hatching_monster): self
    {
        $this->hatching_monster = $hatching_monster;

        return $this;
    }

    public function getRetreatMonster(): ?string
    {
        return $this->retreat_monster;
    }

    public function setRetreatMonster(?string $retreat_monster): self
    {
        $this->retreat_monster = $retreat_monster;

        return $this;
    }

    public function getEggImgMonster(): ?string
    {
        return $this->egg_img_monster;
    }

    public function setEggImgMonster(?string $egg_img_monster): self
    {
        $this->egg_img_monster = $egg_img_monster;

        return $this;
    }

    public function getMonstieStatAttackLvl75Monster(): ?int
    {
        return $this->monstie_stat_attack_lvl75_monster;
    }

    public function setMonstieStatAttackLvl75Monster(?int $monstie_stat_attack_lvl75_monster): self
    {
        $this->monstie_stat_attack_lvl75_monster = $monstie_stat_attack_lvl75_monster;

        return $this;
    }

    public function getSpeciesMonsterFk(): ?MonsterSpecies
    {
        return $this->species_monster_fk;
    }

    public function setSpeciesMonsterFk(?MonsterSpecies $species_monster_fk): self
    {
        $this->species_monster_fk = $species_monster_fk;

        return $this;
    }

    public function getElemStrengthMonsterFk(): ?Element
    {
        return $this->elem_strength_monster_fk;
    }

    public function setElemStrengthMonsterFk(?Element $elem_strength_monster_fk): self
    {
        $this->elem_strength_monster_fk = $elem_strength_monster_fk;

        return $this;
    }

    public function getElemWeaknessMonsterFk(): ?Element
    {
        return $this->elem_weakness_monster_fk;
    }

    public function setElemWeaknessMonsterFk(?Element $elem_weakness_monster_fk): self
    {
        $this->elem_weakness_monster_fk = $elem_weakness_monster_fk;

        return $this;
    }

    public function getAttackType1MonsterFk(): ?CombinationAttackTypeState
    {
        return $this->attack_type_1_monster_fk;
    }

    public function setAttackType1MonsterFk(?CombinationAttackTypeState $attack_type_1_monster_fk): self
    {
        $this->attack_type_1_monster_fk = $attack_type_1_monster_fk;

        return $this;
    }

    public function getAttackType2MonsterFk(): ?CombinationAttackTypeState
    {
        return $this->attack_type_2_monster_fk;
    }

    public function setAttackType2MonsterFk(?CombinationAttackTypeState $attack_type_2_monster_fk): self
    {
        $this->attack_type_2_monster_fk = $attack_type_2_monster_fk;

        return $this;
    }

    public function getAttackType3MonsterFk(): ?CombinationAttackTypeState
    {
        return $this->attack_type_3_monster_fk;
    }

    public function setAttackType3MonsterFk(?CombinationAttackTypeState $attack_type_3_monster_fk): self
    {
        $this->attack_type_3_monster_fk = $attack_type_3_monster_fk;

        return $this;
    }

    public function getSlashMonsterFk(): ?CombinationWeaponDamageTypeMonsterPart
    {
        return $this->slash_monster_fk;
    }

    public function setSlashMonsterFk(?CombinationWeaponDamageTypeMonsterPart $slash_monster_fk): self
    {
        $this->slash_monster_fk = $slash_monster_fk;

        return $this;
    }

    public function getBluntMonsterFk(): ?CombinationWeaponDamageTypeMonsterPart
    {
        return $this->blunt_monster_fk;
    }

    public function setBluntMonsterFk(?CombinationWeaponDamageTypeMonsterPart $blunt_monster_fk): self
    {
        $this->blunt_monster_fk = $blunt_monster_fk;

        return $this;
    }

    public function getPierceMonsterFk(): ?CombinationWeaponDamageTypeMonsterPart
    {
        return $this->pierce_monster_fk;
    }

    public function setPierceMonsterFk(?CombinationWeaponDamageTypeMonsterPart $pierce_monster_fk): self
    {
        $this->pierce_monster_fk = $pierce_monster_fk;

        return $this;
    }

    public function getLocationMonsterFk(): ?Location
    {
        return $this->location_monster_fk;
    }

    public function setLocationMonsterFk(?Location $location_monster_fk): self
    {
        $this->location_monster_fk = $location_monster_fk;

        return $this;
    }

    public function getEggTypeMonsterFk(): ?Type
    {
        return $this->egg_type_monster_fk;
    }

    public function setEggTypeMonsterFk(?Type $egg_type_monster_fk): self
    {
        $this->egg_type_monster_fk = $egg_type_monster_fk;

        return $this;
    }

    public function getRidingActionMonsterFk(): ?CombinationMonsterRidingAction
    {
        return $this->riding_action_monster_fk;
    }

    public function setRidingActionMonsterFk(?CombinationMonsterRidingAction $riding_action_monster_fk): self
    {
        $this->riding_action_monster_fk = $riding_action_monster_fk;

        return $this;
    }
}
