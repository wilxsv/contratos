<?php

namespace Minsal\UsuarioBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('MinsalUsuarioBundle:Default:index.html.twig');
    }
}
