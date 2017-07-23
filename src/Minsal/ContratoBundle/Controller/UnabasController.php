<?php

namespace Minsal\ContratoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class UnabasController extends Controller
{
	public function medicamentosAction()
	{
		return $this->render('MinsalPlantillaBundle:Unabast:medicamentos.html.twig');
	}

	public function contratosAction()
	{
		return $this->render('MinsalPlantillaBundle:Unabast:contratos.html.twig');
	}
}
