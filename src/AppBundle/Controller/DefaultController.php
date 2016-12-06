<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\MyEntity;
use AppBundle\Form\Type\MyEntityType;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $myentity = new MyEntity();

        $form = $this->createForm(MyEntityType::class, $myentity);

        if ($form->handleRequest($request)->isValid()) {
            dump('valid');
        }

        return $this->render('default/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
