<?php

namespace App\Controller;
use App\Entity\Comment;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class CommentController extends AbstractController
{
    /**
      @Route("/comment", name="PostComment")
     */
   public function index(): Response
    {
        $entityManager = $this->getDoctrine()->getManager();

        $comment = new Comment();
        $comment->setIdMediaContainer(1);
		$comment->setIdPostUser(2);
        $comment->setTextComment('Cool!');
		
        $entityManager->persist($comment);

        // actually executes the queries (i.e. the INSERT query)
        $entityManager->flush();

        return new Response('Saved new comment with id '.$comment->getId());
    }
	
	/**
 * @Route("/comment/{id}", name="ShowComment")
 */
	public function show($id)
	{
		$comment = $this->getDoctrine()
			->getRepository(Comment::class)
			->find($id);

		if (!$comment) {
			throw $this->createNotFoundException(
				'No comment found for id '.$id
			);
		}

		return new Response('Comment: '.$comment->getTextComment());	
	}
	
	
}
