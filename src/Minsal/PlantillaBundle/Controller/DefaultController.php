<?php

namespace Minsal\PlantillaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('MinsalPlantillaBundle:Default:index.html.twig');
    }
}
