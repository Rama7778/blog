<?php

namespace Ravtovich\BlogBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Ravtovich\BlogBundle\Entity\Enquiry;
use Ravtovich\BlogBundle\Form\EnquiryType;

class PostController extends Controller
{
    public function indexAction()
    {
        return $this->render('RavtovichBlogBundle:Page:index.html.twig');
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
                // Perform some action, such as sending an email

                // Redirect - This is important to prevent users re-posting
                // the form if they refresh the page
                return $this->redirect($this->generateUrl('ravtovich_blog_contact'));
            }
        }
        return $this->render('RavtovichBlogBundle:Page:contact.html.twig', array(
            'form' => $form->createView()
        ));
    }
}
