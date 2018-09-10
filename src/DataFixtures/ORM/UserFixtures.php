<?php

namespace App\DataFixtures\ORM;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class UserFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $user = new User();
        $user->setUsername('123456');
        $user->setPassword('123456');
        $user->setEmail('info@utilvideo.com');
        $user->setIs_active('true');
        $manager->persist($user);
        $manager->flush();
    }
}