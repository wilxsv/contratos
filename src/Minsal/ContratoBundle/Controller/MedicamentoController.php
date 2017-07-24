<?php

namespace Minsal\ContratoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Minsal\ModeloBundle\Entity\MtnMedicamentoIncremento;


class MedicamentoController extends Controller
{
	public function depuracionAction($incremento,$contrato)
	{	
		$em = $this->getDoctrine()->getManager();
		 $resumen = new MtnMedicamentoIncremento();
	    	$resumen->setIncrementoId($incremento);
	    	$resumen->setContratoId($contrato);
		$increment = $em->getRepository('MinsalModeloBundle:CtlIncremento')->find($incremento);
		$programacion= '';
		foreach ($increment as $i) {
			$programacion = $i->getEstimacion();
		}
		
		$service_url = 'http://192.168.1.2:8080/v1/sinab/medicamentosestimacion?tocken=eccbc87e4b5ce2fe28308fd9f2a7baf3&programacion='.$programacion.'&contrato='.$contrato;
	    $curl = curl_init($service_url);
	    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	    $curl_response = curl_exec($curl);
	    curl_close($curl);
	   
	    $resumen->setMedicamentos($curl_response);
	    
	    	
	    	
	    
	    $em->persist($resumen);
	    $em->flush($resumen);
	   
	    return $this->render('MinsalPlantillaBundle:Producto:depuracion.html.twig');
	}
	public function listadoAction($incremento)
	{	
		$em = $this->getDoctrine()->getManager();
	    $contratos = $em->getRepository('MinsalModeloBundle:CtlContrato')->findByNumeroModalidadCompra($incremento);

	    $incremento = $em->getRepository('MinsalModeloBundle:CtlIncremento')->findOneBy(
	    	array(
	    		'incrementoModalidadCompra'=>$incremento
	    		)
	    	);

	   
	    return $this->render('MinsalPlantillaBundle:Unabast:contratos.html.twig',array(
	    	'contratos' => $contratos,
	    	'incremento' => $incremento
	    	));
	}
}
