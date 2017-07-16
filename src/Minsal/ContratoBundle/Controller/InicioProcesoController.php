<?php

namespace Minsal\ContratoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Minsal\ModeloBundle\Entity\ResumenIncremento;
use Symfony\Component\Validator\Constraints\DateTime;


class InicioProcesoController extends Controller
{
	public function inicioAction()
	{	
		$codigosLicitaciones = array(
			'LP 02/2017',
			'LP 12/2017',
			'LP 43/2017',
			'LP 05/2017',
			);
		$em = $this->getDoctrine()->getManager();
        $resumen = $em->getRepository('MinsalModeloBundle:ResumenIncremento')->findAll();

		return $this->render('MinsalPlantillaBundle:InicioProceso:inicio.html.twig',array(
			'codigosLicitaciones' => $codigosLicitaciones,
			'incrementos' => $resumen
			));
	}

	public function crearIncrementoAction(Request $request)
	{
		$codigoLicitacion = $request->get('cod');
		$Incremento = new ResumenIncremento();
		$Incremento->setCodigoCompra($codigoLicitacion);
		#aqui tiene que ir el jalado por las bases de datos
		
		$array = array(
			"0" => array(
					"num_contrato" =>"12/2017",
					"cod_proveedor"=>"prov123",
					"is_valid"=>1,
					"cod_medicamento"=> "ibu123",
					"medicamento_valid"=>0,
					"precioUnitario"=>12.23,
					"cantidad_comprada"=>12
				),
			"1" => array(
					"num_contrato" =>"12/2017",
					"cod_proveedor"=>"prov123",
					"is_valid"=>1,
					"cod_medicamento"=> "ibu123",
					"medicamento_valid"=>0,
					"precioUnitario"=>12.23,
					"cantidad_comprada"=>12
				)
			);
		$contratosJSON = json_encode($array);
		$Incremento->setContratos($contratosJSON);
		$em = $this->getDoctrine()->getManager();
		$estado = $em->getRepository('MinsalModeloBundle:Estado')->find(1);
		$Incremento->setEstado($estado);

		$Incremento->setFechaCreacion(new \DateTime("now"));
        $em->persist($Incremento);
        $em->flush();
        $em = $this->getDoctrine()->getManager();
       
		return new Response('Exito');
	}
	
}
