<?php


namespace App\Controller;


use App\Entity\Plane;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;

class PlaneController extends AbstractController
{

    public function planeList()
    {
        $planes = $this->getDoctrine()->getRepository(Plane::class)->findAll();
        return $this->json($planes);
    }

    public function getPlane($id)
    {
        $plane = $this->getDoctrine()->getRepository(Plane::class)->find($id);
        return $this->json($plane);
    }

    public function createPlane()
    {
        $entityManager = $this->getDoctrine()->getManager();
        $product = new Plane(NULL, 'Plane name', 'model', 300, NULL);
        $entityManager->persist($product);
        $entityManager->flush();
        return new JsonResponse('Saved new product with id '. $product->getId());
    }

    public function updatePlane($id)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $product = $this->getDoctrine()->getRepository(Plane::class)->find($id);
        $product->setName("name changed");
        $entityManager->persist($product);
        $entityManager->flush();
        return new JsonResponse('Modified product with id '. $product->getId());
    }

    public function deletePlane($id)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $product = $this->getDoctrine()->getRepository(Plane::class)->find($id);
        $entityManager->remove($product);
        $entityManager->flush();
        return new JsonResponse('Remove product : '. $product->getId());
    }
}