<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MerchController extends AbstractController
{
    #[Route('/merch', name: 'app_merch')]
    public function index(): Response
    {
        return $this->render('merch/merch.html.twig', [
            'controller_name' => 'MerchController',
        ]);
    }
}
