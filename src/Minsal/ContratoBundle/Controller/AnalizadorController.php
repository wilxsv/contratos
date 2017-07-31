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
	public function dashboardAction($incremento,$contrato)
	{
		/* parte del analizador presupuestario*/
		$em = $this->getDoctrine()->getManager();
		$productocontrato = $em->getRepository('MinsalModeloBundle:MtnProductoContrato')->findBy(array(
				'mtnContrato' => $contrato
			));
		$incre = $em->getRepository('MinsalModeloBundle:CtlIncremento')->findOneBy(array(
				'id' => $incremento
			));
		$contrat = $em->getRepository('MinsalModeloBundle:CtlContrato')->findOneBy(array(
				'idContrato' => $contrato
			));
		/*aqui se obtiene la cantidad incrementada actualmente por contrato*/
		$qb = $em->createQueryBuilder();
		$qb ->select('SUM(e.montoIncrementar)');
		$qb->from('MinsalModeloBundle:CtlContratosIncrementos','e');
		$qb->where('e.idContrato = :contrato');
		$qb->setParameter('contrato',$contrato);
		$count = $qb->getQuery()->getSingleScalarResult();
		return $this->render('MinsalPlantillaBundle:Analizador:dashboard.html.twig', array(
			'productocontrato' => $productocontrato,'incre'=>$incre,'contrato'=>$contrat,
			'saldoIncrementado' => $count
			));
		/* analisis de criticidad*/
	}

	/*
		* funcion que renderiza los contratos a incrementar
	*/

	public function listadoAction($incremento)
	{	
		$em = $this->getDoctrine()->getManager();
	    $contratos = $em->getRepository('MinsalModeloBundle:CtlContrato')->findByNumeroModalidadCompra($incremento);

	    $incremento = $em->getRepository('MinsalModeloBundle:CtlIncremento')->findOneBy(
	    	array(
	    		'incrementoModalidadCompra'=>$incremento
	    		)
	    	);

	   
	    return $this->render('MinsalPlantillaBundle:Analizador:contratos.html.twig',array(
	    	'contratos' => $contratos,
	    	'incremento' => $incremento
	    	));
	}

	public function guardarIncrementoAction(Request $request)
	{
		$producto = $request->get('producto');
        $cantidad = $request->get('cantidad');
        $contrato = $request->get('contrato');
        $monto = $request->get('monto');
		$em = $this->getDoctrine()->getManager();
		$nuevoContrIncre = new CtlContratosIncrementos();
		$nuevoContrIncre->setIdProducto($producto)
		->setCantidadIncrementar($cantidad)
		->setIdContrato($contrato)
		->setMontoIncrementar($monto);
		 $em->persist($nuevoContrIncre);
        $em->flush($nuevoContrIncre);
        return new Response('exito');
	}

}
