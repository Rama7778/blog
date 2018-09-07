<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Entity\Comment;
use App\Entity\Post;
use App\Repository\CommentRepository;
use Symfony\Component\HttpFoundation\Request;
use App\Form\CommentType;

//use Symfony\Bundle\FrameworkBundle\Controller\Controller;


/**
 * Comment controller.
 */
class CommentController extends AbstractController
{
    public function newAction($post_id)
    {
        $blog = $this->getBlog($post_id);

        $comment = new Comment();
        $comment->setPost($blog);
        $form   = $this->createForm(CommentType::class, $comment);

        return $this->render('Comment/form.html.twig', array(
            'comment' => $comment,
            'form'   => $form->createView()
        ));
    }
    public function createAction(Request $request, $post_id)
    {
        $blog = $this->getBlog($post_id);
        $comment  = new Comment();
        $comment->setPost($blog);
        $form    = $this->createForm(CommentType::class, $comment);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()
                        ->getManager();
            $em->persist($comment);
            $em->flush();

            return $this->redirect($this->generateUrl('ravtovich_blog_show', array(
                    'id'    => $comment->getPost()->getId(),
                    'slug'  => $comment->getPost()->getSlug())) .
                    '#comment-' . $comment->getId()
            );
        }

        return $this->render('Comment/create.html.twig', array(
            'comment' => $comment,
            'form'    => $form->createView()
        ));
    }

    protected function getBlog($blog_id)
    {
        $em = $this->getDoctrine()
            ->getManager();
        $blog = $em->getRepository(Post::class)->find($blog_id);

        if (!$blog) {
            throw $this->createNotFoundException('Unable to find Blog post.');
        }

        return $blog;
    }


}