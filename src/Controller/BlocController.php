<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class BlocController extends AbstractController
{
    /**
     * @Route("/bloc", name="bloc")
     */
    public function index()
    {
        $orm=$this->getDoctrine()->getManager();
		$liste=$orm->getRepository(Bloc::class)->findAll();
		
        return $this->render('bloc/index.html.twig', [
            'controller_name' => 'BlocController',
        ]);
	}


}
