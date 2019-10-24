<?php


namespace App\Controller;




use App\Entity\Page;
use App\Form\App\Controller\createZoneType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class PageController extends AbstractController
{



    /**
     * @Route("/",name="page.home")
     */
    public function index(Request $request): Response {

        $orm=$this->getDoctrine()->getManager();

        $p=$orm->getRepository(Page::class)->find(5);




        return $this->render('page.html.twig',array("str"=>"hello world"));

    }



}
