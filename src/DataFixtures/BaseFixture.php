<?php
/**
 * Created by PhpStorm.
 * User: Max
 * Date: 04.02.2019
 * Time: 20:50
 */

namespace App\DataFixtures;


use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

abstract class BaseFixture extends Fixture
{
    /** @var ObjectManager */
    private $manager;

    public function load(ObjectManager $manager)
    {
        $this->manager = $manager;

        $this->loadData($manager);
    }

    abstract protected function loadData(ObjectManager $em);

    protected function createMany(string $className, int $count, callable $factory)
    {
        for ($i = 0; $i < $count; $i++) {
            $entity = new $className();
            $factory($entity, $i);

            $this->manager->persist($entity);
            // store for usage as App\Entity\ClassName_#COUNT
            $this->addReference($className . '_' . $i, $entity);
        }
    }
}