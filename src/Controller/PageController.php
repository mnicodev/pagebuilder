<?php


namespace App\Controller;



use App\Form\App\Controller\createZoneType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class PageController extends AbstractController
{



    /**
     * @Route("/",name="page.create")
     */
    public function index(Request $request): Response {
        return $this->render('page.html.twig',array("str"=>"hello world"));

    }



}
