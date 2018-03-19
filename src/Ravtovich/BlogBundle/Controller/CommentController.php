<?php
namespace Ravtovich\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Ravtovich\BlogBundle\Entity\Comment;
use Ravtovich\BlogBundle\Form\CommentType;
use Symfony\Component\HttpFoundation\Request;

/**
 * Comment controller.
 */
class CommentController extends Controller
{
    public function newAction($post_id)
    {
        $blog = $this->getBlog($post_id);

        $comment = new Comment();
        $comment->setPost($blog);
        $form   = $this->createForm(CommentType::class, $comment);

        return $this->render('RavtovichBlogBundle:Comment:form.html.twig', array(
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

        if ($form->isValid()) {
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

        return $this->render('RavtovichBlogBundle:Comment:create.html.twig', array(
            'comment' => $comment,
            'form'    => $form->createView()
        ));

    }

    protected function getBlog($blog_id)
    {
        $em = $this->getDoctrine()
            ->getManager();
        $blog = $em->getRepository('RavtovichBlogBundle:Post')->find($blog_id);

        if (!$blog) {
            throw $this->createNotFoundException('Unable to find Blog post.');
        }

        return $blog;
    }


}