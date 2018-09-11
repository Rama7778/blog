<?php

namespace App\DataFixtures\ORM;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoder;
use Symfony\Component\DependencyInjection\ContainerInterface;

class UserFixtures extends Fixture
{
    private $container;

    public function __construct( ContainerInterface $container)
    {
        $this->container = $container;
    }
    public function load(ObjectManager $manager)
    {

        $encoder = $this->container->get('security.password_encoder');
        $user = new User();
        $user->setUsername('123456');
        $password = $encoder->encodePassword($user, '123456');
        $user->setPassword($password);
        $user->setEmail('info@utilvideo.com');
        $user->setIsactive(1);
        $manager->persist($user);
        $manager->flush();
    }
}