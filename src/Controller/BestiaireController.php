<?php

namespace App\Controller;

use App\Entity\Monster;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BestiaireController extends AbstractController
{
    #[Route('/bestiaire', name: 'bestiaire')]
    public function index(ManagerRegistry $doctrine): Response
    {
        $monsters = $doctrine->getRepository(Monster::class)->findAll();


        return $this->render('bestiaire/index.html.twig', [
            'controller_name' => 'Bestiaire',
            'Monsters' => $monsters
        ]);
    }
}
