<?php

namespace Minsal\ContratoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class InicioProcesoController extends Controller
{
	public function inicioAction()
	{	
		$codigosLicitaciones = array(
			'LP 02/2017',
			'LP 12/2017',
			'LP 43/2017',
			'LP 05/2017',
			);
		return $this->render('MinsalPlantillaBundle:InicioProceso:inicio.html.twig',array(
			'codigosLicitaciones' => $codigosLicitaciones
			));
	}
}
