<?php


namespace App\Controller;


use App\Entity\Flight;
use DateTime;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;

class FlightController extends AbstractController
{

    public function flightList()
    {
        return $this->json($this->getDoctrine()->getRepository(Flight::class)->findAll());
    }

    public function getFlight($id)
    {
        return $this->json($this->getDoctrine()->getRepository(Flight::class)->find($id));
    }

    public function createFlight()
    {
        $entityManager = $this->getDoctrine()->getManager();
        $product = new Flight(NULL,1, 2, new DateTime(), new DateTime(), 1);
        $entityManager->persist($product);
        $entityManager->flush();
        return new JsonResponse('Saved new product with id '. $product->getId());
    }

    public function updateFlight($id)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $product = $this->getDoctrine()->getRepository(Flight::class)->find($id);
        $product->setDepartureAirport(3);
        $entityManager->persist($product);
        $entityManager->flush();
        return new JsonResponse('Modified product with id '. $product->getId());
    }

    public function deleteFlight($id)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $product = $this->getDoctrine()->getRepository(Flight::class)->find($id);
        $entityManager->remove($product);
        $entityManager->flush();
        return new JsonResponse('Remove product : '. $product->getId());
    }
}