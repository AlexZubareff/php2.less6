<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{
    #[Route('/user/{id}', name: 'user')]

    public function showUser(int $id, UserRepository $userRepository): Response
    {
        $user = $userRepository->find($id);
        return new Response('User Age: ' .$user->getAge());

    }

    public function createUser(ManagerRegistry $doctrine): Response
    {
$entityManager = $doctrine->getManager();
$user = new User();
$user->setFirstName('Alex');
$user->setLastName('Ivanovih');
$user->setAge(56);
$user->setPhone(1235649879);

$entityManager->persist($user);
$entityManager->flush();

// показываем id пользователя которого добавили
return new Response('Save' .$user->getId());

    }
}
