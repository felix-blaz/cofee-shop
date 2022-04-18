<?php

namespace App\Controller;

use App\Repository\CoffeeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Coffee;

class CoffeeController extends AbstractController
{

    #[Route('/coffee', name: 'coffee')]
    public function index(CoffeeRepository $coffeeRepository): Response
    {
        return $this->render('coffee/coffee.html.twig', [
            'coffees' => $coffeeRepository->findAll(),
        ]);
    }

    #[Route('/coffee/{id}', name: 'coffee.detail')]
    public function coffeeD(Coffee $coffee): Response
    {
        return $this->render('coffee/detail.html.twig', [
            'coffee' => $coffee,
        ]);
    }
}
