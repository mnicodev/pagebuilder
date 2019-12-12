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
     * @Route("/page/{id}",name="page.view")
     */
    public function index(Request $request,$id): Response {

        $orm=$this->getDoctrine()->getManager();

        $p=$orm->getRepository(Page::class)->find($id);




        return $this->render('page.html.twig',array("page"=>$p));

	}

	/**
 	 * @Route("/page/{id}, name="page.viewkk")
	 */
/*	public function page($id): Response {

        $entityManager=$this->getDoctrine()->getManager();
        $page=$orm->getRepository(Page::class)->find($id);

		return $this->render("page.html.twig", array("page"=>$page));

	
}
 */



}
