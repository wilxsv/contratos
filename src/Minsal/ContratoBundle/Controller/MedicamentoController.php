<?php

namespace Minsal\ContratoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Minsal\ModeloBundle\Entity\MtnMedicamentoIncremento;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\ORM\Query\ResultSetMapping;




class MedicamentoController extends Controller
{
	public function depuracionAction($incremento,$contrato,$proveedor)
	{	
		//del contrato se obtiene el numero de modalidad compra
		//del incremento se obtiene la programacion
		//del proveedor pues se obtiene el proveedor :)
		$em = $this->getDoctrine()->getManager();
		$re = $em->getRepository('MinsalModeloBundle:MtnMedicamentoIncremento')->findOneBy(array(
			'incrementoid'=>$incremento,'contratoid'=>$contrato
			));
		if (is_null($re)) {
			$resumen = new MtnMedicamentoIncremento();
			$INCRE = $em->getRepository('MinsalModeloBundle:CtlIncremento')->findOneBy(array(
				'id' => $incremento
				));
	    	$resumen->setIncrementoId($INCRE);
	    	$resumen->setContratoId($contrato);
	    	//compra a partir del id guardado en incremento tienen que ser con sqlnative
	        /*sql = "SELECT numero_modalidad 
	        		FROM ctl_modalidad_compra as mc 
	        		INNER JOIN ctl_incremento as i ON i.incremento_modalidad_compra = mc.id 
	        		WHERE i.id = $incremento" */

	        $compra = "SELECT  mc.numeroModalidad,mc.id
	        				  FROM MinsalModeloBundle:CtlModalidadCompra mc
	        				  INNER JOIN MinsalModeloBundle:CtlIncremento inc WITH mc.id = inc.numeroModalidadCompra
	        				  WHERE inc.id = $incremento ";
	        $objcompra = $em->createQuery($compra)->getResult();
	        foreach ($objcompra as $ob) {
        		$licitacion = $ob["numeroModalidad"];
        	}

        	

        	//Programacion a partir del id del incremento
        	/*sql =  "SELECT p.idProgramacion 
        			  FROM ctl_programacion AS p 
        			  INNER JOIN ctl_incremento  AS i ON p.id=i.estimacion WHERE i.id = $incremento
        	"*/


        	$pdql = "SELECT  p.id
        			 FROM MinsalModeloBundle:CtlProgramacion p
        			 INNER JOIN MinsalModeloBundle:CtlIncremento inc WITH inc.estimacion = p.id
        			 WHERE inc.id = $incremento ";

        	$objProg = $em->createQuery($pdql)->getResult();
        	foreach ($objProg as $ob) {
        		$programacion = $ob["id"];
        	}
        	$url = urlencode($licitacion);
			$service_url = "http://192.168.7.196:8080/v1/sinab/medicamentosestimacion?tocken=eccbc87e4b5ce2fe28308fd9f2a7baf3&programacion={$programacion}&licitacion={$url}&proveedor={$proveedor}";
		    $curl = curl_init($service_url);
		    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		    $curl_response = curl_exec($curl);
		    curl_close($curl);
		    $respuesta = json_decode($curl_response,true);
		    $resumenm = $respuesta["respuesta"];

		    $listadoId = array();

		    foreach ($resumenm as $p) {
		    	array_push($listadoId, $p["0"]);
		    }

		    $qb = $em->createQueryBuilder();
		    $qb->add('select','p')
		    ->add('from','MinsalModeloBundle:CtlProducto p')
		    ->add('where',$qb->expr()->in('p.id',$listadoId));
		    $medicamentos = $qb->getQuery()->getResult();
		    $resumen->setMedicamentos(json_encode($listadoId));

		    $em->persist($resumen);
		    $em->flush($resumen);
		    
		    return $this->render('MinsalPlantillaBundle:Producto:depuracion.html.twig',array(
		    	'medicamentos' => $medicamentos
		    	));
		}else{
			$listadoId = json_decode($re->getMedicamentos());
			$qb = $em->createQueryBuilder();
		    $qb->add('select','p')
		    ->add('from','MinsalModeloBundle:CtlProducto p')
		    ->add('where',$qb->expr()->in('p.id',$listadoId));
		    $medicamentos = $qb->getQuery()->getResult();
		    return $this->render('MinsalPlantillaBundle:Producto:depuracion.html.twig',array(
		    	'medicamentos' => $medicamentos));
		}
	   

		
	}
	public function listadoAction($incremento)
	{	
		$em = $this->getDoctrine()->getManager();
        //compra a partir del id guardado en incremento tienen que ser con sqlnative
        /*sql = "SELECT numero_modalidad 
        		FROM ctl_modalidad_compra as mc 
        		INNER JOIN ctl_incremento as i ON i.incremento_modalidad_compra = mc.id 
        		WHERE i.id = $incremento" */

        $compra = "SELECT  mc.numeroModalidad,mc.id
        				  FROM MinsalModeloBundle:CtlModalidadCompra mc
        				  INNER JOIN MinsalModeloBundle:CtlIncremento inc WITH mc.id = inc.numeroModalidadCompra
        				  WHERE inc.id = $incremento ";
        $objcompra = $em->createQuery($compra)->getResult();
        foreach ($objcompra as $ob) {
        	$numerocompra = $ob["id"];
        }

        $dql = "SELECT DISTINCT c.id,c.numeroContrato,pr.nombreProveedor,pr.nit,pr.estadoProveedor,pr.id as idProveedor
		FROM MinsalModeloBundle:CtlContrato c
		INNER JOIN MinsalModeloBundle:MtnProductoContrato pc WITH c.id = pc.mtnContrato
		INNER JOIN MinsalModeloBundle:CtlProveedor pr WITH c.idProveedor = pr.id
		INNER JOIN MinsalModeloBundle:CtlModalidadCompra mc WITH c.numeroModalidad = mc.id
		INNER JOIN MinsalModeloBundle:CtlProducto p WITH pc.mtnProducto = p.id
		WHERE mc.id = '$numerocompra' AND pc.mtnProveedor=c.idProveedor ";
        $contratos = $em->createQuery($dql)->getResult();

	   
	    return $this->render('MinsalPlantillaBundle:Unabast:contratos.html.twig',array(
	    	'contratos' => $contratos,
	    	'compra' => $objcompra,
	    	'incremento'=>$incremento
	    	));
	}

