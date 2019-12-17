<?php


namespace App\Controller;


use App\Entity\Airport;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;

class AirportController extends AbstractController
{

    public function airportList()
    {
        return $this->json($this->getDoctrine()->getRepository(Airport::class)->findAll());
    }

    public function getAirport($id)
    {
        return $this->json($this->getDoctrine()->getRepository(Airport::class)->find($id));
    }

    public function createAirport()
    {
        $entityManager = $this->getDoctrine()->getManager();
        $product = new Airport(NULL, 2, 'Airport name');
        $entityManager->persist($product);
        $entityManager->flush();
        return new JsonResponse('Saved new product with id '. $product->getId());
    }

    public function updateAirport($id)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $product = $this->getDoctrine()->getRepository(Airport::class)->find($id);
        $product->setName("name changed");
        $entityManager->persist($product);
        $entityManager->flush();
        return new JsonResponse('Modified product with id '. $product->getId());
    }

    public function deleteAirport($id)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $product = $this->getDoctrine()->getRepository(Airport::class)->find($id);
        $entityManager->remove($product);
        $entityManager->flush();
        return new JsonResponse('Remove product : '. $product->getId());
    }
}