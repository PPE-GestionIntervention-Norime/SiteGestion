<?php

namespace App\DataFixtures;

use App\Entity\Equipment;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class EquipmentFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $equipment = new Equipment();
        $equipment ->setName('Pc fixe');
        $manager->persist($equipment);

        $equipment = new Equipment();
        $equipment ->setName('Pc portable');
        $manager->persist($equipment);

        $manager->flush();
    }
}
