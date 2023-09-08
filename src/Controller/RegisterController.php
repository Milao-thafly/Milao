<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegistrationFormType;
use App\Repository\UserRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class RegisterController extends AbstractController
{
    #[Route('/register', name: 'app_register')]
    public function register(Request $request, UserPasswordHasherInterface  $passwordEncoder,UserRepository $repo): Response
    {
        $user = new User();

        $form = $this->createForm(RegistrationFormType::class, $user);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $user->setPassword(
                $passwordEncoder->hashpassword(
                    $user,
                    $form->get('password')->getData()
                )
                );

                $repo->add($user, true);

                $this->addFlash('success', 'Vous êtes bien inscrit à nos incroyable utilisateur');

                return $this->redirectToRoute('login');
        }

        return $this->render('security/register.html.twig', [
            'RegistrationFormType' => $form->CreateView()
        ]);
    }
}