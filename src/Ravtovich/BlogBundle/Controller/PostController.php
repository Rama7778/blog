<?php
namespace Ravtovich\BlogBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PostController extends Controller
{
    /**
     * Show a blog entry
     */
    public function showAction($id, $slug, $comments)
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
    public function sidebarAction()
    {
        $em = $this->getDoctrine()
            ->getManager();

        $tags = $em->getRepository('RavtovichBlogBundle:Post')
            ->getTags();

        $tagWeights = $em->getRepository('RavtovichBlogBundle:Post')
            ->getTagWeights($tags);


        $commentLimit   = $this->container
            ->getParameter('blogger_blog.comments.latest_comment_limit');
        $latestComments = $em->getRepository('RavtovichBlogBundle:Comment')
            ->getLatestComments($commentLimit);

        return $this->render('RavtovichBlogBundle:Page:sidebar.html.twig', array(
            'latestComments'    => $latestComments,
            'tags'              => $tagWeights
        ));
    }

}
