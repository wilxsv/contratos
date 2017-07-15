<?php

namespace Minsal\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('MinsalCoreBundle:Default:index.html.twig');
    }
}
