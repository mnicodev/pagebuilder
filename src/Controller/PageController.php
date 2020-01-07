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
		$rep=$orm->getRepository(Page::class);
        $p=$rep->find($id);
	
		$blocs=[];
		foreach($p->getBlocs() as $bloc) {
				$blocs[$bloc->getName()]=$bloc->getData();
		}

		$page["blocs"]=$blocs;


        return $this->render('page.html.twig',array("page"=>$p));

	}

	/**
	 * @Route("/page/load/{id}", name="page.load")
	 */
	public function load(Request $request, $id): Response {
		$orm=$this->getDoctrine()->getManager();
		$rep=$orm->getRepository(Page::class);
        $p=$rep->find($id);

		$blocs=[];
		foreach($p->getBlocs() as $bloc) {
				$blocs[$bloc->getName()]=$bloc->getData();
		}
		
		$page["blocs"]=$blocs;
		

		return new Response(json_encode($page));
	}

	/**
	 * @Route("/assets/styles{id}.css", name="assets.css")
	 */
	public function css($id): Response {
		$orm=$this->getDoctrine()->getManager();
		$rep=$orm->getRepository(Page::class);
		$p=$rep->find($id);
		$classes=[];
		foreach($p->getClasses() as $classe) {
				$classes[$classe->getName()]=$classe->getParam();
		}

		return $this->render("css/styles.css.twig",array("classes"=>$classes)); 



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
