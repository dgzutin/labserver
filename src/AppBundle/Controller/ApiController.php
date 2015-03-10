<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AppBundle\Entity\Product;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;


class ApiController extends Controller
{


    /**
     * @Route("/api", name="apiHome")
     */
    public function indexAction()
    {
        return new Response('Authenticated!');
    }

    /**

    /**
     * @Route("/api/create/{name}", name="create")
     * @Method("GET")
     */
    public function createAction($name)
    {
        $product = new Product();
        $product->setName($name);
        $product->setPrice('19.99');
        $product->setDescription('Lorem ipsum dolor');

        $em = $this->getDoctrine()->getManager();

        $em->persist($product);
        $em->flush();
        $request = Request::createFromGlobals();
        $param = $request->query->get('test');

        return new Response('Created product id '.$product->getId().' and test='.$param);
    }


}
