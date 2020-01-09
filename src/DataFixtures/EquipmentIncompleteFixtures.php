<?php

namespace App\DataFixtures;

use App\Entity\EquipmentIncomplete;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class EquipmentIncompleteFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $equipmentincomplete = new EquipmentIncomplete();
        $equipmentincomplete ->setName('Cable de chargement');
        $manager->persist($equipmentincomplete);

        $manager->flush();
    }
}
