<?php


namespace App\Controller;
use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends AbstractController
{
    public function auth()
    {
        $request = Request::createFromGlobals();
        $authData = $request->getContent();
        $controlData = $this->getDoctrine()->getRepository(User::class)->findAll();
        if($controlData === $authData) {
          $answer = 'yes';
        } else {
            $answer = 'no';
        }

        $response = new Response(
            $answer,
            Response::HTTP_OK,
            ['content-type' => 'text/html']
        );
        $response->prepare($controlData);
        $response->send();
    }

}