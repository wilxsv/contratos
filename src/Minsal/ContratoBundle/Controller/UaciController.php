<?php

namespace Minsal\ContratoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\DependencyInjection\ContainerInterface;  
use \Twig_Extension;
use Doctrine\ORM\Query\ResultSetMapping;

class UaciController extends Controller
{

	public function uaciInicioAction()
	{
		$em = $this->getDoctrine()->getManager();


		$procesos = $em->getRepository('MinsalModeloBundle:CtlIncremento')->findAll();
		return $this->render('MinsalPlantillaBundle:Uaci:inicio.html.twig', array(
			'procesos'=>$procesos,
			));
	}


	public function proveedorUaciAction($cod)
	{
		
		$em = $this->getDoctrine()->getManager();

		$dql = "SELECT co.numeroContrato, p.nombreProveedor, p.id
		    	FROM MinsalModeloBundle:CtlModalidadCompra c
		        INNER JOIN MinsalModeloBundle:CtlContrato co WITH c.id = co.numeroModalidadCompra
		        INNER JOIN MinsalModeloBundle:CtlProveedor p WITH co.contratoProveedor = p.id
		    	WHERE c.numeroModalidad LIKE '$cod'";

		$proveedores = $em->createQuery( $dql )->getResult();

		return $this->render('MinsalPlantillaBundle:Uaci:manejo_proveedores_uaci.html.twig', array(
			'proveedores'=>$proveedores,
		));

			
	}
}
