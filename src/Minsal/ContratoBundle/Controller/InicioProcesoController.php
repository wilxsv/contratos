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
use Minsal\ModeloBundle\Entity\CtlProgramacion;
use Symfony\Component\Validator\Constraints\DateTime;

function cargarProveedores($em){
  /* ingreso de proveedores */
  //iterar las codigos de contrato
   $service_url = 'http://192.168.1.2:8080/v1/sinab/procesoscompras?tocken=eccbc87e4b5ce2fe28308fd9f2a7baf3';
    $curl = curl_init($service_url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $curl_response = curl_exec($curl);
    curl_close($curl);
    $respuesta = json_decode($curl_response,true);
    foreach ($respuesta['respuesta'] as $datoNuevo) {
      $codigo = $datoNuevo["0"];
      $service_url2 = 'http://192.168.1.2:8080/v1/sinab/proveedoresporcontratos?tocken=eccbc87e4b5ce2fe28308fd9f2a7baf3&contrato='.$codigo;
      $curl2 = curl_init($service_url2);
      curl_setopt($curl2, CURLOPT_RETURNTRANSFER, true);
      $curl_response2 = curl_exec($curl2);
      curl_close($curl2);
      $respuesta2 = json_decode($curl_response2,true);
      foreach ($respuesta2['respuesta'] as $proveedor ) {
        $nuevoProveedor = new CtlProveedor();
        $nuevoProveedor->setIdProveedorSibasi($proveedor["0"]);
        $nuevoProveedor->setCodigoProveedor($proveedor["3"]);
        $nuevoProveedor->setNombreProveedor($proveedor["1"]);
        $nuevoProveedor->setNit($proveedor["2"]);
        $obj = $em->getRepository('MinsalModeloBundle:CtlProveedor')->findByCodigoProveedor($proveedor["3"]);
        if ($obj == null) {
          $em->persist($nuevoProveedor);
        $em->flush($nuevoProveedor);
        }
        
      }
    }
          
}
function cargarContratos($em)
  {
    /*--------------Sincronizacion de contratos y verificacion de actualizacion------------------*/

    $service_url = 'http://192.168.1.2:8080/v1/sinab/procesoscompras?tocken=eccbc87e4b5ce2fe28308fd9f2a7baf3';
    $curl = curl_init($service_url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $curl_response = curl_exec($curl);
    curl_close($curl);
    $respuesta = json_decode($curl_response,true);
    foreach ($respuesta['respuesta'] as $datoNuevo) {

          $nuevoContrato = new CtlContrato();

          //ingreso de numero de contrato
          $nuevoContrato->setNumeroContrato($datoNuevo["0"]);

          //Ingreso de proveedor
          $proveedorGuardar = $em->getRepository('MinsalModeloBundle:CtlProveedor')->findByIdProveedorSibasi($datoNuevo["1"]);
          $nuevoContrato->setContratoProveedor($proveedorGuardar[0]);

          //ingreso de establecimiento
          $establecimiento =  $em->getRepository('MinsalModeloBundle:CtlEstablecimiento')->findByIdEstablecimientoSibasi($datoNuevo["2"]);
          
          $nuevoContrato->setContratoEstablecimiento($establecimiento[0]);
          

          //ingreso de id
          $nuevoContrato->setidContratoSibasi($datoNuevo["3"]);
          
          //ingreso de compra
          $compra = $em->getRepository('MinsalModeloBundle:CtlModalidadCompra')->findByNumeroModalidad($datoNuevo["4"]);
          $nuevoContrato->setNumeroModalidadCompra($compra[0]);

          //ingreso del monto de contrato
          $nuevoContrato->setMontoContrato($datoNuevo["5"]);

            $em->persist($nuevoContrato);
            $em->flush($nuevoContrato);
          
    }

    
  }

  function cargarCompras($em)
  {
    /*--------------------Sincronizacion de compras -----------------------------------*/

    $service_url = 'http://192.168.1.2:8080/v1/sinab/procesoscompras?tocken=eccbc87e4b5ce2fe28308fd9f2a7baf3';

    $curl = curl_init($service_url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $curl_response = curl_exec($curl);
    curl_close($curl);
    $respuesta = json_decode($curl_response,true);
    foreach ($respuesta['respuesta'] as $datoNuevo) {
      $nuevoContrato = new CtlContrato();
      $nuevaModalidadCompra = new CtlModalidadCompra();
      $nuevaModalidadCompra->setNumeroModalidad($datoNuevo["4"]);
      $obj = $em->getRepository('MinsalModeloBundle:CtlModalidadCompra')->findByNumeroModalidad($datoNuevo["4"]);
      if ($obj == null) {
        $em->persist($nuevaModalidadCompra);
        $em->flush($nuevaModalidadCompra);
      }
      
    }
  }

  function cargarEstablecimientos($em)
  {
    /*---------------Sincronizacion de Establecimientos-------------*/
        $service_url = 'http://192.168.1.2:8080/v1/sinab/establecimientos?tocken=eccbc87e4b5ce2fe28308fd9f2a7baf3';
        $curl = curl_init($service_url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $curl_response = curl_exec($curl);
        curl_close($curl);
        $respuesta = json_decode($curl_response,true);
        foreach ($respuesta['respuesta'] as $establecimiento ) {
          $nuevoEstablecimiento = new CtlEstablecimiento();
          $nuevoEstablecimiento->setidEstablecimientoSibasi($establecimiento["0"]);
          $nuevoEstablecimiento->setCodigoEstablecimiento($establecimiento["1"]);
          $nuevoEstablecimiento->setNombreEstablecimiento($establecimiento["3"]);
          $em->persist($nuevoEstablecimiento);
          $em->flush($nuevoEstablecimiento);
        }
  }

  function cargarProgramaciones($em){
    /*--------SINCRONIZACION DE PROGRAMACIONES-------------*/
    $service_url = 'http://192.168.1.2:8080/v1/sinab/estimacionesmedicamentos?tocken=eccbc87e4b5ce2fe28308fd9f2a7baf3';
    $curl = curl_init($service_url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $curl_response = curl_exec($curl);
    curl_close($curl);
    $respuesta = json_decode($curl_response,true);
        foreach ($respuesta['respuesta'] as $pr ) {
          $nuevaProgramacion = new CtlProgramacion();
          $nuevaProgramacion->setIdProgramacion($pr["0"]);
          $nuevaProgramacion->setDescripcionProgramacion($pr["1"]);

          $em->persist($nuevaProgramacion);
          $em->flush($nuevaProgramacion);
        }
  }

class InicioProcesoController extends Controller
{
  public function inicioAction()
  {      

    $em = $this->getDoctrine()->getManager();
    /* funciones para la carga de datos*/
    //cargarEstablecimientos($em);
    //cargarCompras($em);
    //cargarProveedores($em); 
    //cargarContratos($em);
    cargarProgramaciones($em);
    /*se renderizan los contratos e incrementos */
    $compras= $em->getRepository('MinsalModeloBundle:CtlModalidadCompra')->findAll();

    $incrementos = $em->getRepository('MinsalModeloBundle:CtlIncremento')->findAll();

    $estimaciones = $em->getRepository('MinsalModeloBundle:CtlProgramacion')->findAll();
    return $this->render('MinsalPlantillaBundle:InicioProceso:inicio.html.twig', array(
      'compras' => $compras,
      'incrementos' => $incrementos,
      'estimaciones' => $estimaciones
    ));
  
  }
  

  public function crearIncrementoAction(Request $request)
  {
    $em = $this->getDoctrine()->getManager();
    $cod = $request->get('cod');
    $meses = $request->get('meses');
    if ($request->get('estimacion') == 1) {
      $estado = $em->getRepository('MinsalModeloBundle:CtlEstados')->find(1);
      $incremento = new CtlIncremento();
      $compra = $em->getRepository('MinsalModeloBundle:CtlModalidadCompra')->findByNumeroModalidad($cod);
      $incremento->setestadoIncremento($estado);
      $incremento->setMesesDesestimar($meses);
      $incremento->setFechaCreacion(new \DateTime("now"));
      foreach($compra as $com){
        $incremento->setIncrementoModalidadCompra($com);
       }
       $incremento->setEstimacion(1);
      $em->persist($incremento);
      $em->flush($incremento);
    }
    else{
      $estado = $em->getRepository('MinsalModeloBundle:CtlEstados')->find(1);
      $incremento = new CtlIncremento();
      $compra = $em->getRepository('MinsalModeloBundle:CtlModalidadCompra')->findByNumeroModalidad($cod);
      $incremento->setestadoIncremento($estado);
      $incremento->setMesesDesestimar($meses);
      $incremento->setFechaCreacion(new \DateTime("now"));
      foreach($compra as $com){
        $incremento->setIncrementoModalidadCompra($com);
       }
       $incremento->setEstimacion(0);
      $em->persist($incremento);
      $em->flush($incremento);

    }

    

    $compras= $em->getRepository('MinsalModeloBundle:CtlModalidadCompra')->findAll();

    $incrementos = $em->getRepository('MinsalModeloBundle:CtlIncremento')->findAll();


    return $this->render('MinsalPlantillaBundle:InicioProceso:inicio.html.twig', array(
          'compras' => $compras,
          'incrementos' => $incrementos
        ));


  }
  public function depurarMedicamentosAction(Request $request)
  {
    return $this->render('MinsalPlantillaBundle:Analizador:depurarMedicamentos.html.twig'); 
  }
}
