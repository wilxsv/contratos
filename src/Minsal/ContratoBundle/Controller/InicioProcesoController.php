<?php

namespace Minsal\ContratoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Minsal\ModeloBundle\Entity\CtlContrato;
use Minsal\ModeloBundle\Entity\CtlEstablecimiento;
use Minsal\ModeloBundle\Entity\CtlProveedor;
use Minsal\ModeloBundle\Entity\CtlIncremento;
use Minsal\ModeloBundle\Entity\CtlEstados;
use Minsal\ModeloBundle\Entity\CtlModalidadCompra;
use Symfony\Component\Validator\Constraints\DateTime;


class InicioProcesoController extends Controller
{
	public function inicioAction()
	{	

        $em = $this->getDoctrine()->getManager();
		/*------------------Sincronizacion de proveedores--------------------------*/


		/*$service_url = '';
        $curl = curl_init($service_url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $curl_response = curl_exec($curl);
        curl_close($curl);
        $respuesta = json_decode($curl_response,true);
        $em = $this->getDoctrine()->getManager();
        foreach ($respuesta['respuesta'] as $proveedor ) {
        	$nuevoProveedor = new CtlProveedor();
        	$nuevoProveedor->setProveedorIdProveedor($proveedor["0"]);
        	$nuevoProveedor->setCodigoProveedor($proveedor["4"]);
        	$nuevoProveedor->setNombreProveedor($proveedor["5"]);
        	$nuevoProveedor->setNit($proveedor["3"]);
        	$em->persist($nuevoProveedor);
        	$em->flush($nuevoProveedor);
        }*/
		/*--------------Sincronizacion de contratos y verificacion de actualizacion------------------*/

		$contratosEnBd = $em->getRepository('MinsalModeloBundle:CtlContrato')->findAll();
		$service_url = 'http://192.168.1.2:8080/v1/sinab/procesoscompras?tocken=eccbc87e4b5ce2fe28308fd9f2a7baf3';
        $curl = curl_init($service_url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $curl_response = curl_exec($curl);
        curl_close($curl);
        /* verificacion */
       	$respuesta = json_decode($curl_response,true);
        foreach ($respuesta['respuesta'] as $datoNuevo) {
              $nuevoContrato = new CtlContrato();
              $nuevaModalidadCompra = new CtlModalidadCompra();
              $nuevaModalidadCompra->setNumeroModalidad($datoNuevo["4"]);
              $em->persist($nuevaModalidadCompra);
              $em->flush($nuevaModalidadCompra);
              $nuevoContrato->setId($datoNuevo["3"]);
              $nuevoContrato->setNumeroContrato($datoNuevo["0"]);
              $nuevoContrato->setNumeroModalidadCompra($nuevaModalidadCompra);
              $nuevoContrato->setMontoContrato($datoNuevo["5"]);
              $em->persist($nuevoContrato);
              $em->flush($nuevoContrato);
        } 

        /*---------------Sincronizacion de Establecimientos-------------*/
        // $service_url = 'http://192.168.1.2:8080/v1/sinab/establecimientos?tocken=eccbc87e4b5ce2fe28308fd9f2a7baf3';
        // $curl = curl_init($service_url);
        // curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        // $curl_response = curl_exec($curl);
        // curl_close($curl);
        // $respuesta = json_decode($curl_response,true);
        // foreach ($respuesta['respuesta'] as $establecimiento ) {
        // 	$nuevoEstablecimiento = new CtlEstablecimiento();
        // 	$nuevoEstablecimiento->setEstablecimientoIdEstablecimiento($establecimiento["0"]);
        // 	$nuevoEstablecimiento->setCodigoEstablecimiento($establecimiento["1"]);
        // 	$nuevoEstablecimiento->setNombreEstablecimiento($establecimiento["3"]);
        // 	$em->persist($nuevoEstablecimiento);
        // 	$em->flush($nuevoEstablecimiento);
        // }


        /*se renderizan los contratos*/
		    $compras= $em->getRepository('MinsalModeloBundle:CtlModalidadCompra')->findAll();

		    $incrementos = $em->getRepository('MinsalModeloBundle:CtlIncremento')->findAll();


        return $this->render('MinsalPlantillaBundle:InicioProceso:inicio.html.twig', array(
    			'compras' => $compras,
          'incrementos' => $incrementos
  			));
	
	}

	public function crearIncrementoAction(Request $request)
	{
    $cod = $request->get('cod');
    $meses = $request->get('meses');
    if ($request->get('estimacion')) {
      
    }
    else{
      $estado = $em->getRepository('MinsalModeloBundle:CtlContrato')->findById('1');
      $incremento = new CtlIncremento();
      $incremento->setMesesDesestimar($meses);
      $incremento->setFechaCreacion(new \DateTime("now"));
      $incremento->setestadoIncremento($estado);

    }

    $em = $this->getDoctrine()->getManager();

    $contratos= $em->getRepository('MinsalModeloBundle:CtlContrato')->findAll();

    $incrementos = $em->getRepository('MinsalModeloBundle:CtlIncremento')->findAll();


    return $this->render('MinsalPlantillaBundle:InicioProceso:inicio.html.twig', array(
          'contratos' => $contratos,
          'incrementos' => $incrementos
        ));


  }
	public function depurarMedicamentosAction(Request $request)
	{
		return $this->render('MinsalPlantillaBundle:Analizador:depurarMedicamentos.html.twig');	
	}
}
