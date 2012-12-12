<?php

namespace Serge\ShopBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\Form\Form;
use Serge\ShopBundle\Entity\Product;
use Serge\ShopBundle\Entity\Category;

class DefaultController extends Controller
{
    /**
     * @Route("/index", name="shop_default_index")
     * @Template()
     */
    public function indexAction()
    {
        $oProduct = new Product();
        $form = $this->createFormBuilder($oProduct)
            ->add('name', 'text')
            ->add('price', 'money')
            ->add('weight')
            ->add('category')
            ->getForm()
        ;
        return array('form' => $form->createView());

    }
}