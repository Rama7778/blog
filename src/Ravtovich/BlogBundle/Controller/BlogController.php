<?php

namespace Ravtovich\BlogBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Ravtovich\BlogBundle\Entity\Enquiry;
use Ravtovich\BlogBundle\Form\EnquiryType;

class BlogController extends Controller
{
    public function indexAction()
    {
        $em = $this->getDoctrine()
            ->getManager();

        $blogs = $em->getRepository('RavtovichBlogBundle:Post')
            ->getLatestBlogs();

        return $this->render('RavtovichBlogBundle:Page:index.html.twig', array(
            'blogs' => $blogs
        ));
    }
    public function aboutAction()
    {
        return $this->render('RavtovichBlogBundle:Page:about.html.twig');
    }
    public function contactAction(Request $request)
    {
        $enquiry = new Enquiry();
        $form = $this->createForm(EnquiryType::class, $enquiry);
        if ($request->isMethod($request::METHOD_POST)) {
            $form->handleRequest($request);
            if ($form->isValid()) {
                $message = \Swift_Message::newInstance()
                    ->setSubject('Contact enquiry from symblog')
                    ->setFrom('enquiries@symblog.co.uk')
                    ->setTo('ravtovich_blog.emails.contact_email')
                    ->setBody($this->renderView('RavtovichBlogBundle:Page:contactEmail.txt.twig', array('enquiry' => $enquiry)));
                $this->get('mailer')->send($message);
                $this->get('session')->getFlashBag()->add('blogger-notice', 'Your contact enquiry was successfully sent. Thank you!');
                return $this->redirect($this->generateUrl('ravtovich_blog_contact'));
            }
        }
        return $this->render('RavtovichBlogBundle:Page:contact.html.twig', array(
            'form' => $form->createView()
        ));
    }
    public function sidebarAction()
    {
        $em = $this->getDoctrine()
            ->getManager();

        $tags = $em->getRepository('RavtovichBlogBundle:Blog')
            ->getTags();

        $tagWeights = $em->getRepository('RavtovichBlogBundle:Blog')
            ->getTagWeights($tags);

        return $this->render('RavtovichBlogBundle:Page:sidebar.html.twig', array(
            'tags' => $tagWeights
        ));
    }
}
