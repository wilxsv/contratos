<?php

namespace Minsal\ContratoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\DependencyInjection\ContainerInterface; 
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response; 
use Minsal\ModeloBundle\Entity\CtlProveedor;
use \Twig_Extension;
use Doctrine\ORM\Query\ResultSetMapping;

class UaciController extends Controller
{

	public function uaciInicioAction()
	{
		$em = $this->getDoctrine()->getManager();


		$incrementos = $em->getRepository('MinsalModeloBundle:CtlIncremento')->findAll();
		$prorrogas = $em->getRepository('MinsalModeloBundle:CtlProrroga')->findAll();
		return $this->render('MinsalPlantillaBundle:Uaci:inicio.html.twig', array(
			'incrementos'=>$incrementos,
			'prorrogas'=>$prorrogas
			));
	}


	public function proveedorUaciAction($cod, $tipo)
	{
		
		$em = $this->getDoctrine()->getManager();

		$dql = "SELECT co.numeroContrato, p.nombreProveedor, p.id
		    	FROM MinsalModeloBundle:CtlModalidadCompra c
		        INNER JOIN MinsalModeloBundle:CtlContrato co WITH c.id = co.numeroModalidadCompra
		        INNER JOIN MinsalModeloBundle:CtlProveedor p WITH co.contratoProveedor = p.id
		    	WHERE c.id = $cod ";

		$proveedores = $em->createQuery( $dql )->getResult();

		return $this->render('MinsalPlantillaBundle:Uaci:manejo_proveedores_uaci.html.twig', array(
			'proveedores'=>$proveedores,
			'modalidad'=>$cod,
			'tipo'=>$tipo
		));

			
	}

	public function cambiarEstadoAction(Request $request)
	{
		//Obtenemos el listado de objetos
		$parametros = $request->get('listado');
		$idCompra = $request->get('compra');

		//Capturamos el tipo de proceso a guardar
		$proceso = $request->get('proceso');

		//recorremos esos parametros
		foreach ($parametros as $proveedor) {
			$em = $this->getDoctrine()->getManager(); //Invocamos el manejador de entidades
			$obj = $em->getRepository('MinsalModeloBundle:CtlProveedor')->find($proveedor['proveedor']);//Buscamos por ID
			$obj->setEstadoProveedor($proveedor['estado']); //Se establece el estado alos proveedores
			$em->persist($obj); //Se persisten los datos
        	$em->flush($obj); //Se guardan los datos
		}
		if ($proceso == 'incremento'){
			$estadoIncremento = 2;
			$em = $this->getDoctrine()->getManager();
			$qb = $em->createQueryBuilder();
			$q = $qb->update('MinsalModeloBundle:CtlIncremento', 'i')
        	->set('i.estadoIncremento', $qb->expr()->literal($estadoIncremento))
        	->where('i.incrementoModalidadCompra = ?1')
        	->setParameter(1, $idCompra)
        	->getQuery();
			$p = $q->execute();
		}
		else{
			$estadoProrroga = 7;
			$em = $this->getDoctrine()->getManager();
			$qb = $em->createQueryBuilder();
			$q = $qb->update('MinsalModeloBundle:CtlProrroga', 'i')
        	->set('i.estadoProrroga', $qb->expr()->literal($estadoProrroga))
        	->where('i.prorrogaModalidadCompra = ?1')
        	->setParameter(1, $idCompra)
        	->getQuery();
			$p = $q->execute();
		}
			
        	
		return  new Response('Datos Ingresados correctamente'); //se devuelve la respuesta del proceso
	}

	//Pantalla adicional del Lic Martin
	public function detallesObservacionAction()
	{
		return $this->render('MinsalPlantillaBundle:Uaci:uaci_detalles.html.twig');
	}

}
