<?php

namespace Minsal\ContratoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\DependencyInjection\ContainerInterface;  
use \Twig_Extension;
use Doctrine\ORM\Query\ResultSetMapping;

class UaciController extends Controller
{

	public function uaciInicioAction()
	{
		$em = $this->getDoctrine()->getManager();


		$procesos = $em->getRepository('MinsalModeloBundle:CtlIncremento')->findAll();
		return $this->render('MinsalPlantillaBundle:Uaci:inicio.html.twig', array(
			'procesos'=>$procesos,
			));
	}


	public function proveedorUaciAction($cod)
	{

		/*$sql = "SELECT co.numero_contrato, p.nombre_proveedor FROM ctl_modalidad_compra AS c JOIN ctl_contrato AS co ON co.numero_modalidad_compra = c.id JOIN ctl_proveedor AS p ON co.contrato_proveedor=p.id WHERE c.numero_modalidad LIKE 'DR-CAFTA N° 03/2015'";

		$rsm = new ResultSetMapping();
		$rsm->addEntityResult('MinsalModeloBundle:CtlContrato', 'co');
		$rsm->addEntityResult('MinsalModeloBundle:CtlProveedor', 'p');
		$rsm->addFieldResult('co','numero_contrato','numeroContrato');
		$rsm->addFieldResult('p','nombre_proveedor','nombreProveedor');
		$nq = $this->getDoctrine()->getManager()->createNativeQuery($sql, $rsm);
		$proveedores = $nq->getResult();

		return $this->render('MinsalPlantillaBundle:Uaci:manejo_proveedores_uaci.html.twig', array(
			'proveedores'=>$proveedores,
			
			));*/

		$sql = "SELECT co.id_contrato,p.id,co.numero_contrato, p.nombre_proveedor FROM ctl_modalidad_compra AS c JOIN ctl_contrato AS co ON co.numero_modalidad_compra = c.id JOIN ctl_proveedor AS p ON co.contrato_proveedor=p.id WHERE c.numero_modalidad LIKE 'DR-CAFTA N° 03/2015'";
			$rsm = new ResultSetMapping;
			$rsm->addEntityResult('MinsalModeloBundle:CtlContrato', 'co');
			$rsm->addEntityResult('MinsalModeloBundle:CtlProveedor', 'p');
			$rsm->addEntityResult('MinsalModeloBundle:CtlModalidadCompra', 'c');
			$rsm->addFieldResult('co','numero_contrato','numeroContrato');
			$rsm->addFieldResult('co','id_contrato','idContrato');
			$rsm->addFieldResult('p','nombre_proveedor','nombreProveedor');
			$rsm->addFieldResult('p','id','id');

			$nq = $this->getDoctrine()->getManager()->createNativeQuery($sql, $rsm);
			$proveedores = $nq->getResult();

			return $this->render('MinsalPlantillaBundle:Uaci:manejo_proveedores_uaci.html.twig', array(
			'proveedores'=>$proveedores,
			
			));
	}
}
