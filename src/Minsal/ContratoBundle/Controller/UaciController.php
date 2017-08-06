<?php

namespace Minsal\ContratoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\DependencyInjection\ContainerInterface; 
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response; 
use Minsal\ModeloBundle\Entity\CtlProveedor;
use \Twig_Extension;
use Doctrine\ORM\Query\ResultSetMapping;

class UaciController extends Controller
{

	public function uaciInicioAction()
	{
		$em = $this->getDoctrine()->getManager();


		$incrementos = $em->getRepository('MinsalModeloBundle:CtlIncremento')->findAll();
		$prorrogas = $em->getRepository('MinsalModeloBundle:CtlProrroga')->findAll();
		return $this->render('MinsalPlantillaBundle:Uaci:inicio.html.twig', array(
			'incrementos'=>$incrementos,
			'prorrogas'=>$prorrogas
			));
	}


	public function proveedorUaciAction($cod, $tipo)
	{
		/*SELECT DISTINCT PV.id_proveedor_sinab as id, PV.nit as nit, PV.nombre_proveedor as nombre, C.numero_contrato AS contrato 
		 FROM ctl_contrato AS C 
		 INNER JOIN mtn_producto_contrato AS PC ON PC.mtn_contrato = C.id_contrato_sinab 
		 INNER JOIN ctl_proveedor AS PV ON PV.id_proveedor_sinab = C.contrato_proveedor 
		 INNER JOIN ctl_modalidad_compra AS CM ON CM.id = C.numero_modalidad_compra  
		 INNER JOIN ctl_producto AS PR ON PR.id_producto_sibasi = PC.mtn_producto WHERE CM.id=?*/
		$em = $this->getDoctrine()->getManager();

		$dql = "SELECT DISTINCT c.id,pr.idProveedorSinab, pr.nit, pr.nombreProveedor, c.numeroContrato
		FROM MinsalModeloBundle:CtlContrato c
		INNER JOIN MinsalModeloBundle:MtnProductoContrato pc WITH c.idContratoSinab = pc.mtnContrato
		INNER JOIN MinsalModeloBundle:CtlProveedor pr WITH c.contratoProveedor = pr.idProveedorSinab
		INNER JOIN MinsalModeloBundle:CtlModalidadCompra mc WITH c.numeroModalidadCompra = mc.id
		INNER JOIN MinsalModeloBundle:CtlProducto p WITH pc.mtnProducto = p.idProductoSibasi
		WHERE mc.id = $cod AND pc.mtnProveedor=c.contratoProveedor ORDER BY c.numeroContrato ";

		

		$proveedores = $em->createQuery($dql)->getResult();

		

		return $this->render('MinsalPlantillaBundle:Uaci:manejo_proveedores_uaci.html.twig', array(
			'proveedores'=>$proveedores,
			'modalidad'=>$cod,
			'tipo'=>$tipo
		));
			
	}

	public function cambiarEstadoAction(Request $request)
	{
		//Obtenemos el listado de objetos
		$parametros = $request->get('listado');
		$idCompra = $request->get('compra');

		//Capturamos el tipo de proceso a guardar
		$proceso = $request->get('proceso');

		//recorremos esos parametros
		foreach ($parametros as $proveedor) {
			$estado = $proveedor['estado'];
			$idSinab = $proveedor['proveedor']; 
			$em = $this->getDoctrine()->getManager(); //Invocamos el manejador de entidades
			
		$dql = "UPDATE MinsalModeloBundle:CtlProveedor p SET p.estadoProveedor = $estado WHERE p.idProveedorSinab = $idSinab ";
		$em->createQuery( $dql )->getResult();
			
		}
		if ($proceso == 'incremento'){
			$estadoIncremento = 2;
			$em = $this->getDoctrine()->getManager();
			$qb = $em->createQueryBuilder();
			$q = $qb->update('MinsalModeloBundle:CtlIncremento', 'i')
        	->set('i.estadoIncremento', $qb->expr()->literal($estadoIncremento))
        	->where('i.incrementoModalidadCompra = ?1')
        	->setParameter(1, $idCompra)
        	->getQuery();
			$p = $q->execute();
		}
		else{
			$estadoProrroga = 7;
			$em = $this->getDoctrine()->getManager();
			$qb = $em->createQueryBuilder();
			$q = $qb->update('MinsalModeloBundle:CtlProrroga', 'i')
        	->set('i.estadoProrroga', $qb->expr()->literal($estadoProrroga))
        	->where('i.prorrogaModalidadCompra = ?1')
        	->setParameter(1, $idCompra)
        	->getQuery();
			$p = $q->execute();
		}
			
        	
		return  new Response('Datos Ingresados correctamente'); //se devuelve la respuesta del proceso
	}

