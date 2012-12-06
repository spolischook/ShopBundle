<?php

namespace Serge\ShopBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;

class ShopController extends Controller
{
    /**
     * @Route("/")
     */
    public function indexAction()
    {
        $response = $this->get('response');
        return new Response('Hello!');

    }
}