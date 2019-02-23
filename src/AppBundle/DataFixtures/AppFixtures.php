<?php

namespace AppBundle\DataFixtures;

use AppBundle\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // create 20 products! Bam!
        for ($i = 0; $i < 10; $i++) {
            $user = new User();
            $user->setEmail("zrt1992".$i."@yahoo.com");
            $user->setSalt('hi');
            $user->setPlainPassword("zrt1992");
            $manager->persist($user);
        }

        $manager->flush();
    }
}