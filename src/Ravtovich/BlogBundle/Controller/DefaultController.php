<?php

namespace Ravtovich\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('RavtovichBlogBundle:Default:index.html.twig');
    }
}
