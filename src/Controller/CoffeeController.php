<?php

namespace App\Controller;

use App\Entity\Coffee;
use App\Form\AddToCartType;
use App\Form\CoffeeFormType;
use App\CartManager;

use Doctrine\ORM\EntityManagerInterface;
use App\Repository\CoffeeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class CoffeeController extends AbstractController

{
   private $em;
    private $coffeeRepository;
    public function __construct(EntityManagerInterface $em, CoffeeRepository $coffeeRepository)
{
    $this->em = $em;
    $this->coffeeRepository = $coffeeRepository;
}



    #[Route('/coffee', name: 'coffee')]
    public function index(CoffeeRepository $coffeeRepository): Response
    {
        return $this->render('coffee/coffee.html.twig', [
            'coffee' => $coffeeRepository->findAll(),
        ]);
    }

    #[Route('/coffee/create', name: 'create_coffee')]
    public function create(Request $request):Response
    {
    $coffee =new Coffee();
    $form = $this->createForm(CoffeeFormType::class, $coffee);

    $form->handleRequest($request);
    if($form->isSubmitted() && $form->isValid()){
        $newCoffee = $form->getData();

        $image = $form->get('image')->getData();
        if($image){
            $newFileName = uniqid() . '.' . $image->guessExtension();

            try {
                $image->move(
                    $this->getParameter('kernel.project_dir') . '/public/uploads',
                    $newFileName
                );
            } catch (FileException $e){
                return new Response($e->getMessage());
            }
            $newCoffee->setImage('/uploads/' . $newFileName);
        }
        $this->em->persist($newCoffee);
        $this->em->flush();
        return $this->redirectToRoute('coffee');
    }

    return $this->render('coffee/create.html.twig',[
        'form' => $form->createView()
    ]);
    }

    #[Route('/coffee/edit/{id}', name: 'edit_coffee')]
    public function edit($id, Request $request):Response
    {
        $coffee = $this->coffeeRepository->find($id);
        $form = $this->createForm(CoffeeFormType::class, $coffee);

        $form->handleRequest($request);
        $image = $form->get('image')->getData();

        if($form->isSubmitted() && $form->isValid()){
            if ($image) {
                if ($coffee->getImage() !== null) {
                    if (file_exists(
                        $this->getParameter('kernel.project_dir') . $coffee->getImage()
                    )) {
                        $this->GetParameter('kernel.project_dir') . $coffee->getImage();
                    }
                    $newFileName = uniqid() . '.' . $image->guessExtension();

                    try {
                        $image->move(
                            $this->getParameter('kernel.project_dir') . '/public/uploads',
                            $newFileName
                        );
                    } catch (FileException $e) {
                        return new Response($e->getMessage());
                    }

                    $coffee->setImage('/uploads/' . $newFileName);
                    $this->em->flush();

                    return $this->redirectToRoute('coffee');
                }
            }else{
                $coffee->setName($form->get('name')->getData());
                $coffee->setDescription($form->get('description')->getData());
                $coffee->setPrice($form->get('price')->getData());

                $this->em->flush();
                return $this->redirectToRoute('coffee');
            }
        }
        return  $this->render('coffee/edit.html.twig', [
            'coffee' => $coffee,
            'form' => $form->createView()
        ]);
    }

    #[Route('/coffee/delete/{id}', methods: ['GET', 'DELETE'], name: 'delete_coffee')]
    public function delete($id): Response
    {

        $coffee = $this->coffeeRepository->find($id);
        $this->em->remove($coffee);
        $this->em->flush();

        return $this->redirectToRoute('coffee');
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
