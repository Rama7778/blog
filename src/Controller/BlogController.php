<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


//use Ravtovich\BlogBundle\Entity\Enquiry;
//use Ravtovich\BlogBundle\Form\EnquiryType;

class BlogController extends AbstractController
{
    public function indexAction()
    {
        $em = $this->getDoctrine()
            ->getManager();

//        $post = $em->getRepository('Post')
//            ->getLatestBlogs()
        ;

        $posts = 'sdsdsdsdsdsd';
        return $this->render('Blog/index.html.twig', array(
            'posts' => $posts
        ));
    }
//    public function aboutAction()
//    {
//        return $this->render('RavtovichBlogBundle:Page:about.html.twig');
//    }
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
