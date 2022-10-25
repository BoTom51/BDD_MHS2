<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\CombinationAttackTypeState;
use App\Entity\CombinationMonsterRidingAction;
use App\Entity\SensitivityWeaponDamageTypeMonsterPart;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class DataCombinationsTables extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        // COMBINAISON DES TYPES D'ATTAQUES & DES ETATS
        // +COMBI DES ACTIONS EN SELLES
        for ($a = 1; $a < 10; $a++) {
            $combi_type_attaque_etat = new CombinationAttackTypeState();
            $combi_type_attaque_etat->setTypeCombinationAttackTypeStateFk($this->getReference("type_" . mt_rand(1, 6)))
                ->setState1CombinationAttackTypeStateFk($this->getReference("state_" . mt_rand(1, 6)));

            $this->addReference("combi_type_attaque_etat_$a", $combi_type_attaque_etat);
            $manager->persist($combi_type_attaque_etat);

            $combi_action_en_selle = new CombinationMonsterRidingAction();
            $combi_action_en_selle->setRidingAction1CombinationMonsterRidingActionFk($this->getReference("selle_" . mt_rand(1, 6)))
                ->setRidingAction2CombinationMonsterRidingActionFk($this->getReference("selle_" . mt_rand(1, 6)));

            $this->addReference("combi_action_en_selle_$a", $combi_action_en_selle);
            $manager->persist($combi_action_en_selle);
        }

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            DataSecondariesTables::class,
        ];
    }
}
