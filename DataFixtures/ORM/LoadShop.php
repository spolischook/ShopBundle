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
    $Shop->setLastvisit(new \DateTime('tomorrow noon'));
    $manager->persist($Shop);

    $Shop = new Shop();
    $Shop->setName('Свиточ');
    $Shop->setLocation('Байды Вишнивецкого 41');
    $Shop->setCity('Черкассы');
    $Shop->setLastvisit(new \DateTime('tomorrow noon'));
    $manager->persist($Shop);

    $Shop = new Shop();
    $Shop->setName('Казкова Майстерня');
    $Shop->setLocation('ТЦ Метроград');
    $Shop->setCity('Киев');
    $Shop->setLastvisit(new \DateTime('tomorrow noon'));
    $manager->persist($Shop);

    $Shop = new Shop();
    $Shop->setName('Буквица');
    $Shop->setLocation('Хрещатик 217');
    $Shop->setCity('Черкассы');
    $Shop->setLastvisit(new \DateTime('tomorrow noon'));
    $manager->persist($Shop);

    $Shop = new Shop();
    $Shop->setName('Кактус');
    $Shop->setLocation('Шевченко 272');
    $Shop->setCity('Черкассы');
    $Shop->setLastvisit(new \DateTime('tomorrow noon'));
    $manager->persist($Shop);

    $manager->flush();
}
}