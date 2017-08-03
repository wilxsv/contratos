<?php

namespace Minsal\ContratoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Minsal\ModeloBundle\Entity\MtnProductoContrato;
use Minsal\ModeloBundle\Entity\CtlIncremento;
use Minsal\ModeloBundle\Entity\CtlContratosIncrementos;
use Minsal\ModeloBundle\Entity\CtlContrato;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/*
	 * Direccion Fisica: src/Minsal/ContratoBundle/Controller/AnalizadorController.php

*/

class AnalizadorController extends Controller
{	
	/*
		* funcion para el renderizado de la dashboard del analisis, recibe como parametro
		el codigo de licitacion
	*/
	// public function dashboardAction($incremento,$contrato)
	// {
	// 	/* parte del analizador presupuestario*/
	// 	$em = $this->getDoctrine()->getManager();
	// 	$productocontrato = $em->getRepository('MinsalModeloBundle:MtnProductoContrato')->findBy(array(
	// 			'mtnContrato' => $contrato
	// 		));
	// 	$incre = $em->getRepository('MinsalModeloBundle:CtlIncremento')->findOneBy(array(
	// 			'id' => $incremento
	// 		));
	// 	$contrat = $em->getRepository('MinsalModeloBundle:CtlContrato')->findOneBy(array(
	// 			'idContrato' => $contrato
	// 		));
	// 	/*aqui se obtiene la cantidad incrementada actualmente por contrato*/
	// 	$qb = $em->createQueryBuilder();
	// 	$qb ->select('SUM(e.montoIncrementar)');
	// 	$qb->from('MinsalModeloBundle:CtlContratosIncrementos','e');
	// 	$qb->where('e.idContrato = :contrato');
	// 	$qb->setParameter('contrato',$contrato);
	// 	$count = $qb->getQuery()->getSingleScalarResult();
		

		public function listadoAction($incremento)
		{
			$em = $this->getDoctrine()->getManager();
			$dql = "SELECT DISTINCT mc.id,mc.numeroModalidad,c.idContratoSibasi,c.numeroContrato,pr.codigoProveedor,pr.nombreProveedor,p.codigoProducto,p.nombreProducto,c.montoContrato,pc.cantidad,pc.precioUnitario FROM MinsalModeloBundle:CtlProducto p
				INNER JOIN MinsalModeloBundle:MtnProductoContrato pc WITH p.idProductoSibasi=pc.mtnProducto 
				INNER JOIN MinsalModeloBundle:CtlContrato c WITH pc.mtnContrato = c.idContratoSibasi INNER JOIN MinsalModeloBundle:CtlProveedor pr WITH pr.idProveedorSibasi = pc.mtnProveedor INNER JOIN MinsalModeloBundle:CtlModalidadCompra mc WITH mc.id=c.numeroModalidadCompra WHERE mc.id = $incremento AND pr.estadoProveedor=4 ORDER BY c.numeroContrato";
				$listado = $em->createQuery($dql)->getResult();
				return $this->render('MinsalPlantillaBundle:Analizador:contratos.html.twig',array(
	     	'listado'=>$listado
	     	));
		}

}





