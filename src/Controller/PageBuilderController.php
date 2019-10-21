<?php


namespace App\Controller;




use App\Form\CreateZoneType;
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
     * @Route("/admin/page/save", name="admin.page.save")
     */
    public function save(Request $request): Response {
        $t=$request->get("b");
        print_r(json_decode($t));
        return new Response();
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
    public function popupZoneAdd(): Response {

        //print_r($zoneAddType);

        $form= $this->createForm(CreateZoneType::class);


        return $this->render("admin/popup_add_zone.html.twig", ["form"=>$form->createView()]);
    }

    /**
     * @Route("/admin/popup/content", name="admin.popup.content")
     */
    public function popupContent(Request $request) {
        //dump($request->request->get("editeur"));
        if($request->request->get("editeur")!==null) {

            $str=str_replace(chr(10),"",$request->request->get("editeur"));
            $str=str_replace(chr(13),"",$str);

            return $this->render("admin/popup_content.html.twig", ["str"=> $str]);
        } else return $this->render("admin/popup_content.html.twig", ["bloc"=> $request->get("bloc")]);
    }

}
