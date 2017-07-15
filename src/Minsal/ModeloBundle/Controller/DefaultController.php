<?php

namespace Minsal\ModeloBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('MinsalModeloBundle:Default:index.html.twig');
    }
}
