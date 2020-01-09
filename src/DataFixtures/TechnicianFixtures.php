<?php

namespace App\DataFixtures;

use App\Entity\Technician;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class TechnicianFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $technician = new Technician();
        $technician->setName('Monsieur');
        $technician->setFirstname('Hommet');
        $technician->setNbIntervention(0);
        $manager->persist($technician);

        $manager->flush();
    }
}
