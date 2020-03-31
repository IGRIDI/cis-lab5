<?php

namespace App\Controller;
use App\Entity\Container;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ContainerController extends AbstractController
{
    /**
      @Route("/container", name="PostContainer")
     */
   public function index(): Response
    {
        $entityManager = $this->getDoctrine()->getManager();

        $container = new Container();
        $container->setCaption('ffffsshhhhhhhhhhhhhhhhhh');
		$container->setUrl('dfdjfjsdfsll34jl2l2l2k3');
        $container->setLocationId('8899008');
		$container->setUserTags(['lol','awesome']);
		
        $entityManager->persist($container);

        // actually executes the queries (i.e. the INSERT query)
        $entityManager->flush();

        return new Response('Saved new container with id '.$container->getId());
    }
	
	/**
 * @Route("/comment/{id}", name="ShowComment")
 */
	public function show($id)
	{
		$container = $this->getDoctrine()
			->getRepository(Container::class)
			->find($id);

		if (!$container) {
			throw $this->createNotFoundException(
				'No container found for id '.$id
			);
		}

		return new Response('Containers URL: '.$container->getUrl());	
	}
	
	
	
}
