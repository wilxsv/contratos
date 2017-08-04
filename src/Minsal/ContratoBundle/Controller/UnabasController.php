<?php

namespace Minsal\ContratoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class UnabasController extends Controller
{
	public function medicamentosAction()
	{
		return $this->render('MinsalPlantillaBundle:Unabast:medicamentos.html.twig');
	}

	public function contratosAction()
	{
		return $this->render('MinsalPlantillaBundle:Unabast:contratos.html.twig');
	}

	public function mensajeriaAction(Request $request)
	{
		return new Response('Todo Maravilloso');
	}

	public function detalleNegociacionAction()
	{
		$em = $this->getDoctrine()->getManager();

		$dql = "SELECT a.id, a.idProveedor,a.nombreProveedor, a.numeroContrato, a.codigoProducto, a.nombreProducto, a.cantidadIncrementada, a.montoContratoIncrementado, a.observacion
		FROM MinsalModeloBundle:CtlAnalisisIncremento a
		WHERE a.estadoProducto = 9 ";

		$detalles = $em->createQuery( $dql )->getResult();

		return $this->render('MinsalPlantillaBundle:Unabast:resultado_negociacion.html.twig',array(
			'detalles'=>$detalles,
			));
	}
}
