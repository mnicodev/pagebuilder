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
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Validator\Constraints\DateTime;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Filesystem\Exception\IOExceptionInterface;

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
     * @Route("/admin/page/test/{slug}",name="admin.page.edit2", requirements={"slug"="[0-9]*"})
     */
    public function edit2(Request $request, $slug): Response {

            $orm=$this->getDoctrine()->getManager();
            $page=$orm->getRepository(Page::class)->find($slug);



            $pagebuilder=[
                "name" =>   $page->getName(),
                "description" => $page->getDescription(),
                "param" => unserialize($page->getParam()),
				//"classes" => $page->getClasses(),
				//"blocs"=>$page->getBlocs(),
				"content"=>$page->getContent(),
				"cache"=>$page->getCache(),
			];
			$blocs=[];
			foreach($page->getBlocs() as $bloc) {
				$blocs[$bloc->getName()]=$bloc->getData();
			}
			$pagebuilder["blocs"]=$blocs;
			print_r(json_encode($pagebuilder));
			//return new Response($page->getName()."|".$page->getContent());

            return new Response((json_encode($pagebuilder)));

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
				//"classes" => $page->getClasses(),
				//"blocs"=>$page->getBlocs(),
				"content"=>$page->getContent(),
            ];
			$blocs=[];
			foreach($page->getBlocs() as $bloc) {
				$blocs[$bloc->getName()]=$bloc->getData();
			}
			$pagebuilder["blocs"]=$blocs;
			$classes=[];
			foreach($page->getClasses() as $classe) {
				$classes[$classe->getName()]=array("param"=>$classe->getStyle(),"container"=>$classe->getContainer());
			}
			$pagebuilder["classes"]=$classes;
			//print_r($pagebuilder);
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
			->setCache($pagebuilder->cache)
			->setContent($pagebuilder->content)
            ->setParam(serialize($pagebuilder->param))
            ->setType("page")
            ->setIdSite(1)
            ->setStatus(1);

        $str="";
		foreach($pagebuilder->blocs as $key=>$bloc) {
			$b=$this->getDoctrine()->getRepository(Bloc::class)->findOneBy(["name"=>$key]);
			//$str.=$b->getData()."<br>";
			$page->addBloc($b);
		}
		

		$style="";
		foreach($pagebuilder->classes as $key=>$classe) {
			$c=$this->getDoctrine()->getRepository(Classe::class)->findOneBy(["name"=>$key]);
			if(empty($c)) $c=new Classe();
			
			$c->setName($key);
			$c->setStyle($classe->param);
			$c->setContainer($classe->container);
			$c->setPage($page);
			$entityManager->persist($c);
			$entityManager->flush();

			$style.="#".$key."{";
			$style.=$classe->param;
			$style.="}";

			
			$page->addClass($c);
		}
		


        $entityManager->persist($page);

		$entityManager->flush();

		/*$fs=new FileSystem();
		$current_dir=getcwd();
		$file_style=$current_dir."/css/styles".$page->getId().".css";

		$fs->touch($file_style);
		$fs->chmod($file_style,0777);
		$fs->dumpFile($file_style,$style);
		$fs->chmod($file_style,0644);*/


        if($page->getId()) $output=["msg"=>"<div class='alert-success alert'>La page numéro ".$page->getId()." a été sauvegardée</div>","page_id"=>$page->getId()];
        else $output=["msg"=>"<div class='alert-danger alert'>erreur</div>"];
        return new Response(json_encode($output));
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
			->add("style",TextareaType::class, [
				"data"=>$request->request->get("style")
			])
			->add("padding",TextType::class,array("label"=>"Marge intérieure (--px --px ou --px --px --px --px ou --px)"))
			->add("container",ChoiceType::class,["choices"=>["sans"=>"","container"=>"container","container fluid"=>"container-fluid"]])
			//->add("page",HiddenType::class,["data"=>$request->request->get("id_page")])
			->add("valider",SubmitType::class)
			->add("apercu",ButtonType::class,["label"=>"Aperçu"])
			->add("fermer",ButtonType::class)
			->getForm();
		/* 
		 * on n'enregistre pas encore les styles
		 * méthode ancienne, à supprimer ?
		 */
		/*$form->handleRequest($request);
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

		}*/
		return $this->render("admin/popup_zone_styles.html.twig",["form"=>$form->createView(),"zone"=>$request->request->get("zone"),"style"=>$request->request->get("style"),"id_page"=>$request->request->get("id_page")]);
	}



    /**
     * @Route("/admin/content/add", name="admin.popup.content.add")
     */
    public function popupAddContent(Request $request) {
		//dump($request->request->get("editeur"));
		$content="";
		$repository=$this->getDoctrine()->getRepository(Bloc::class);
		if($content=$request->request->get("content")) {
			$bloc=$repository->findOneBy(["name"=>$content]);
		} else $bloc=new Bloc();

		$liste_bloc=$repository->findAll();


		$form=$this->createFormBuilder($bloc)
			 ->add('data',TextareaType::class,['row_attr' => ['class' => 'text-editor']])
		 	->add("valider",SubmitType::class)
		 	->add("fermer",ButtonType::class)
			->getForm();

		$form->handleRequest($request);
    	if ($form->isSubmitted() && $form->isValid()) {
        	$entityManager=$this->getDoctrine()->getManager();
			//if($request->request->get("editeur")!==null) {
			//$bloc=$form->getData();
			$bloc->setData($request->request->get("ContentFromEditor"));
			/*if(!$content) $bloc->setDateCreate(\DateTime::createFromFormat("Y-m-d H:i:s",strtotime('now')));
			$bloc->setDateUpdate(\DateTime::createFromFormat("Y-m-d H:i:s",strtotime('now')));*/
			if(empty($content)) $bloc->setName("c_".uniqid());
			$entityManager->persist($bloc);
			$entityManager->flush();
			$bloc->setCle($request->request->get("bloc"));

			$t=["data"=>$bloc->getData(),"bloc"=>$request->request->get("bloc"),"content"=>$bloc->getName()];
			return new Response(json_encode($t));
            //return $this->render("admin/popup_content_add.html.twig", ["str"=> $str]);
		} else {
			$content_id=$request->request->get("content");
			//if(empty($content_id)) $content_id=uniqid();

			return $this->render("admin/popup_content_add.html.twig", [
            	"bloc"=> $request->request->get("bloc"), // !!!! bloc id
            	"content"=>$content_id,
				'form' => $form->createView(),
				'liste_bloc' => $liste_bloc,
			]);
		}
	}



}

