<?php

namespace Minsal\ContratoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/*
	 * Direccion Fisica: src/Minsal/ContratoBundle/Controller/AnalizadorController.php

*/

class AnalizadorController extends Controller
{	
	/*
		* funcion para el renderizado de la dashboard del analisis, recibe como parametro
		el codigo de licitacion
	*/
	public function dashboardAction($incremento,$contrato)
	{
		$em = $this->getDoctrine()->getManager();

		return $this->render('MinsalPlantillaBundle:Analizador:dashboard.html.twig', array(
			));
	}

	/*
		* funcion que renderiza los contratos a incrementar
	*/

	public function listadoAction($incremento)
	{	
		$em = $this->getDoctrine()->getManager();
	    $contratos = $em->getRepository('MinsalModeloBundle:CtlContrato')->findByNumeroModalidadCompra($incremento);

	    $incremento = $em->getRepository('MinsalModeloBundle:CtlIncremento')->findOneBy(
	    	array(
	    		'incrementoModalidadCompra'=>$incremento
	    		)
	    	);

	   
	    return $this->render('MinsalPlantillaBundle:Analizador:contratos.html.twig',array(
	    	'contratos' => $contratos,
	    	'incremento' => $incremento
	    	));
	}

}
