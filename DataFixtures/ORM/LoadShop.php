<?php

namespace Serge\GuestbookBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Serge\ShopBundle\Entity\Shop;

class LoadShop implements FixtureInterface
{
/**
* {@inheritDoc}
*/
public function load(ObjectManager $manager)
{
    $Shop = new Shop();
    $Shop->setName('Фрагранс');
    $Shop->setLocation('Ленина 1');
    $Shop->setCity('Черкассы');

    $manager->persist($Entry);

    $manager->flush();
}
}