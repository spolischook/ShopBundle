<?php

namespace Serge\GuestbookBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Serge\ShopBundle\Entity\Product;

class LoadProduct implements FixtureInterface
{
/**
* {@inheritDoc}
*/
public function load(ObjectManager $manager)
{
    $Product = new Product();
    $Product->setName('Календарь 2013');
    $Product->setIdCategory(1);
    $Product->setPrice(60);
    $Product->setWeight(0,8);
    $manager->persist($Product);

    $Product = new Product();
    $Product->setName('Вкусные груши');
    $Product->setIdCategory(1);
    $Product->setPrice(5000);
    $Product->setWeight(3);
    $manager->persist($Product);

    $Product = new Product();
    $Product->setName('Грани дозволеного');
    $Product->setIdCategory(1);
    $Product->setPrice(3000);
    $Product->setWeight(3);
    $manager->persist($Product);

    $Product = new Product();
    $Product->setName('Сказка нового рассвета золотого');
    $Product->setIdCategory(1);
    $Product->setPrice(10000);
    $Product->setWeight(3);
    $manager->persist($Product);

    $Product = new Product();
    $Product->setName('Тайна');
    $Product->setIdCategory(1);
    $Product->setPrice(2500);
    $Product->setWeight(3);
    $manager->persist($Product);

    $manager->flush();
}
}