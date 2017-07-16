<?php

namespace Minsal\ContratoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class UaciController extends Controller
{

	public function uaciInicioAction()
	{
		
		return $this->render('MinsalPlantillaBundle:Uaci:inicio.html.twig');
	}


	public function proveedorUaciAction()
	{
		
		return $this->render('MinsalPlantillaBundle:Uaci:manejo_proveedores_uaci.html.twig');
	}
}
