<?php
namespace App\Controller;

use App\Entity\Post;
use App\Entity\Comment;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Repository\PostRepository;

class PostController extends AbstractController
{
    /**
     * Show a blog entry
     */
    public function showAction($id, $slug, $comments)
    {
        $em = $this->getDoctrine()->getManager();

        $post = $em->getRepository(Post::class)->find($id);
        if (!$post) {
            throw $this->createNotFoundException('Unable to find Blog post.');
        }

        $comments = $em->getRepository(Comment::class)
            ->getCommentsForBlog($post->getId());

        return $this->render('Post/show.html.twig', array(
            'post'      => $post,
            'comments'  => $comments
        ));

    }
}
