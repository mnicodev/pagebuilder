<?php


namespace App\Controller;




use App\Entity\Page;
use App\Entity\Classe;
use App\Entity\Bloc;
use App\Form\CreateZoneType;
use App\Form\BlocType;
use phpDocumentor\Reflection\Types\Integer;
use Psr\Container\ContainerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ButtonType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

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
				"classes" => $page->getClasses(),
				"blocs"=>$page->getBlocs(),
				"content"=>$page->getContent(),
            ];
			//print_r(serialize(json_encode($pagebuilder)));
			$t=[$page->getName(),$page->getDescription(),$page->getContent()];
            //return new Response($page->getName()."|".$page->getContent());
            return new Response((json_encode($pagebuilder)));

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
	 * @Route("/admin/zone/styles", name="admin.popup.styles")
	 */
	public function popupStyles(Request $request): Response {
		$repository=$this->getDoctrine()->getRepository(Classe::class);
		$classe=$repository->findOneBy(["name"=>$request->request->get("zone")]);
		if(!$classe)	$classe=new Classe();
		$form=$this->createFormBuilder($classe)
			->add("param",TextareaType::class, [
				"data"=>$request->request->get("style")
			])
			->add("container",ChoiceType::class,["choices"=>["sans"=>"","container"=>"container","container fluid"=>"container-fluid"]])
			//->add("page",HiddenType::class,["data"=>$request->request->get("id_page")])
			->add("valider",SubmitType::class)
			->add("apercu",ButtonType::class,["label"=>"Aperçu"])
			->add("fermer",ButtonType::class)
			->getForm();
		$form->handleRequest($request);
		if ($form->isSubmitted() && $form->isValid()) {
			$entityManager=$this->getDoctrine()->getManager();
            $page=$entityManager->getRepository(Page::class)->find($request->request->get("id_page"));

			$classe->setName($request->request->get("zone"));
			$classe->setPage($page);
			$page->addClass($classe);
			$entityManager->persist($classe);
			$entityManager->persist($page);


			$entityManager->flush();

			$t=["param"=>$classe->getParam(),"id"=>$classe->getId(),"container"=>$classe->getContainer()];

			return new Response(json_encode($t));

		}
		return $this->render("admin/popup_zone_styles.html.twig",["form"=>$form->createView(),"zone"=>$request->request->get("zone"),"style"=>$request->request->get("style"),"id_page"=>$request->request->get("id_page")]);
	}



    /**
     * @Route("/admin/content/add", name="admin.popup.content.add")
     */
    public function popupContentAdd(Request $request) {
		//dump($request->request->get("editeur"));
		$content="";
		if($content=$request->request->get("content")) {
			$repository=$this->getDoctrine()->getRepository(Bloc::class);
			$bloc=$repository->findOneBy(["name"=>$content]);
		} else $bloc=new Bloc();


		$form=$this->createFormBuilder($bloc)
			 ->add('data',TextareaType::class)
		 	->add("valider",SubmitType::class)
		 	->add("fermer",ButtonType::class)
			->getForm();

		$form->handleRequest($request);
    	if ($form->isSubmitted() && $form->isValid()) {
        	$entityManager=$this->getDoctrine()->getManager();
			//if($request->request->get("editeur")!==null) {
			//$bloc=$form->getData();
			$bloc->setData($request->request->get("ContentFromEditor"));
			if(empty($content)) $bloc->setName(uniqid());
			$entityManager->persist($bloc);
			$entityManager->flush();
			$bloc->setCle($request->request->get("bloc"));

			$t=["data"=>$bloc->getData(),"bloc"=>$request->request->get("bloc"),"content"=>$bloc->getName()];
			return new Response(json_encode($t));
            //return $this->render("admin/popup_content_add.html.twig", ["str"=> $str]);
		} else {

			return $this->render("admin/popup_content_add.html.twig", [
            	"bloc"=> $request->request->get("bloc"),
            	"content"=>$request->request->get("content"),
				'form' => $form->createView(),
			]);
		}
	}



}

