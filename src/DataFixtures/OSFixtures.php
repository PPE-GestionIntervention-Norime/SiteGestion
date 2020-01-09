<?php

namespace App\DataFixtures;

use App\Entity\OS;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class OSFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $os = new OS();
        $os->setName('windows 10');
        $manager->persist($os);

        $os = new OS();
        $os->setName('linux');
        $manager->persist($os);
        
        $os = new OS();
        $os->setName('mac');
        $manager->persist($os);

        $manager->flush();
    }
}
