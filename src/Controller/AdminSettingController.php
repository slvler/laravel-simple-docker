<?php

namespace App\Controller;

use App\Entity\AdminSetting;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
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


}
