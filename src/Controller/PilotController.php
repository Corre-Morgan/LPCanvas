<?php


namespace App\Controller;


use App\Entity\Pilot;
use DateTime;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;

class PilotController extends AbstractController
{

    public function pilotList()
    {
        $pilot = $this->getDoctrine()->getRepository(Pilot::class)->findAll();
        return $this->json($pilot);
    }

    public function getPilot($id)
    {
        return $this->json($this->getDoctrine()->getRepository(Pilot::class)->find($id));
    }

    public function createPilot()
    {
        $entityManager = $this->getDoctrine()->getManager();
        $product = new Pilot(NULL, 'first_name', 'last_name', new DateTime(), new DateTime(), new DateTime(), new DateTime());
        $entityManager->persist($product);
        $entityManager->flush();
        return new JsonResponse('Saved new product with id '. $product->getId());
    }

    public function updatePilot($id)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $product = $this->getDoctrine()->getRepository(Pilot::class)->find($id);
        $product->setFirstName("name changed");
        $entityManager->persist($product);
        $entityManager->flush();
        return new JsonResponse('Modified product with id '. $product->getId());
    }

    public function deletePilot($id)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $product = $this->getDoctrine()->getRepository(Pilot::class)->find($id);
        $entityManager->remove($product);
        $entityManager->flush();
        return new JsonResponse('Remove product : '. $product->getId());
    }
}