<?php

namespace Competitions\FrontendBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Competitions\AdminBundle\Entity\Category;
use Doctrine\Common\Persistence\ObjectManager;

/**
 * Class LoadCategoryData
 *
 */
class LoadCategoryData implements \Doctrine\Common\DataFixtures\FixtureInterface {

    public function load(ObjectManager $manager) {
        $category = new Category();
        $category->setId(1);
        $category->setName('Ski');
        $manager->persist($category);

        $category = new Category();
        $category->setId(2);
        $category->setName('Climb');
        $manager->persist($category);

        $category = new Category();
        $category->setId(3);
        $category->setName('Swim');
        $manager->persist($category);

        $category = new Category();
        $category->setId(4);
        $category->setName('Bike');
        $manager->persist($category);

        $category = new Category();
        $category->setId(5);
        $category->setName('Run');
        $manager->persist($category);
        
        $manager->flush();
    }

}
