<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminSettingController extends AbstractController
{

    #[Route('/admin/setting', name: 'admin.setting')]
    public function index(): Response
    {
        return $this->render('admin/setting/index.html.twig' );
    }
}
