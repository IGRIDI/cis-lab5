<?php

namespace App\Controller;
use App\Entity\User;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{
    /**
      @Route("/user", name="PostUser")
     */
   public function index(): Response
    {
        $entityManager = $this->getDoctrine()->getManager();

        $user = new User();
        $user->setUsername('Karina');
        $user->setPassword('343fdgf767878');
		$user->setProfilePicture('sads223357hbhgff33333tufghj9990');
		$user->setFullName('Karina Karina');
        $user->setBio('lalalalalala!');
		$user->setWebsite('lalala.org');
		$user->setIsBusiness(1);

        $entityManager->persist($user);

        // actually executes the queries (i.e. the INSERT query)
        $entityManager->flush();

        return new Response('Saved new user with id '.$user->getId());
    }
	
	/**
 * @Route("/user/{id}", name="ShowUser")
 */
	public function show($id)
	{
		$user = $this->getDoctrine()
			->getRepository(User::class)
			->find($id);

		if (!$user) {
			throw $this->createNotFoundException(
				'No user found for id '.$id
			);
		}

		return new Response('User: '.$user->getUsername());	
	}
	
	
}
