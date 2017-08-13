<?php

namespace Minsal\ContratoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class AnalizadorIncrementoController extends Controller
{
	public function listadoAction($incremento){
		$em = $this->getDoctrine()->getManager();

		//obtenemos el objeto incremento y de el sacamos la compra

		$incrementoObj = $em->getRepository('MinsalModeloBundle:CtlIncremento')->findOneBy(array(
			'id'=>$incremento
			));
		$compra = $incrementoObj->getNumeroModalidadCompra()->getId();
		//se obtiene el JSON O ARRAY CON LOS MEDICAMENTOS DEPURADOS
		$dql = "SELECT mi.medicamentos FROM MinsalModeloBundle:CtlIncremento i INNER JOIN MinsalModeloBundle:MtnMedicamentoIncremento mi WITH i.id=mi.incrementoid WHERE i.id=$incremento";

		$listado = $em->createQuery($dql)->getResult();
		
		$listadounido = array();
		foreach ($listado as $lista) {
			$listadounido = array_merge($listadounido,$lista);
		}
		$listadounido = str_replace('[','', $listadounido);
		$listadounido = str_replace(']','', $listadounido);
		$listadounido = str_replace('"','', $listadounido);
		$ids = $listadounido["medicamentos"];

		$dql2 = "SELECT mc.id, mc.numeroModalidad, c.id as contrato, c.numeroContrato, p.codigoProducto, p.nombreProducto, c.montoContrato, pc.cantidad, pc.precioUnitario, p.id,pr.nombreProveedor
			    	FROM MinsalModeloBundle:CtlProducto p 
					INNER JOIN MinsalModeloBundle:MtnProductoContrato pc WITH pc.mtnProducto = p.id  
					INNER JOIN MinsalModeloBundle:CtlContrato c WITH  pc.mtnContrato = c.id 
					INNER JOIN MinsalModeloBundle:CtlProveedor pr WITH pc.mtnProveedor = pr.id
					INNER JOIN MinsalModeloBundle:CtlModalidadCompra mc WITH c.numeroModalidad = mc.id 
					WHERE p.estadoProducto=8 AND p.id IN ($ids) AND mc.id = $compra
					ORDER BY c.id ";
		$medicamentoslista = $em->createQuery($dql2)->getResult();
		$listadep = array();
		foreach ($medicamentoslista as $m) {
 			array_push($listadep, $m["id"]);
		}
		$listadepunido = implode(",", $listadep);
		
		
		/* ahora es el analisis de cobertura */
		$dataCobertura = array();
		$estimacion = $incrementoObj->getEstimacion()->getId();
		$mesesdesestimar = $incrementoObj->getMesesDesestimar();
		$mesesdesestimar = $mesesdesestimar+3;
		$fecha = date('Y-m-d');
		$nuevafecha = strtotime ( "+$mesesdesestimar month" , strtotime ( $fecha ) ) ;
		$nuevafecha = date ( 'Y-m-d' , $nuevafecha );

		$service_url = "http://192.168.1.14:8080/v1/sinab/datoscobertura?tocken=eccbc87e4b5ce2fe28308fd9f2a7baf3&idproductos={$listadepunido}&programacion={$estimacion}";

		$curl = curl_init($service_url);
      	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
      	$curl_response = curl_exec($curl);
      	curl_close($curl);
      	$respuesta = json_decode($curl_response,true);
  //     	$service_url2 = "http://192.168.1.14:8080/v1/sinab/existencianacional?tocken=eccbc87e4b5ce2fe28308fd9f2a7baf3&productos={$listadep}&fecha={$nuevafecha}";
	 //    $curl2 = curl_init($service_url2);
	 //    curl_setopt($curl2, CURLOPT_RETURNTRANSFER, true);
	 //    $curl_response2 = curl_exec($curl2);
	 //    curl_close($curl2);
	 //    $respuesta2 = json_decode($curl_response2,true);

	 //    if (! is_null($respuesta['respuesta'])) {
	 //    	foreach ($respuesta['respuesta'] as $med ) {
	 //    		if (! is_null($respuesta2['respuesta'])) {
	 //    			foreach ($respuesta2['respuesta'] as $exis) {
		// 	      		array_push($med, $exis["0"]);
		// 	      		array_push($dataCobertura, $med);
		// 	      		}
	 //    		}
	 //    		else{
	 //    			array_push($med, 0);
		// 	      		array_push($dataCobertura, $med);
	 //    		}
			      	
			      	
		// 	}
	 //    }
	    

		return $this->render('MinsalPlantillaBundle:Analizador:contratos.html.twig',array(
     		'listado'=>$service_url,
     		'dataCobertura'=>$dataCobertura,
     		'incrementoID'=>$incremento
     	));

		
	}
}
