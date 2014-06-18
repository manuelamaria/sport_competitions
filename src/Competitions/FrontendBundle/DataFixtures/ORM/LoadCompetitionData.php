<?php

namespace Competitions\FrontendBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Competitions\AdminBundle\Entity\Competition;
use Competitions\AdminBundle\Entity\Category;
use Doctrine\Common\Persistence\ObjectManager;

/**
 * Class LoadCompetitionData
 *
 */
class LoadCompetitionData implements FixtureInterface {

    public function load(ObjectManager $manager) {
        $competition = new Competition();
        $competition->setName('Ski Competition 1');
        $competition->setDescription('Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.');
        $competition->setStartDate(new \DateTime('2015-01-01'));
        $competition->setLocation('Bucegi');
        $competition->setWebsite('www.test.com');

        $category = $manager->getRepository('CompetitionsAdminBundle:Category')->findOneByName('Ski');
        $competition->addCategorie($category);

        $manager->persist($competition);

        $competition = new Competition();
        $competition->setName('Climb Competition 1');
        $competition->setDescription('Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.');
        $competition->setStartDate(new \DateTime('2015-02-01'));
        $competition->setLocation('Rimetea');
        $competition->setWebsite('www.test.com');

        $category = $manager->getRepository('CompetitionsAdminBundle:Category')->findOneByName('Climb');
        $competition->addCategorie($category);

        $manager->persist($competition);

        $competition = new Competition();
        $competition->setName('Swim Competition 1');
        $competition->setDescription('Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.');
        $competition->setStartDate(new \DateTime('2015-03-01'));
        $competition->setLocation('Tarnita');
        $competition->setWebsite('www.test.com');

        $category = $manager->getRepository('CompetitionsAdminBundle:Category')->findOneByName('Swim');
        $competition->addCategorie($category);

        $manager->persist($competition);

        $competition = new Competition();
        $competition->setName('Bike Competition 1');
        $competition->setDescription('Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.');
        $competition->setStartDate(new \DateTime('2015-03-01'));
        $competition->setLocation('Bucuresti');
        $competition->setWebsite('www.test.com');

        $category = $manager->getRepository('CompetitionsAdminBundle:Category')->findOneByName('Bike');
        $competition->addCategorie($category);

        $manager->persist($competition);


        $competition = new Competition();
        $competition->setName('Run Competition 1');
        $competition->setDescription('Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.');
        $competition->setStartDate(new \DateTime('2015-03-12'));
        $competition->setLocation('Cluj');
        $competition->setWebsite('www.test.com');

        $category = $manager->getRepository('CompetitionsAdminBundle:Category')->findOneByName('Run');
        $competition->addCategorie($category);

        $manager->persist($competition);

        $competition = new Competition();
        $competition->setName('Run & Bike Competition 1');
        $competition->setDescription('Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.');
        $competition->setStartDate(new \DateTime('2015-04-22'));
        $competition->setLocation('Faget');
        $competition->setWebsite('www.test.com');

        $category = $manager->getRepository('CompetitionsAdminBundle:Category')->findOneByName('Run');
        $competition->addCategorie($category);

        $category = $manager->getRepository('CompetitionsAdminBundle:Category')->findOneByName('Bike');
        $competition->addCategorie($category);

        $manager->persist($competition);


        $manager->flush();
    }

}
