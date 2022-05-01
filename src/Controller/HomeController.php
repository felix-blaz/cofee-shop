<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(): Response
    {
        $template = 'default/index.html.twig';
        $argsArray = [];

        return $this->render($template, $argsArray);
    }

    #[Route('/feedback', name: 'feedback')]
    public function feed(): Response
    {
        $template = 'default/feedback.html.twig';
        $argsArray = [];

        return $this->render($template, $argsArray);
    }

    #[Route('/perks', name: 'perks')]
    public function perks(): Response
    {
        $template = 'default/perks.html.twig';
        $argsArray = [];

        return $this->render($template, $argsArray);
    }

}
