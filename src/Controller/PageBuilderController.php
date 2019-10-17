<?php


namespace App\Controller;



use App\Form\App\Controller\createZoneType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class PageBuilderController extends AbstractController
{



    /**
     * @Route("/admin/page",name="admin.page.create")
     */
    public function index(Request $request): Response {
        return $this->render('admin/page.html.twig',array("str"=>"hello world"));

    }

    public function new(Request $request): Response {
        $this->getDoctrine()->getRepository(Page::class);
    }


    /**
     * @return Response
     * @Route("/admin/popup/create", name="admin.popup.create");
     */
    public function popupCreate(): Response {
        return $this->render("admin/popup_create.html.twig");
    }

    /**
     * @return Response
     * @Route("/admin/popup/add-zone", name="admin.popup.addzone");
     */
    public function zoneAdd(): Response {

        //print_r($zoneAddType);

        $form= $this->createForm(createZoneType::class);

        return $this->render("admin/popup_add_zone.html.twig", ["form"=>$form->createView()]);
    }

}
