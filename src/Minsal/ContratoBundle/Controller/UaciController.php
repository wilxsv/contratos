<?php

namespace Minsal\ContratoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\DependencyInjection\ContainerInterface;  
use \Twig_Extension;

class UaciController extends Controller
{

	public function uaciInicioAction()
	{
	 	$em = $this->getDoctrine()->getManager();
        $incrementos = $em->getRepository('MinsalModeloBundle:ProcesoIncremento')->findAll();
		return $this->render('MinsalPlantillaBundle:Uaci:inicio.html.twig',array(
			'incrementos' => $incrementos
			));
	}


	public function proveedorUaciAction($id)
	{
		$em = $this->getDoctrine()->getManager();
		
		return $this->render('MinsalPlantillaBundle:Uaci:manejo_proveedores_uaci.html.twig', array(
			
			));
	}
}
