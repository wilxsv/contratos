<?php

namespace Minsal\ContratoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use Doctrine\ORM\Query\ResultSetMapping;


class AnalizadorIncrementoController extends Controller
{


	public function listadoAction($incremento){
		$api = $this->container->getParameter('api_dominio');
		$token = $this->container->getParameter('api_token');
		$em = $this->getDoctrine()->getManager();

		//obtenemos el objeto incremento y de el sacamos la compra

		$incrementoObj = $em->getRepository('MinsalModeloBundle:CtlIncremento')->findOneBy(array(
			'id'=>$incremento
			));
		$compra = $incrementoObj->getNumeroModalidadCompra()->getId();
		//se obtiene el JSON O ARRAY CON LOS MEDICAMENTOS DEPURADOS
		$dql = "SELECT mi.medicamentos FROM MinsalModeloBundle:CtlIncremento i INNER JOIN MinsalModeloBundle:MtnMedicamentoIncremento mi WITH i.id=mi.incrementoid WHERE i.id=$incremento";

		$listado = $em->createQuery($dql)->getResult();

		$listadounido = '';
		foreach ($listado as $lista) {
			$listadounido .=$lista["medicamentos"];
		}
		$listadounido = str_replace('[','', $listadounido);
		$listadounido = str_replace(']','', $listadounido);
		$listadounido = str_replace('"','', $listadounido);

		$dql2 = "SELECT mc.id, mc.numeroModalidad, c.id as contrato, c.numeroContrato, p.codigoProducto, p.declargo, c.montoContrato, pc.cantidad, pc.precioUnitario, p.id,pr.nombreProveedor,pc.renglon,p.id as idproducto,pr.id as idproveedor
			    	FROM MinsalModeloBundle:CtlProducto p
					INNER JOIN MinsalModeloBundle:MtnProductoContrato pc WITH pc.mtnProducto = p.id
					INNER JOIN MinsalModeloBundle:CtlContrato c WITH  pc.mtnContrato = c.id
					INNER JOIN MinsalModeloBundle:CtlProveedor pr WITH pc.mtnProveedor = pr.id
					INNER JOIN MinsalModeloBundle:CtlModalidadCompra mc WITH c.numeroModalidad = mc.id
					WHERE p.estadoProducto=9 AND p.id IN ($listadounido) AND mc.id = $compra AND pr.estadoProveedor=4
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

		$service_url = "{$api}/v1/sinab/datoscobertura?tocken={$token}&idproductos={$listadepunido}&programacion={$estimacion}";

		$curl = curl_init($service_url);
      	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
      	$curl_response = curl_exec($curl);
      	curl_close($curl);
      	$respuesta = json_decode($curl_response,true);
      	$service_url2 = "{$api}/v1/sinab/existencianacional?tocken={$token}&productos={$listadepunido}&fecha={$nuevafecha}";
	    $curl2 = curl_init($service_url2);
	    curl_setopt($curl2, CURLOPT_RETURNTRANSFER, true);
	    $curl_response2 = curl_exec($curl2);
	    curl_close($curl2);
	    $respuesta2 = json_decode($curl_response2,true);

	    if (! is_null($respuesta['respuesta'])) {
	    	foreach ($respuesta['respuesta'] as $med ) {
	    		if (! is_null($respuesta2['respuesta'])) {
	    			foreach ($respuesta2['respuesta'] as $exis) {
			      		array_push($med, $exis["0"]);
			      		array_push($dataCobertura, $med);
			      		}
	    		}
	    		else{
	    			array_push($med, 0);
			      		array_push($dataCobertura, $med);
	    		}


			}
	    }

	    $listadoEstab = $em->getRepository('MinsalModeloBundle:CtlEstablecimiento')->findAll();

		return $this->render('MinsalPlantillaBundle:Analizador:contratos.html.twig',array(
     		'listado'=>$medicamentoslista,
     		'dataCobertura'=>$dataCobertura,
     		'incremento'=>$incrementoObj,
     		'establecimientos'=>$listadoEstab,
     		'debug'=>$medicamentoslista
     	));


	}


	public function grabarIncrementoAction(Request $request)
	{
            $id_incremento = $request->get('id_incremento');
            $numero_compra = $request->get('numero_compra');
            $id_contrato = $request->get('id_contrato');
            $id_proveedor = $request->get('id_proveedor');
            $id_producto = $request->get('id_producto');
            $cantidad_incrementada = $request->get('cantidad_incrementada');
            $precio_unitario = $request->get('precio_unitario');
            $monto_incrementado = $request->get('monto_incrementado');
            $renglon = $request->get('renglon');
            $establecimiento = $request->get('establecimiento');
            $em = $this->getDoctrine()->getManager();

            $rsm = new ResultSetMapping();
          	$query = $em->createNativeQuery('INSERT INTO ctl_analisis_incremento(
            id_incremento, numero_compra, id_contrato, id_proveedor,
            id_producto, cantidad_incrementada, precio_unitario, monto_incrementado,
            renglon, establecimiento)
    VALUES (?, ?, ?, ?,
            ?, ?, ?, ?,
            ?, ?);', $rsm);
          	$query->setParameter(1,intval($id_incremento));
	        $query->setParameter(2,intval($numero_compra));
	        $query->setParameter(3,intval($id_contrato));
	        $query->setParameter(4,intval($id_proveedor));
	        $query->setParameter(5,intval($id_producto));
	        $query->setParameter(6,intval($cantidad_incrementada));
	        $query->setParameter(7,floatval($precio_unitario));
	        $query->setParameter(8,floatval($monto_incrementado));
	        $query->setParameter(9,intval($renglon));
	        $query->setParameter(10,intval($establecimiento));
	        $query->getResult();

	        return new Response('analisis guardado');


	}
}
