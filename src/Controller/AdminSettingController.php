<?php

namespace App\Controller;

use App\Entity\AdminSetting;
use App\Form\AdminSettingType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminSettingController extends AbstractController
{

    #[Route('/admin/setting', name: 'admin.setting')]
    public function index(ManagerRegistry $doctrine): Response
    {
        $repository = $doctrine->getRepository(AdminSetting::class);
        $settings = $repository->findAll();
        return $this->render('admin/setting/index.html.twig', [ 'settings' => $settings] );
    }


    #[Route('/admin/setting/{page?1}/{limit?12}', name:'admin.setting.alls')]
    public function indexPagination(ManagerRegistry $doctrine, $page, $limit): Response
    {
        $repository = $doctrine->getRepository(AdminSetting::class);
        $settingCount = $repository->count([]);

        //$settingPage =  $settingCount % $limit == 0 ? $settingCount / $limit : ceil($settingCount / $limit);

        $settingPage = ceil($settingCount / $limit);
        $settings = $repository->findBy([],[], $limit, ($page - 1 ) * $limit);


        return $this->render('admin/setting/index.html.twig',
            [
                'settings' => $settings,
                'isPagination' => true,
                'nbrePage' => $settingPage,
                'page' => $page,
                'limit' => $limit,
            ]);
    }


    #[Route('admin/setting/{id<\d+>}', name: 'admin.setting.detail')]
    public function detail(ManagerRegistry $doctrine, $id): Response
    {
       $repository = $doctrine->getRepository(AdminSetting::class);
       $detail = $repository->find($id);
       if (!$detail){
           return $this->redirectToRoute('admin.setting');
       }
       return $this->render('admin/setting/edit.html.twig', [ 'setting' => $detail ]);
    }

    #[Route('admin/product/setting/add', name: 'admin.setting.add')]
    public function add(ManagerRegistry $doctrine, Request $request): Response {

        $setting = new AdminSetting();
        $form = $this->createForm(AdminSettingType::class, $setting);

        $form->handleRequest($request);

        if ($form->isSubmitted()){

            $manager = $doctrine->getManager();
            $manager->persist($setting);
            $manager->flush();

            return $this->redirectToRoute('admin.setting');

        }else {
            return $this->render('admin/setting/add.html.twig', [
                'form' => $form->createView()
            ]);

        }

    }


}
