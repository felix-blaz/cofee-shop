<?php

namespace App\Controller;

use App\Repository\CoffeeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class CoffeeController extends AbstractController
{
    #[Route('/coffee', name: 'coffee')]
    public function index(CoffeeRepository $coffeeRepository): Response
    {
        return $this->render('coffee/coffee.html.twig', [
            'coffee' => $coffeeRepository->findAll(),
        ]);
    }
}
