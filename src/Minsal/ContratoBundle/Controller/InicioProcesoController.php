<?php

namespace Minsal\ContratoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Minsal\ModeloBundle\Entity\ProcesoIncremento;
use Symfony\Component\Validator\Constraints\DateTime;


class InicioProcesoController extends Controller
{
	public function inicioAction()
	{	

		$service_url = 'http://192.168.1.2:8080/v1/sinab/procesoscompras?tocken=eccbc87e4b5ce2fe28308fd9f2a7baf3';
        $curl = curl_init($service_url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $curl_response = curl_exec($curl);
        curl_close($curl);
        $respuesta = json_decode($curl_response,true);
		return $this->render('MinsalPlantillaBundle:InicioProceso:inicio.html.twig');
	}

	public function crearIncrementoAction(Request $request)
	{
		$codigoLicitacion = $request->get('cod');

		$em = $this->getDoctrine()->getManager();
		$licitacionID = $em->getRepository('MinsalModeloBundle:Licitacion')->findByCodigoLicitacion($codigoLicitacion);

		$Incremento = new ProcesoIncremento();
		$Incremento->setCodigoCompra($licitacionID[0]->getId());
		
		$estado = $em->getRepository('MinsalModeloBundle:EstadoProceso')->findById(1);
	
		/*$contratos = $em->getRepository('MinsalModeloBundle:Contrato')->findByLicitacion($licitacionID[0]->getId());
		$Incremento->setContratos($contratos);
*/
		$Incremento->setFechaCreacionAt(new \DateTime("now"));

		
        $em->persist($Incremento);
        $em->flush();
       
		return new Response('');
	}
	
}
