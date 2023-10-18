<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class UserController extends AbstractController
{
    #[Route('/user', name: 'app_user')]
    public function index(Request $request, EntityManagerInterface $entityManager): Response
    {
        $user = new User();
        $form = $this->createForm(UserFormType::class,$user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
            $entityManager->persist($user);
            $entityManager->flush();
            return $this->redirectToRoute('app_home');
        }
        
        return $this->render('user/user.html.twig', [
            'controller_name' => 'Inscrivez-vous',
            'user' => $form->createView()
        ]);
    }
}
