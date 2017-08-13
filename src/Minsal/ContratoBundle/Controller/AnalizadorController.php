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
		
		//Funcion para el llamado de datos de las prorrogas
		public function analizadorProrrogaAction($prorroga)
		{
			/*
				$programacion = $_GET["programacion"];
	 			$licitacion = $_GET["licitacion"];
	 			$establecimiento = $_GET["establecimiento"];
	 			$proveedor = $_GET["proveedor"];
	 		*/

			$em = $this->getDoctrine()->getManager(); //Invocamos al manejador de Entidades
			$prorrogaObj = $em->getRepository('MinsalModeloBundle:CtlProrroga')->findOneBy(array(
				'id'=>$prorroga
				)); //Obtenemos el ID de la prorroga al que se analizara
			$compra = $prorrogaObj->getProrrogaModalidadCompra()->getId(); //Obtenemos el ID De la modalidad de la compra

			$licitacion = $prorrogaObj->getProrrogaModalidadCompra()->getNumeroModalidad(); //Obtenemos el codigo de licitacion a utilizar

			$dql = "SELECT mc.id, mc.numeroModalidad, c.id as contrato, c.numeroContrato, p.codigoProducto, p.nombreProducto, c.montoContrato, pc.cantidad, pc.precioUnitario, p.id, pr.nombreProveedor, IDENTITY (p.establecimientoProducto) AS establecimientoProductoP, pr.id AS idProveedor
			    	FROM MinsalModeloBundle:CtlProducto p 
					INNER JOIN MinsalModeloBundle:MtnProductoContrato pc WITH pc.mtnProducto = p.id  
					INNER JOIN MinsalModeloBundle:CtlContrato c WITH  pc.mtnContrato = c.id 
					INNER JOIN MinsalModeloBundle:CtlProveedor pr WITH pc.mtnProveedor = pr.id
					INNER JOIN MinsalModeloBundle:CtlModalidadCompra mc WITH c.numeroModalidad = mc.id 
					WHERE mc.id = $compra AND pr.estadoProveedor = 4 AND p.estadoProducto = 9
					ORDER BY c.numeroContrato ";
			$listado = $em->createQuery($dql)->getResult();


			$planificacion = $prorrogaObj->getPlanificacion()->getId(); //Obtenermos el ID de la programacion que se utilizara

			foreach ($listado as $medicamento) {
				$establecimiento = $medicamento['establecimientoProductoP'];
				$proveedor = $medicamento['idProveedor'];
				$service_url = "http://192.168.1.14:8080/v1/sinab/medicamentosplanificacionprorroga?tocken=eccbc87e4b5ce2fe28308fd9f2a7baf3&programacion=1&licitacion=06/2016&establecimiento=621&proveedor=5";

				$curl = curl_init($service_url);
			    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
			    $curl_response = curl_exec($curl);
			    curl_close($curl);
			    $respuesta = json_decode($curl_response,true);
			}

			return $this->render('MinsalPlantillaBundle:Analizador:prorroga.html.twig', array(
				'servicio'=>$service_url,
				'respuesta'=>$respuesta,
				
				));
		}

		//Funcion para cambiar el estado de los incrementos
		public function estadoIncrementoAAction(Request $request){

			$estado = $request->get('estado');
			$idIncremento = $request->get('id');

			$em = $this->getDoctrine()->getManager();
			$qb = $em->createQueryBuilder();

			$q = $qb->update('MinsalModeloBundle:CtlIncremento', 'i')
	    	->set('i.estadoIncremento', $qb->expr()->literal($estado))
	    	->where('i.id = ?1')
	    	->setParameter(1, $idIncremento)
	    	->getQuery();
			$p = $q->execute();
			return  new Response('Incremento actualizado Existosamente'); 


		}

}





