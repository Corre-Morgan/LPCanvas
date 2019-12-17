<?php


namespace App\Controller;

use App\Entity\User;
use DateTime;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class UserController extends AbstractController
{
    public function userAction()
    {
        $user = new User(1,"morgan","corre", date("d-m-Y", strtotime("1999-09-20")), new DateTime());


        return $this->json($user);
    }

    public function newUser($firstName, $lastName)
    {
        $user = new User(null,$firstName,$lastName, null, new DateTime());

        return $this->json($user);
    }

    public function userList()
    {
        $listUser = [
            new User(1,"prenom","nom", null, new DateTime()),
            new User(2,"prenom","nom", null, new DateTime()),
            new User(3,"prenom","nom", null, new DateTime())
        ];
        return $this->json($listUser);
    }
}