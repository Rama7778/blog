<?php
namespace Ravtovich\BlogBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PostController extends Controller
{
    /**
     * Show a blog entry
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $blog = $em->getRepository('RavtovichBlogBundle:Post')->find($id);
        if (!$blog) {
            throw $this->createNotFoundException('Unable to find Blog post.');
        }

        $comments = $em->getRepository('RavtovichBlogBundle:Comment')
            ->getCommentsForBlog($blog->getId());

        return $this->render('RavtovichBlogBundle:Post:show.html.twig', array(
            'blog'      => $blog,
            'comments'  => $comments
        ));

    }
}
