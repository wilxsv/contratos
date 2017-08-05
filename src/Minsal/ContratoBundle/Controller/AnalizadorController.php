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
			$incrementoObj = $em->getRepository('MinsalModeloBundle:CtlIncremento')->findOneBy(array(
				'id'=>$incremento
				));
			$dql = "SELECT DISTINCT mc.id,mc.numeroModalidad,c.idContratoSibasi,c.numeroContrato,pr.codigoProveedor,pr.nombreProveedor,p.codigoProducto,p.nombreProducto,c.montoContrato,pc.cantidad,pc.precioUnitario,p.estadoProducto, p.idProductoSibasi
			    FROM MinsalModeloBundle:CtlProducto p
				INNER JOIN MinsalModeloBundle:MtnProductoContrato pc WITH p.idProductoSibasi=pc.mtnProducto 
				INNER JOIN MinsalModeloBundle:CtlContrato c WITH pc.mtnContrato = c.idContratoSibasi 
				INNER JOIN MinsalModeloBundle:CtlProveedor pr WITH pr.idProveedorSibasi = pc.mtnProveedor 
				INNER JOIN MinsalModeloBundle:CtlModalidadCompra mc WITH mc.id=c.numeroModalidadCompra WHERE mc.id = $incremento AND pr.estadoProveedor=4 AND p.estadoProducto=9
				ORDER BY c.numeroContrato";
				$listado = $em->createQuery($dql)->getResult();
				/* ahora es el analisis de cobertura */
				$dataCobertura = array();
				$estimacion = $incrementoObj->getEstimacion()->getId();
				$mesesdesestimar = $incrementoObj->getMesesDesestimar();
				$mesesdesestimar = $mesesdesestimar+3;
				$fecha = date('Y-m-d');
				$nuevafecha = strtotime ( "+$mesesdesestimar month" , strtotime ( $fecha ) ) ;
				$nuevafecha = date ( 'Y-m-d' , $nuevafecha );
				foreach ($listado as $medicamento){
					// $service_url = "http://192.168.1.13:8080/v1/sinab/datoscobertura?tocken=eccbc87e4b5ce2fe28308fd9f2a7baf3&idproducto={$medicamento["idProductoSibasi"]}&programacion={$estimacion}";
					// esta solo es para pruebas
					$service_url = "http://192.168.1.13:8080/v1/sinab/datoscobertura?tocken=eccbc87e4b5ce2fe28308fd9f2a7baf3&idproducto={$medicamento["idProductoSibasi"]}&programacion=1";
				      $curl = curl_init($service_url);
				      curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
				      $curl_response = curl_exec($curl);
				      curl_close($curl);
				      $respuesta = json_decode($curl_response,true);

				      $service_url2 = "http://192.168.1.13:8080/v1/sinab/existencianacional?tocken=eccbc87e4b5ce2fe28308fd9f2a7baf3&producto={$medicamento["idProductoSibasi"]}&fecha={$nuevafecha}";
				      $curl2 = curl_init($service_url2);
				      curl_setopt($curl2, CURLOPT_RETURNTRANSFER, true);
				      $curl_response2 = curl_exec($curl2);
				      curl_close($curl2);
				      $respuesta2 = json_decode($curl_response2,true);

				      foreach ($respuesta['respuesta'] as $med ) {
				      	foreach ($respuesta2['respuesta'] as $exis) {
				      		array_push($med, $exis["0"]);
				      		array_push($dataCobertura, $med);
				      	}
				      	
				      }
				}
				
				unset($dataCobertura["0"]);
				return $this->render('MinsalPlantillaBundle:Analizador:contratos.html.twig',array(
	     	'listado'=>$listado,'dataCobertura'=>$dataCobertura 
	     	));
		}

}





