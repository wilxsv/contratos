<?php

namespace Minsal\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Minsal\ModeloBundle\Entity\CtlContrato;

use Symfony\Component\HttpFoundation\Response;

class RestController extends Controller
{
	public function sincronizarContratosAction(Request $request)
	{
                /*se obtienen los contratos*/
		
	$service_url = 'http://192.168.1.2:8080/v1/sinab/procesoscompras?tocken=eccbc87e4b5ce2fe28308fd9f2a7baf3';
        $curl = curl_init($service_url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $curl_response = curl_exec($curl);
        curl_close($curl);
        $respuesta = json_decode($curl_response,true);
        $em = $this->getDoctrine()->getManager();
        foreach ($respuesta['respuesta'] as $contrato ) {
        	$nuevoContrato = new CtlContratos();
        	$nuevoContrato->setNumeroContrato($contrato["0"]);
        	$nuevoContrato->setNumeroModalidadCompra($contrato["4"]);
        	$nuevoContrato->setMontoContrato($contrato["5"]);
        	$em->persist($nuevoContrato);
        	$em->flush($nuevoContrato);
        }     


        /*se renderizan los contratos*/
        $em = $this->getDoctrine()->getManager();
		$contratos= $em->getRepository('MinsalModeloBundle:CtlContratos')->findAll();
        return $this->render('MinsalPlantillaBundle:InicioProceso:inicio.html.twig', array(
			'contratos' => $contratos
			));
	}
}
