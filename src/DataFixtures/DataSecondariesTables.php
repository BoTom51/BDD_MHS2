<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Element;
use App\Entity\Location;
use App\Entity\MonsterPart;
use App\Entity\MonsterState;
use App\Entity\RidingAction;
use App\Entity\Type;
use App\Entity\WeaponDamageType;

class DataSecondariesTables extends Fixture
{

    public function load(ObjectManager $manager): void
    {
        // ELEMENTS + TYPES + ETATS DES MONSTRES + PARTIES DES MONSTRES + HABITATS + ACTIONS EN SELLE
        for ($k = 1; $k < 7; $k++) {
            $element = new Element();
            $element->setNameElement("E n°$k")
                ->setImgElement("../Asset/egg ($k)");

            $this->addReference("elem_$k", $element);
            $manager->persist($element);

            $type = new Type();
            $type->setNameType("type n°$k")
                ->setImgType("../Asset/rand$k.png");

            $this->addReference("type_$k", $type);
            $manager->persist($type);

            $etat_monstre = new MonsterState();
            $etat_monstre->setNameMonsterState("Etat n°$k");

            $this->addReference("state_$k", $etat_monstre);
            $manager->persist($etat_monstre);

            $partie_monstre = new MonsterPart();
            $partie_monstre->setNameMonsterPart("Partie n°$k");

            $this->addReference("part_$k", $partie_monstre);
            $manager->persist($partie_monstre);

            $type_degat_arme = new WeaponDamageType();
            $type_degat_arme->setNameWeaponDamageType("Dégat d'arme n°$k");

            $this->addReference("weap_$k", $type_degat_arme);
            $manager->persist($type_degat_arme);

            $habitat = new Location();
            $habitat->setNameLocation("Région n°".$k."_Zone n°$k");

            $this->addReference("habit_$k", $habitat);
            $manager->persist($habitat);

            $action_en_selle = new RidingAction();
            $action_en_selle->setNameRidingAction("action n°$k")
                ->setDescriptionRidingAction("Le monstre fait le truc n°$k.");

            $this->addReference("selle_$k", $action_en_selle);
            $manager->persist($action_en_selle);
        }

        $manager->flush();
    }
}
