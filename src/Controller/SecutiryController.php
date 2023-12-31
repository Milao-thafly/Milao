<?php

namespace App\Controller;

use App\Form\LoginFormType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecutiryController extends AbstractController
{
    #[Route('/security', name: 'app_security')]
    public function index(Request $request,AuthenticationUtils $authenticationUtils): Response
    {

        $form = $this->createForm(LoginFormType::class);
        $form->handleRequest($request);

        $error = $authenticationUtils->getLastAuthenticationError();

        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('security/login.html.twig', [
            'last_username' => $lastUsername,
            'error' => $error,
            'LoginFormType' => $form->CreateView()
        ]);
    }
}
