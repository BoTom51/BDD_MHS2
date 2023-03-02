<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\MonsterSpecies;
use App\Entity\Monster;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;


class DataMonster extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {

        for ($i = 1, $count = 0; $i < 6; $i++) {
            // ESPESES
            $species = new MonsterSpecies();
            $species->setNameMonsterSpecies("Espèce n°$i");

            $manager->persist($species);

            for ($j = 1; $j < 4; $j++) {
                (mt_rand(0, 1) === 1) ? $hatching = TRUE : $hatching = FALSE;
                $r = mt_rand(1, 100);
                $m = mt_rand(1, 11);
                $e = mt_rand(1, 11);

                // MONSTRES
                $monster = new Monster();
                $count++;
                $monster->setNameMonster("Monstre n°$r")
                    ->setImgMonster("./Asset/mhs2_monster_icon ($m).png")
                    ->setHatchingMonster($hatching)
                    ->setRetreatMonster($hatching === TRUE ? "Technique de retraite n°$m" : NULL)
                    ->setEggImgMonster($hatching === TRUE ? "./Asset/egg ($e)" : NULL)
                    ->setMonstieStatAttackLvl75Monster($hatching === TRUE ? mt_rand(45, 168) : NULL)
                    ->setSpeciesMonsterFk($species)
                    ->setElemStrengthMonsterFk($this->getReference("elem_" . mt_rand(1, 6)))
                    ->setElemWeaknessMonsterFk($this->getReference("elem_" . mt_rand(1, 6)))
                    ->setAttackType1MonsterFk($this->getReference("combi_type_attaque_etat_" . mt_rand(1, 9)))
                    ->setAttackType2MonsterFk($this->getReference("combi_type_attaque_etat_" . mt_rand(1, 9)))
                    ->setAttackType3MonsterFk($this->getReference("combi_type_attaque_etat_" . mt_rand(1, 9)))
                    ->setLocationMonsterFk($this->getReference("habit_" . mt_rand(1, 6)))
                    ->setEggTypeMonsterFk($hatching === TRUE ? $this->getReference("type_" . mt_rand(1, 6)) : NULL)
                    ->setRidingActionMonsterFk($hatching === TRUE ? $this->getReference("combi_action_en_selle_" . mt_rand(1, 6)) : NULL);

                $this->addReference("monster_$count", $monster);
                $manager->persist($monster);
            }
        }

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            DataSecondariesTables::class,
            DataCombinationsTables::class,
        ];
    }
}