	//Pantalla adicional del Lic Martin
	public function detallesObservacionAction()
	{
		$em = $this->getDoctrine()->getManager();

		$dql = "SELECT a.id, a.idProveedor,a.nombreProveedor, a.numeroContrato, a.codigoProducto, a.nombreProducto, a.cantidadIncrementada, a.montoContratoIncrementado
		FROM MinsalModeloBundle:CtlAnalisisIncremento a";

		$detalles = $em->createQuery( $dql )->getResult();

		/*select contrato.numero_contrato, productos.codigo_producto, nombre_producto, incremento.cantidad_incrementar, incremento.monto_incrementar 
		from ctl_contratos_incrementos as incremento
		inner join ctl_contrato as contrato on incremento.id_contrato = contrato.id_contrato
		inner join ctl_producto as productos on incremento.id_producto = productos.id
		order by codigo_producto*/


		/*select proveedor.codigo_proveedor, proveedor.nombre_proveedor, contrato.numero_contrato, producto.codigo_producto, producto.nombre_producto, sum(cantidad_incrementar), sum(monto_incrementar)
		from ctl_contratos_incrementos as incremento
		inner join ctl_contrato as contrato on incremento.id_contrato = contrato.id_contrato
		inner join ctl_producto as producto on incremento.id_producto = producto.id
		inner join ctl_proveedor as proveedor on contrato.contrato_proveedor = proveedor.id

		group by proveedor.codigo_proveedor, proveedor.nombre_proveedor, producto.codigo_producto, producto.nombre_producto, contrato.numero_contrato
		order by proveedor.codigo_proveedor desc*/

		return $this->render('MinsalPlantillaBundle:Uaci:uaci_detalles.html.twig', array(
			'detalles' => $detalles,

			));
	}

	public function agregarObservacionAction(Request $request)
	{
		//Obtenemos los valores de interes
		$id = $request->get('id');
		$observacion = $request->get('observacion');
		//Se invoca al manejador de entidades
		$em = $this->getDoctrine()->getManager();
		//definimos el QueryBuilder
		$qb = $em->createQueryBuilder();
		//Realizacion de la Query
		$q = $qb->update('MinsalModeloBundle:CtlAnalisisIncremento', 'a')
        	 ->set('a.observacion', $qb->expr()->literal($observacion))
        	 ->where('a.id = ?1')
        	 ->setParameter(1, $id)
        	 ->getQuery();
        	 $p = $q->execute();
	  
	  	return new Response('Observacion agregada exitosamente');
	}

	public function estadoNegociacionAction(Request $request)
	{
		$listaproductos = $request->get('listado');

		foreach ($listaproductos as $productos) {
			$em = $this->getDoctrine()->getManager(); //Invocamos el manejador de entidades
			$obj = $em->getRepository('MinsalModeloBundle:CtlAnalisisIncremento')->find($productos['producto']);//Buscamos por ID
			$obj->setEstadoProducto($productos['estado']); //Se establece el estado alos producto negociados
			$em->persist($obj); //Se persisten los datos
        	$em->flush($obj); //Se guardan los datos
		}
		return new Response('Accion realizada correctamente');
	}

}
