<?php


namespace App\Controller;




use App\Entity\Page;
use App\Form\App\Controller\createZoneType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Cache;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

class PageController extends AbstractController
{

	/**
	 * @Route("/",name="home")
	 */
	public function index(): Response {
		return new Response("hello");
	}

    /**
	 * @Route("/page/{id}",name="page.view")
	 * @Cache(public=true, smaxage=86400, mustRevalidate=false, maxStale=86400)
     */
    public function page(Request $request,$id): Response {
 		/*$response = new Response();
	    $response->headers->set('Content-Encoding', 'chunked');
    	//$response->headers->set('Transfer-Encoding', 'chunked');
	   	$response->headers->set('Content-Type', 'text/html');
	   	$response->headers->set('Cache-control', 'public, max-age=3600');
		$response->headers->set('Connection', 'keep-alive');
		$response->headers->set("page_id",$id);
		$response->sendHeaders();
		flush();
		ob_flush();*/
		$orm=$this->getDoctrine()->getManager();
		$rep=$orm->getRepository(Page::class);
        $p=$rep->find($id);
	
		$blocs=[];
		foreach($p->getBlocs() as $bloc) {
				$blocs[$bloc->getName()]=$bloc->getData();
		}

		$page["blocs"]=$blocs;
		//$response->setContent($this->render('page.html.twig',array("page"=>$p)));
		//$response->send();

		//return new Response();
        return $this->render('page.html.twig',array("page"=>$p));

	}

	/**
	 * @Route("/page/load/{id}", name="page.load")
	 */
	public function load(Request $request, $id): Response {
 		$response = new Response();
	   	$response->headers->set('Content-Type', 'application/json');
		//$response->headers->set('Connection', 'keep-alive');
		$response->headers->set('x-cache', 'HIT');
//		$response->headers->set('date', date());
		$response->headers->set('Cache-Control', 'public, max-age=386400');
		$response->sendHeaders();
		flush();
		ob_flush();
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
	 * @Cache(public=true, smaxage=86400, mustRevalidate=false, maxStale=86400)
	 */
	public function css($id): Response {
 		$response = new Response();
	   	$response->headers->set('Content-Type', 'text/css');
		//$response->headers->set('Connection', 'keep-alive');
		$response->headers->set('x-cache', 'HIT');
//		$response->headers->set('date', date());
		$response->headers->set('Cache-Control', 'public, max-age=386400');
		$response->sendHeaders();
		flush();
		ob_flush();
		$orm=$this->getDoctrine()->getManager();
		$rep=$orm->getRepository(Page::class);
		$p=$rep->find($id);
		$classes=[];
		foreach($p->getClasses() as $classe) {
				$classes[$classe->getName()]=$classe->getStyle();
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
