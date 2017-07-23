<?php

namespace Minsal\ContratoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class UfiController extends Controller
{
	public function incrementosAction()
	{
		return $this->render('MinsalPlantillaBundle:Ufi:incrementos.html.twig');
	}

	public function cifradoAction()
	{
		return $this->render('MinsalPlantillaBundle:Ufi:cifrado.html.twig');
	}

	public function contratosIncrementoAction()
	{
		return $this->render('MinsalPlantillaBundle:Ufi:contratosincremento.html.twig');
	}

}
