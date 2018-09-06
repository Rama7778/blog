<?php
namespace App\DataFixtures\ORM;

use App\Entity\Post;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class PostFixures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $post1 = new Post();
        $post1->setTitle('A day with Symfony3');
        $post1->setText('Lorem ipsum dolor sit amet, consectetur adipiscing eletra electrify denim vel ports.\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi ut velocity magna. Etiam vehicula nunc non leo hendrerit commodo. Vestibulum vulputate mauris eget erat congue dapibus imperdiet justo scelerisque. Nulla consectetur tempus nisl vitae viverra. Cras el mauris eget erat congue dapibus imperdiet justo scelerisque. Nulla consectetur tempus nisl vitae viverra. Cras elementum molestie vestibulum. Morbi id quam nisl. Praesent hendrerit, orci sed elementum lobortis, justo mauris lacinia libero, non facilisis purus ipsum non mi. Aliquam sollicitudin, augue id vestibulum iaculis, sem lectus convallis nunc, vel scelerisque lorem tortor ac nunc. Donec pharetra eleifend enim vel porta.');
        $post1->setImage('beach.jpg');
        $post1->setAuthor('dsyph3r');
        $post1->setTags('symfony3, php, paradise, symblog');
        $post1->setCreated(new \DateTime());
        $post1->setUpdated($post1->getCreated());
        $manager->persist($post1);

        $post2 = new Post();
        $post2->setTitle('The pool on the roof must have a leak');
        $post2->setText('Vestibulum vulputate mauris eget erat congue dapibus imperdiet justo scelerisque. Na. Cras elementum molestie vestibulum. Morbi id quam nisl. Praesent hendrerit, orci sed elementum lobortis.');
        $post2->setImage('pool_leak.jpg');
        $post2->setAuthor('Zero Cool');
        $post2->setTags('pool, leaky, hacked, movie, hacking, symblog');
        $post2->setCreated(new \DateTime());
        $post2->setUpdated($post2->getCreated());
        $manager->persist($post2);

        $post3 = new Post();
        $post3->setTitle('Misdirection. What the eyes see and the ears hear, the mind believes');
        $post3->setText('Lorem ipsumvehicula nunc non leo hendrerit commodo. Vestibulum vulputate mauris eget erat congue dapibus imperdiet justo scelerisque.');
        $post3->setImage('misdirection.jpg');
        $post3->setAuthor('Gabriel');
        $post3->setTags('misdirection, magic, movie, hacking, symblog');
        $post3->setCreated(new \DateTime());
        $post3->setUpdated($post3->getCreated());
        $manager->persist($post3);

        $post4 = new Post();
        $post4->setTitle('The grid - A digital frontier');
        $post4->setText('Lorem commodo. Vestibulum vulputate mauris eget erat congue dapibus imperdiet justo scelerisque. Nulla consectetur tempus nisl vitae viverra.');
        $post4->setImage('the_grid.jpg');
        $post4->setAuthor('Kevin Flynn');
        $post4->setTags('grid, daftpunk, movie, symblog');
        $post4->setCreated(new \DateTime());
        $post4->setUpdated($post4->getCreated());
        $manager->persist($post4);

        $post5 = new Post();
        $post5->setTitle('You\'re either a one or a zero. Alive or dead');
        $post5->setText('Lorem ipsum dolor sit amet, consectetur adipiscing elittibulum vulputate mauris eget erat congue dapibus imperdiet justo scelerisque.');
        $post5->setImage('one_or_zero.jpg');
        $post5->setAuthor('Gary Winston');
        $post5->setTags('binary, one, zero, alive, dead, !trusting, movie, symblog');
        $post5->setCreated(new \DateTime());
        $post5->setUpdated($post5->getCreated());
        $manager->persist($post5);

        $manager->flush();

        $this->addReference('post-1', $post1);
        $this->addReference('post-2', $post2);
        $this->addReference('post-3', $post3);
        $this->addReference('post-4', $post4);
        $this->addReference('post-5', $post5);
    }
}