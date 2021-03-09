<?php

namespace App\Controller;

use App\Entity\Rendezvous;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;

class RendezvousController extends AbstractController
{
  
    private $tokenstorage;
    private $entityManager;
   

    public function __invoke(Rendezvous $data,TokenStorageInterface $tokenStorage, EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
        $this->tokenStorage = $tokenStorage;
      

        //recuperation du user connecté
       $userconnecte = $this->tokenStorage->getToken()->getUser();
      
       $use = $data->setUser($userconnecte);
      // dd($use);
      $poid= $data->getPoid();
      //recuperation libelle action
      $libaction= $data->getAction()->getLibelleaction();
      //planifier un rv en passant libaction rv comment libellé action
      if($poid == null){
      
    $data->setLibactionrv($libaction);
    $dat= $data->getLibactionrv();
         }
//dd($dat);

    //passer etat rv à true si il s'agit d'un rv effectuer  
   if($poid !== null){
    $data->setEtatrv(true);
    $data->setEtatrendezvous("VALIDER");  
     }

//dd($data);

       return $data;

    }


}
