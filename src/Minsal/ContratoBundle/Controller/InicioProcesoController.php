<?php

namespace Minsal\ContratoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class InicioProcesoController extends Controller
{
	public function inicioAction()
	{
		return $this->render('MinsalPlantillaBundle:InicioProceso:inicio.html.twig');
	}
}