	public function listadoParaProrrogaAction($prorroga)
	{
		$em = $this->getDoctrine()->getManager();
	    //$contratos = $em->getRepository('MinsalModeloBundle:CtlContrato')->findAll();
        /*$query= $em->createQuery("SELECT c.numeroModalidadCompra,c.id,c.numeroContrato,c.idContratoSinab,c.contratoProveedor,c.idEstablecimiento FROM MinsalModeloBundle:CtlContrato c WHERE c.numeroModalidadCompra = $incremento");*/
        $prorrogas = $em->getRepository('MinsalModeloBundle:CtlProrroga')->findOneBy(
	    	array(
	    		'prorrogaModalidadCompra'=>$prorroga
	    		)
	    	);
        $numerocompra = $prorrogas->getProrrogaModalidadCompra()->getId();
        $dql = "SELECT DISTINCT c.id,c.numeroContrato,pr.nombreProveedor,pr.nit,pr.estadoProveedor,pr.id as idProveedor
		FROM MinsalModeloBundle:CtlContrato c
		INNER JOIN MinsalModeloBundle:MtnProductoContrato pc WITH c.id = pc.mtnContrato
		INNER JOIN MinsalModeloBundle:CtlProveedor pr WITH c.idProveedor = pr.id
		INNER JOIN MinsalModeloBundle:CtlModalidadCompra mc WITH c.numeroModalidad = mc.id
		INNER JOIN MinsalModeloBundle:CtlProducto p WITH pc.mtnProducto = p.id
		WHERE mc.id = '$numerocompra' AND pc.mtnProveedor=c.idProveedor";
        $contratos = $em->createQuery($dql)->getResult();

	   
	    return $this->render('MinsalPlantillaBundle:Unabast:contratosProrrogas.html.twig',array(
	    	'contratos' => $contratos,
	    	'prorrogas' => $prorrogas
	    	));
	}

	public function cambioEstadoAction(Request $request)
	{
		$esProrroga = $request->get('esProrroga');

		if ($esProrroga == 1) {
			$estado = $request->get('estado');
			$idCompra = $request->get('prorrogaID');

			$em = $this->getDoctrine()->getManager();
			$qb = $em->createQueryBuilder();


			$q = $qb->update('MinsalModeloBundle:CtlProrroga', 'p')
    			->set('p.estadoProrroga', $qb->expr()->literal($estado))
    			->where('p.id = ?1')
    			->setParameter(1, $idCompra)
    			->getQuery();
			$p = $q->execute();
		return  new Response('Prorroga Verificada Existosamente'); 


		}
		else{

			//Obtenemos el listado de objetos
		$estado = $request->get('estado');
		$idCompra = $request->get('incrementoID');

		$em = $this->getDoctrine()->getManager();
		$qb = $em->createQueryBuilder();

		$q = $qb->update('MinsalModeloBundle:CtlIncremento', 'i')
    	->set('i.estadoIncremento', $qb->expr()->literal($estado))
    	->where('i.id = ?1')
    	->setParameter(1, $idCompra)
    	->getQuery();
		$p = $q->execute();
		return  new Response('Incremento Verificado Existosamente'); 
		}
	}

	public function estadoMedicamentosAction(Request $request){

		$listaMedicamentos = $request->get('listaMedicamentos');

		foreach ($listaMedicamentos as $medicamento) {
			$em = $this->getDoctrine()->getManager(); 
			$obj = $em->getRepository('MinsalModeloBundle:CtlProducto')->find($medicamento['medicamento']);
			//Buscamos por ID

			$obj->setEstadoProducto($medicamento['estado']); //con esto establecemos el estado a los productos (medicamentos de nuesta base local)

			$em->persist($obj);
			$em->flush($obj);
		
		}

		return new Response('Productos Actualizados exitosamente');


	}
}
