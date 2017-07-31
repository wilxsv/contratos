<?php

namespace Minsal\ContratoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class UfiController extends Controller
{
	public function incrementosAction()
	{
		$em = $this->getDoctrine()->getManager();
		$incrementos = $em->getRepository('MinsalModeloBundle:CtlIncremento')->findAll();
    $prorrogas = $em->getRepository('MinsalModeloBundle:CtlProrroga')->findAll();
		return $this->render('MinsalPlantillaBundle:Ufi:incrementos.html.twig',array(
			'incrementos' => $incrementos,
      'prorrogas' => $prorrogas,
			));
	}

	public function cifradoAction()
	{
		return $this->render('MinsalPlantillaBundle:Ufi:cifrado.html.twig');
	}

	public function contratosIncrementoAction($incremento)
	{
		$em = $this->getDoctrine()->getManager();
	    $contratos = $em->getRepository('MinsalModeloBundle:CtlContrato')->findByNumeroModalidadCompra($incremento);

	    $incremento = $em->getRepository('MinsalModeloBundle:CtlIncremento')->findOneBy(
	    	array(
	    		'incrementoModalidadCompra'=>$incremento
	    		)
	    	);
		return $this->render('MinsalPlantillaBundle:Ufi:contratosincremento.html.twig',array(
			'contratos' => $contratos,
	    	'incremento' => $incremento
			));
	}

}
