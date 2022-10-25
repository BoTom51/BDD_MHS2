<?php

namespace App\DataFixtures;

use App\Entity\SensitivityWeaponDamageTypeMonsterPart;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class DataSensitivityTable extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        // COMBINAISONS DES PARTIES PARTIES DE MONSTRES & DES TYPES D'ARMES
        for ($a = 1; $a < 10; $a++) {
            $combi_partie_type_arme = new SensitivityWeaponDamageTypeMonsterPart();
            $combi_partie_type_arme->setPartSensitivityWeaponDamageTypeMonsterPartFk($this->getReference("part_" . mt_rand(1, 6)))
                ->setDamageTypeSensitivityWeaponDamageTypeMonsterPartFk($this->getReference("weap_" . mt_rand(1, 6)))
                ->setSensitivitySensitivityWeaponDamageTypeMonsterPart((mt_rand(0, 1) === 1) ? TRUE : FALSE)
                ->setMonsterCombinationWeaponDamageTypeMonsterPartFk($this->getReference("monster_" . mt_rand(1, 15)));

            $manager->persist($combi_partie_type_arme);
        }

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            DataSecondariesTables::class,
            DataCombinationsTables::class,
            DataMonster::class,
        ];
    }
}
