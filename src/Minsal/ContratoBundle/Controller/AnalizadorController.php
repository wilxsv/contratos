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
use Symfony\Component\DependencyInjection\ContainerInterface as Container;

/*
	 * Direccion Fisica: src/Minsal/ContratoBundle/Controller/AnalizadorController.php

*/

class AnalizadorController extends Controller
{



		//Funcion para el llamado de datos de las prorrogas
		public function analizadorProrrogaAction($prorroga)
		{
			$api = $this->container->getParameter('api_dominio');
			$token = $this->container->getParameter('api_token');
			$em = $this->getDoctrine()->getManager(); //Invocamos al manejador de Entidades

			$prorrogaObj = $em->getRepository('MinsalModeloBundle:CtlProrroga')->findOneBy(array(
				'id'=>$prorroga
				)); //Obtenemos el ID de la prorroga al que se analizara

			$compra = $prorrogaObj->getProrrogaModalidadCompra()->getId(); //Obtenemos el ID De la modalidad de la compra

			$dql = "SELECT mp.medicamentos FROM MinsalModeloBundle:CtlProrroga p INNER JOIN MinsalModeloBundle:MtnMedicamentoProrroga mp WITH p.id=mp.prorrogaid WHERE p.id=$prorroga";

			$listado = $em->createQuery($dql)->getResult();

			$listadounido = '';
			foreach ($listado as $lista) {
				$listadounido .=$lista["medicamentos"];
			}
			$listadounido = str_replace('[','', $listadounido);
			$listadounido = str_replace(']','', $listadounido);
			$listadounido = str_replace('"','', $listadounido);

			$dql2 = "SELECT mc.id, mc.numeroModalidad, c.id as contrato, c.numeroContrato, p.codigoProducto, p.declargo, c.montoContrato, pc.cantidad, pc.precioUnitario, p.id,pr.nombreProveedor,pc.renglon,p.id as idproducto,pr.id as idproveedor
			    	FROM MinsalModeloBundle:CtlProducto p
					INNER JOIN MinsalModeloBundle:MtnProductoContrato pc WITH pc.mtnProducto = p.id
					INNER JOIN MinsalModeloBundle:CtlContrato c WITH  pc.mtnContrato = c.id
					INNER JOIN MinsalModeloBundle:CtlProveedor pr WITH pc.mtnProveedor = pr.id
					INNER JOIN MinsalModeloBundle:CtlModalidadCompra mc WITH c.numeroModalidad = mc.id
					WHERE p.estadoProducto=9 AND p.id IN ($listadounido) AND mc.id = $compra
					ORDER BY c.id ";

					/*
					Parametros a enviar
					 $programacion = $_GET["programacion"];
					 $licitacion = $_GET["licitacion"];
					 $proveedor = $_GET["proveedor"];
					 */

			$medicamentoslista = $em->createQuery($dql2)->getResult();
			$listaprod = array();
			$prove = array();
			foreach ($medicamentoslista as $m) {
				array_push($listaprod, $m["id"]);
 				array_push($prove, $m["idproveedor"]);
			}
			$producto = implode(",", $listaprod);
			$licitacion = $prorrogaObj->getProrrogaModalidadCompra()->getNumeroModalidad();
			$planificacion = $prorrogaObj->getPlanificacion()->getId(); //Obtenermos el ID de la programacion que se utilizara
			$proveedor = implode(",", $prove);



			$service_url = "{$api}/v1/sinab/medicamentosplanificacionprorroga?tocken={$token}&programacion={$planificacion}&licitacion={$licitacion}&proveedor={$proveedor}&producto={$producto}";

			$curl = curl_init($service_url);
      		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
      		$curl_response = curl_exec($curl);
      		curl_close($curl);
      		$respuesta = json_decode($curl_response,true);

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
