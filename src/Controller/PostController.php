<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PostController extends AbstractController
{
    #[Route('/post', name: 'admin.post')]
    public function index(): Response
    {

        return $this->render('admin/post/index.html.twig', [
            'controller_name' => 'PostController',
        ]);
    }
}
