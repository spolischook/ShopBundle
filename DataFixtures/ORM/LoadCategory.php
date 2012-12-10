<?php

namespace Serge\GuestbookBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Serge\ShopBundle\Entity\Category;

class LoadCategory implements FixtureInterface
{
/**
* {@inheritDoc}
*/
public function load(ObjectManager $manager)
{
    $Category = new Category();
    $Category->setName('Календари');
    $Category->setIdParent(0);
    $manager->persist($Category);

    $Category = new Category();
    $Category->setName('Картины');
    $Category->setIdParent(0);
    $manager->persist($Category);

    $Category = new Category();
    $Category->setName('Живопись');
    $Category->setIdParent(0);
    $manager->persist($Category);

    $Category = new Category();
    $Category->setName('Графика');
    $Category->setIdParent(0);
    $manager->persist($Category);

    $Category = new Category();
    $Category->setName('Пастель');
    $Category->setIdParent(0);
    $manager->persist($Category);

    $Category = new Category();
    $Category->setName('Hand-Made');
    $Category->setIdParent(0);
    $manager->persist($Category);

    $Category = new Category();
    $Category->setName('Открытки');
    $Category->setIdParent(0);
    $manager->persist($Category);

    $manager->flush();
}
}