<?php

namespace App\Controller;

use App\Entity\Post;
use App\Entity\Comment;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Repository\PostRepository;

//use Ravtovich\BlogBundle\Entity\Enquiry;
//use Ravtovich\BlogBundle\Form\EnquiryType;

class BlogController extends AbstractController
{
    public function indexAction()
    {

        $em = $this->getDoctrine()
                    ->getManager();

        $posts = $em->getRepository(Post::class)
                    ->getLatestBlogs();

        return $this->render('Blog/index.html.twig', array(
            'posts' => $posts
        ));
    }
    public function aboutAction()
    {
        return $this->render('Blog/about.html.twig');
    }
    public function sidebarAction()
    {
        $em = $this->getDoctrine()
            ->getManager();

        $tags = $em->getRepository(Post::class)
            ->getTags();

        $tagWeights = $em->getRepository(Post::class)
            ->getTagWeights($tags);


        $commentLimit   = $this->getParameter('blogger_blog.comments.latest_comment_limit');
        $latestComments = $em->getRepository(Comment::class)
            ->getLatestComments($commentLimit);

        return $this->render('Blog/sidebar.html.twig', array(
            'latestComments'    => $latestComments,
            'tags'              => $tagWeights
        ));
    }

//    public function contactAction(Request $request)
//    {
//        $enquiry = new Enquiry();
//        $form = $this->createForm(EnquiryType::class, $enquiry);
//        if ($request->isMethod($request::METHOD_POST)) {
//            $form->handleRequest($request);
//            if ($form->isValid()) {
//                $message = \Swift_Message::newInstance()
//                    ->setSubject('Contact enquiry from symblog')
//                    ->setFrom('enquiries@symblog.co.uk')
//                    ->setTo('ravtovich_blog.emails.contact_email')
//                    ->setBody($this->renderView('RavtovichBlogBundle:Page:contactEmail.txt.twig', array('enquiry' => $enquiry)));
//                $this->get('mailer')->send($message);
//                $this->get('session')->getFlashBag()->add('blogger-notice', 'Your contact enquiry was successfully sent. Thank you!');
//                return $this->redirect($this->generateUrl('ravtovich_blog_contact'));
//            }
//        }
//        return $this->render('RavtovichBlogBundle:Page:contact.html.twig', array(
//            'form' => $form->createView()
//        ));
//    }
}
