<?php


namespace App\Controller;




use App\Entity\Page;
use App\Form\CreateZoneType;
use phpDocumentor\Reflection\Types\Integer;
use Psr\Container\ContainerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class PageBuilderController extends AbstractController
{


    /**
     * @Route("/admin/page", name="admin.page")
     */
    public function index(Request $request): Response
    {
        $orm=$this->getDoctrine()->getManager();
        $liste=$orm->getRepository(Page::class)->findAll();


        return $this->render('admin/page.html.twig',array("liste"=>$liste));
    }


    /**
     * @Route("/admin/page/builder",name="admin.page.create")
     */
    public function builder(Request $request): Response {
        return $this->render('admin/builder.html.twig',array("id"=>0));

    }

    /**
     * @Route("/admin/page/builder/{slug}",name="admin.page.edit", requirements={"slug"="[0-9]*"})
     */
    public function edit(Request $request, $slug): Response {

        if($request->get("load")) {
            $orm=$this->getDoctrine()->getManager();
            $page=$orm->getRepository(Page::class)->find($slug);



            $pagebuilder=[
                "name" =>   $page->getName(),
                "description" => $page->getDescription(),
                "param" => unserialize($page->getParam()),
                "zones" => []
            ];

			//print_r(serialize(json_encode($pagebuilder)));
			$t=[$page->getName(),$page->getDescription(),$page->getContent()];
            //return new Response($page->getName()."|".$page->getContent());
            return new Response((json_encode($t)));

        }




        return $this->render('admin/builder.html.twig',array("id"=>$slug));

    }


    public function new(Request $request): Response {
        $this->getDoctrine()->getRepository(Page::class);
    }

    /**
     * @Route("/admin/page/save", name="admin.page.save")
     */
    public function save(Request $request): Response {
        $pagebuilder=json_decode($request->request->get("page"));
        $entityManager=$this->getDoctrine()->getManager();
		$id=0;
		if($id=$request->request->get("id")) {
            $page=$entityManager->getRepository(Page::class)->find($id);

        } else {
            $page=new Page();
        }


        $page->setName($pagebuilder->name)
			 ->setDescription($pagebuilder->description)
			->setContent($pagebuilder->content)
            ->setParam(serialize($pagebuilder->param))
            ->setType("page")
            ->setIdSite(1)
            ->setStatus(1);



        $entityManager->persist($page);

        $entityManager->flush();


        if($page->getId()) $output="<div class='alert-success alert'>La page numéro ".$page->getId()." a été sauvegardée</div>";
        else $output="<div class='alert-danger alert'>erreur</div>";
        return new Response($output);
    }


    /**
     * @return Response
     * @Route("/admin/page/create", name="admin.popup.page.create");
     */
    public function popupCreate(): Response {
        return $this->render("admin/popup_page_create.html.twig");
    }

    /**
     * @return Response
     * @Route("/admin/zone/add", name="admin.popup.zone.add");
     */
    public function popupZoneAdd(Request $request): Response {

        //print_r($zoneAddType);

        $form= $this->createForm(CreateZoneType::class);
        if($request->get("large")=="container-fluid") $large=1;
        else $large=0;


        return $this->render("admin/popup_add_zone.html.twig", ["form"=>$form->createView(),"large"=>$large]);
    }

    /**
     * @Route("/admin/zone/action", name="admin.popup.zone.action")
     */
    public function popupZoneAction(Request $request): Response {
        return $this->render("admin/popup_zone_action.html.twig", ["zone"=>$request->request->get("zone")]);
    }

    /**
     * @Route("/admin/bloc/action", name="admin.popup.bloc.action")
     */
    public function popupBlocAction(Request $request): Response {

        return $this->render("admin/popup_bloc_action.html.twig", ["bloc" => $request->request->get("bloc"), "zone"=>$request->request->get("zone")]);

    }

    /**
     * @Route("/admin/content/action", name="admin.popup.content.action")
     */
    public function popupContentAction(Request $request): Response {

        return $this->render("admin/popup_content_action.html.twig", [
            "bloc" => $request->request->get("bloc"),
            "content"=>$request->request->get("content"),
            "id"=> $request->request->get("id")
        ]);

    }

    /**
     * @Route("/admin/content/add", name="admin.popup.content.add")
     */
    public function popupContentAdd(Request $request) {
        //dump($request->request->get("editeur"));
        if($request->request->get("editeur")!==null) {

            $str=str_replace(chr(10),"",$request->request->get("editeur"));
            $str=str_replace(chr(13),"",$str);
            $str=addslashes($str);

            return $this->render("admin/popup_content_add.html.twig", ["str"=> $str]);
        } else return $this->render("admin/popup_content_add.html.twig", [
            "bloc"=> $request->request->get("bloc"),
            "content"=>$request->request->get("content"),
            "id" => $request->request->get("id")
        ]);
    }

}
