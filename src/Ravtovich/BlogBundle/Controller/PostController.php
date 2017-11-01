<?php

namespace Ravtovich\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

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
    public function contactAction()
    {
        return $this->render('RavtovichBlogBundle:Page:contact.html.twig');
    }
}
