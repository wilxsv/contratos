<?php

namespace Minsal\ContratoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('MinsalContratoBundle:Default:index.html.twig');
    }
}
