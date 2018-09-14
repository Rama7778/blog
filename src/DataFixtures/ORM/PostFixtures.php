<?php
namespace App\DataFixtures\ORM;

use App\Entity\Post;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class PostFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $post1 = new Post();
        $post1->setTitle('The current shape of the North American continent');
        $post1->setText(' The current shape of the North American continent (the present-day territory of the United States of America and Canada) was formed 25,000 years ago. At that time the great northern icecap flowed over the North American continent. This ice flow determined the size and drainage of the Great Lakes. They changed the direction of the Missouri River and carved the channel of the Hudson River. They created the northern part of the Central Agricultural Basin, which is one of the richest farming areas in the world.');
        $post1->setImage('beach.jpg');
        $post1->setAuthor('dsyph3r');
        $post1->setTags('current, shape, American, continent');
        $post1->setCreated(new \DateTime());
        $post1->setUpdated($post1->getCreated());
        $manager->persist($post1);

        $post2 = new Post();
        $post2->setTitle('On the Atlantic shore of the United States');
        $post2->setText('On the Atlantic shore of the United States, much of the northern coast is rocky. But the middle and southern Atlantic coasts rise gently from the sea. The Appalachians, which run almost parallel to the east coast, are old mountains with many coal rich valleys between them To the west of the Appalachians, lie plateaus built up over the centuries from bits of stone that were washed down from the mountains and then cut into small hills by streams. Beyond is the great Central Lowland which resembles the plains of Eastern Europe. ');
        $post2->setImage('pool_leak.jpg');
        $post2->setAuthor('Zero Cool');
        $post2->setTags('Atlantic, shore, United, States');
        $post2->setCreated(new \DateTime());
        $post2->setUpdated($post2->getCreated());
        $manager->persist($post2);

        $post3 = new Post();
        $post3->setTitle('North of the Central Lowland, extending for almost 1,600 kilometers');
        $post3->setText('North of the Central Lowland, extending for almost 1,600 kilometers, are the five Great Lakes, which the United States shares with Canada. The lakes are considered to contain about half of the world’s fresh water. West of the Central Lowland are the Great Plains. They are stopped by the Rocky Mountains. The Rockies are young mountains. They are the same age as the Alps in Europe.');
        $post3->setImage('misdirection.jpg');
        $post3->setAuthor('Gabriel');
        $post3->setTags('Lowland, extending, kilometers');
        $post3->setCreated(new \DateTime());
        $post3->setUpdated($post3->getCreated());
        $manager->persist($post3);

        $post4 = new Post();
        $post4->setTitle('The land of the Rockies is made up of quite distinct');
        $post4->setText('The land of the Rockies is made up of quite distinct and separate regions that are shaped by different geological events. One region was formed of material, which was washed down from the Rockies and pressed into rock. This now encompasses the high Colorado Plateaus, where the Grand Canyon of the Colorado River is cut (1.6 km in depth). The Mississippi flows over 6,400 km from its northern sources in the Rocky Mountains to the Gulf Mexico. This makes it one of the world’s longest waterways. Another region, the high Columbia table land to the north was created by lava that poured from inside the earth and buried old mountains.');
        $post4->setImage('the_grid.jpg');
        $post4->setAuthor('Kevin Flynn');
        $post4->setTags('land, Rockies, made, distinct');
        $post4->setCreated(new \DateTime());
        $post4->setUpdated($post4->getCreated());
        $manager->persist($post4);

        $post5 = new Post();
        $post5->setTitle('Volcanoes built the Cascade Mountains');
        $post5->setText('Volcanoes built the Cascade Mountains. The Sierra Nevada range and the ridges of the Great Basin were formed by a strained portion of the earth’s crust. At the border of the Pacific Ocean lie the Coast Ranges. They are relatively low mountains, because they are in the region where occasional earthquakes from time to time build new mountains.');
        $post5->setImage('one_or_zero.jpg');
        $post5->setAuthor('Gary Winston');
        $post5->setTags('Volcanoes, Cascade, mountains');
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