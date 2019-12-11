<?php


namespace App\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;
class IndexController
{

    public function index()
    {
        return new JsonResponse("test");
    }

    public function numberAction($id)
    {
        return new JsonResponse($id);
    }

    public function putAction()
    {
        return new JsonResponse("test");
    }
}