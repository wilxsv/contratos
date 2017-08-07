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
	    	$resumen->setIncrementoId($incremento);
	    	$resumen->setContratoId($contrato);


	    	$programacion = $em->getRepository('MinsalModeloBundle:CtlIncremento')->findOneById($incremento);
	    	$proveedor='1';
	    	$licitacion='1';


			//$service_url = "http://192.168.1.4:8080/v1/sinab/medicamentosestimacion?tocken=eccbc87e4b5ce2fe28308fd9f2a7baf3&programacion={$programacion}&licitacion={$licitacion}&proveedor={$proveedor}";
		    /*$curl = curl_init($service_url);
		    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		    $curl_response = curl_exec($curl);
		    curl_close($curl);
		   
		    $resumen->setMedicamentos($curl_response);
		    $em->persist($resumen);
		    $em->flush($resumen);

		    //ahora renderizare los medicamentos que estan en el json guardado desde la bd

		    $respuesta = json_decode($resumen->getMedicamentos(),true);
		    $medicamentos = array();
		    foreach ($respuesta['respuesta'] as $obj) {
		    	$medica = $em->getRepository('MinsalModeloBundle:CtlProducto')->findOneBy(array(
		    			'idProductoSibasi' => $obj["1"]
		    		));
		    	array_push($medicamentos, $medica);
		    }*/



		    return $this->render('MinsalPlantillaBundle:Producto:depuracion.html.twig',array(
		    	'medicamentos' => $programacion
		    	));
		}else{
			$respuesta = json_decode($re->getMedicamentos(),true);
		    $medicamentos = array();
		    //para pruebas
		    foreach ($respuesta['respuesta'] as $obj) {
		    	$medica = $em->getRepository('MinsalModeloBundle:CtlProducto')->findOneBy(array(
		    			'idProductoSibasi' => $obj["1"]
		    		));
		    	array_push($medicamentos, $medica);
		    }
		    
		    return $this->render('MinsalPlantillaBundle:Producto:depuracion.html.twig',array(
		    	'medicamentos' => $medicamentos
		    	));
		}
		 
	   

		
	}
	public function listadoAction($incremento)
	{	
		$em = $this->getDoctrine()->getManager();
	    //$contratos = $em->getRepository('MinsalModeloBundle:CtlContrato')->findAll();
        /*$query= $em->createQuery("SELECT c.numeroModalidadCompra,c.id,c.numeroContrato,c.idContratoSinab,c.contratoProveedor,c.idEstablecimiento FROM MinsalModeloBundle:CtlContrato c WHERE c.numeroModalidadCompra = $incremento");*/
        //$incremento es el id del incremento no numeroModalidad

        //obtener el objeto incremento  apartir del id

        $dqlincremento = "SELECT  mc.numeroModalidad
        				  FROM MinsalModeloBundle:CtlModalidadCompra mc
        				  INNER JOIN MinsalModeloBundle:CtlIncremento inc WITH mc.id = inc.incrementoModalidadCompra
        				  WHERE inc.id = $incremento ";
        $objIncremento = $em->createQuery($dqlincremento)->getResult();
        //compra a partir del id guardado en incremento tienen que ser con sqlnative
        /*sql = "SELECT numero_modalidad 
        		FROM ctl_modalidad_compra as mc 
        		INNER JOIN ctl_incremento as i ON i.incremento_modalidad_compra = mc.id 
        		WHERE i.id = $incremento" */



        $dql = "SELECT DISTINCT c.id,c.numeroContrato,pr.nombreProveedor,pr.nit,pr.estadoProveedor,pr.id as idProveedor,c.idContratoSinab
		FROM MinsalModeloBundle:CtlContrato c
		INNER JOIN MinsalModeloBundle:MtnProductoContrato pc WITH c.idContratoSinab = pc.mtnContrato
		INNER JOIN MinsalModeloBundle:CtlProveedor pr WITH c.contratoProveedor = pr.idProveedorSinab
		INNER JOIN MinsalModeloBundle:CtlModalidadCompra mc WITH c.numeroModalidadCompra = mc.id
		INNER JOIN MinsalModeloBundle:CtlProducto p WITH pc.mtnProducto = p.idProductoSibasi
		WHERE mc.id = $incremento AND pc.mtnProveedor=c.contratoProveedor ";
        $contratos = $em->createQuery($dql)->getResult();
	    $incrementos = $em->getRepository('MinsalModeloBundle:CtlIncremento')->findOneBy(
	    	array(
	    		'incrementoModalidadCompra'=>$incremento
	    		)
	    	);

	   
	    return $this->render('MinsalPlantillaBundle:Unabast:contratos.html.twig',array(
	    	'contratos' => $contratos,
	    	'incremento' => $compra
	    	));
	}

	public function listadoParaProrrogaAction($prorroga)
	{
		$em = $this->getDoctrine()->getManager();
	    //$contratos = $em->getRepository('MinsalModeloBundle:CtlContrato')->findAll();
        /*$query= $em->createQuery("SELECT c.numeroModalidadCompra,c.id,c.numeroContrato,c.idContratoSinab,c.contratoProveedor,c.idEstablecimiento FROM MinsalModeloBundle:CtlContrato c WHERE c.numeroModalidadCompra = $incremento");*/
        $dql = "SELECT DISTINCT c.id,c.numeroContrato,pr.nombreProveedor,pr.nit,pr.estadoProveedor,pr.id as idProveedor,c.idContratoSinab
		FROM MinsalModeloBundle:CtlContrato c
		INNER JOIN MinsalModeloBundle:MtnProductoContrato pc WITH c.idContratoSinab = pc.mtnContrato
		INNER JOIN MinsalModeloBundle:CtlProveedor pr WITH c.contratoProveedor = pr.idProveedorSinab
		INNER JOIN MinsalModeloBundle:CtlModalidadCompra mc WITH c.numeroModalidadCompra = mc.id
		INNER JOIN MinsalModeloBundle:CtlProducto p WITH pc.mtnProducto = p.idProductoSibasi
		WHERE mc.id = $prorroga AND pc.mtnProveedor=c.contratoProveedor ";
        $contratos = $em->createQuery($dql)->getResult();
	    $prorrogas = $em->getRepository('MinsalModeloBundle:CtlProrroga')->findOneBy(
	    	array(
	    		'prorrogaModalidadCompra'=>$prorroga
	    		)
	    	);

	   
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
