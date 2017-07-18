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
		$em = $this->getDoctrine()->getManager();
		$licitaciones = $em->getRepository('MinsalModeloBundle:Licitacion')->findAll();
		
		$em = $this->getDoctrine()->getManager();
        $resumen = $em->getRepository('MinsalModeloBundle:ProcesoIncremento')->findAll();

		return $this->render('MinsalPlantillaBundle:InicioProceso:inicio.html.twig',array(
			'codigosLicitaciones' => $licitaciones,
			'incrementos' => $resumen
			));
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
