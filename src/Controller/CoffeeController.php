<?php

namespace App\Controller;

use App\Entity\Coffee;
use App\Form\AddToCartType;
use App\CartManager;
use App\Repository\CoffeeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


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
    public function coffeeD(Coffee $coffee, Request $request, CartManager $cartManager)
    {
        $form = $this->createForm(AddToCartType::class);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $item = $form->getData();
            $item->setCoffee($coffee);

            $cart = $cartManager->getCurrentCart();
            $cart
                ->addItem($item)
                ->setUpdatedAt(new \DateTime());

            $cartManager->save($cart);
            return $this->redirectToRoute('coffee.detail', ['id' => $coffee->getId()]);

        }
        return $this->render('coffee/detail.html.twig', [
            'coffee' => $coffee,
            'form' => $form->createView()
        ]);
    }


}
