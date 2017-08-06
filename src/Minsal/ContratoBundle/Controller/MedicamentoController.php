<?php

namespace Minsal\ContratoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Minsal\ModeloBundle\Entity\MtnMedicamentoIncremento;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;




class MedicamentoController extends Controller
{
	public function depuracionAction($incremento,$contrato,$proveedor)
	{	
		$em = $this->getDoctrine()->getManager();
		$re = $em->getRepository('MinsalModeloBundle:MtnMedicamentoIncremento')->findOneBy(array(
			'incrementoid'=>$incremento,'contratoid'=>$contrato
			));
		if (is_null($re)) {
			$resumen = new MtnMedicamentoIncremento();
	    	$resumen->setIncrementoId($incremento);
	    	$resumen->setContratoId($contrato);
/*
			$increment = $em->getRepository('MinsalModeloBundle:CtlIncremento')->findOneBy(array(
			'id'=>$incremento
				));*/
			$programacion= $incremento;
			
			$service_url = "http://192.168.1.4:8080/v1/sinab/medicamentosestimacion?tocken=eccbc87e4b5ce2fe28308fd9f2a7baf3&programacion={$programacion}&contrato={$contrato}&proveedor={$proveedor}";
		    $curl = curl_init($service_url);
		    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		    $curl_response = curl_exec($curl);
		    curl_close($curl);
		   
		    $resumen->setMedicamentos($curl_response);
		    $em->persist($resumen);
		    $em->flush($resumen);

		    //ahora renderizare los medicamentos que estan en el json guardado desde la bd

		    $respuesta = json_decode($resumen->getMedicamentos(),true);
		    $medicamentos = array();
		    foreach ($respuesta['respuesta'] as $obj) {
		    	$medica = $em->getRepository('MinsalModeloBundle:CtlProducto')->findOneBy(array(
		    			'idProductoSibasi' => $obj["1"]
		    		));
		    	array_push($medicamentos, $medica);
		    }



		    return $this->render('MinsalPlantillaBundle:Producto:depuracion.html.twig',array(
		    	'medicamentos' => $medicamentos, 'incremento' =>$service_url,
		    	));
		}else{
			$respuesta = json_decode($re->getMedicamentos(),true);
		    $medicamentos = array();
		    foreach ($respuesta['respuesta'] as $obj) {
		    	$medica = $em->getRepository('MinsalModeloBundle:CtlProducto')->findOneBy(array(
		    			'idProductoSibasi' => $obj["1"]
		    		));
		    	array_push($medicamentos, $medica);
		    }
		    
		    return $this->render('MinsalPlantillaBundle:Producto:depuracion.html.twig',array(
		    	'medicamentos' => $medicamentos
		    	));
		}
		 
	   

		
	}
	public function listadoAction($incremento)
	{	
		$em = $this->getDoctrine()->getManager();
	    $contratos = $em->getRepository('MinsalModeloBundle:CtlContrato')->findByNumeroModalidadCompra($incremento);

	    $incrementos = $em->getRepository('MinsalModeloBundle:CtlIncremento')->findOneBy(
	    	array(
	    		'incrementoModalidadCompra'=>$incremento
	    		)
	    	);

	   
	    return $this->render('MinsalPlantillaBundle:Unabast:contratos.html.twig',array(
	    	'contratos' => $contratos,
	    	'incremento' => $incrementos
	    	));
	}

	public function listadoParaProrrogaAction($prorroga)
	{
		$em = $this->getDoctrine()->getManager();

		$contratos = $em->getRepository('MinsalModeloBundle:CtlContrato')->findByNumeroModalidadCompra($prorroga);
		$prorrogas = $em->getRepository('MinsalModeloBundle:CtlProrroga')->findOneBy(array(
			'prorrogaModalidadCompra'=>$prorroga

			));

		return $this->render('MinsalPlantillaBundle:Unabast:contratosProrrogas.html.twig', array(
			'contratos'=>$contratos,
			'prorrogas'=>$prorrogas
			));
	}

	public function cambioEstadoAction(Request $request)
	{
		//Obtenemos el listado de objetos
		$estado = $request->get('estado');
		$idCompra = $request->get('incrementoID');

		$em = $this->getDoctrine()->getManager();
		$qb = $em->createQueryBuilder();

		$q = $qb->update('MinsalModeloBundle:CtlIncremento', 'i')
    	->set('i.estadoIncremento', $qb->expr()->literal($estado))
    	->where('i.id = ?1')
    	->setParameter(1, $idCompra)
    	->getQuery();
		$p = $q->execute();
		return  new Response('Tarea Realizada existosamente'); 
	}



	public function estadoMedicamentosAction(Request $request){

		$listaMedicamentos = $request->get('listaMedicamentos');

		foreach ($listaMedicamentos as $medicamento) {
			$em = $this->getDoctrine()->getManager(); 
			$obj = $em->getRepository('MinsalModeloBundle:CtlProducto')->find($medicamento['medicamento']);
			//Buscamos por ID

			$obj->setEstadoProducto($medicamento['estado']); //con esto establecemos el estado a los productos (medicamentos de nuesta base local)

			$em->persist($obj);
			$em->flush($obj);
		
		}

		return new Response('Productos Actualizados exitosamente');


	}
}
