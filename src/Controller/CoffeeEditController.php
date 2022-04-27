<?php

namespace App\Controller;

use App\Form\CoffeeFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\CoffeeRepository;



class CoffeeEditController extends AbstractController
{

    private $em;
    private $coffeeRepository;
    public function __construct(EntityManagerInterface $em, CoffeeRepository $coffeeRepository)
    {
        $this->em = $em;
        $this->coffeeRepository = $coffeeRepository;
    }

    #[Route('/coffee/edit/{id}', name: 'edit_coffee')]
    public function edit($id):Response
    {
        $coffee = $this->coffeeRepository->find($id);
        $form = $this->createForm(CoffeeFormType::class, $coffee);
        return  $this->render('coffee/edit.html.twig', [
            'coffee' => $coffee,
            'form' => $form->createView()
        ]);
    }

}
