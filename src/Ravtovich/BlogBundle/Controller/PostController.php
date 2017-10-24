<?php

namespace Ravtovich\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PostController extends Controller
{
    public function indexAction()
    {
        return $this->render('RavtovichBlogBundle:Page:index.html.twig');
    }
}
