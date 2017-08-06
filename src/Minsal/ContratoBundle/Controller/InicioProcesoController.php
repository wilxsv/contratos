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
use Minsal\ModeloBundle\Entity\CtlUnidadMedida;
use Minsal\ModeloBundle\Entity\CtlProducto;
use Minsal\ModeloBundle\Entity\CtlProrroga;
use Minsal\ModeloBundle\Entity\CtlPlanificacion;
use Minsal\ModeloBundle\Entity\MtnProductoContrato;
use Symfony\Component\Validator\Constraints\DateTime;
use Doctrine\ORM\Query\ResultSetMapping;


function cargarProveedores($em){
  /* ingreso de proveedores */
      $service_url = 'http://192.168.1.4:8080/v1/sinab/proveedoresporcontratos?tocken=eccbc87e4b5ce2fe28308fd9f2a7baf3';
      $curl = curl_init($service_url);
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
      $curl_response = curl_exec($curl);
      curl_close($curl);
      $respuesta = json_decode($curl_response,true);
      foreach ($respuesta['respuesta'] as $proveedor ) {
        $nuevoProveedor = new CtlProveedor();
        $nuevoProveedor->setIdProveedorSinab($proveedor["0"]);
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
function cargarContratos($em)
  {
    /*--------------Sincronizacion de contratos y verificacion de actualizacion------------------*/

    $service_url = 'http://192.168.1.4:8080/v1/sinab/procesoscompras?tocken=eccbc87e4b5ce2fe28308fd9f2a7baf3';
    $curl = curl_init($service_url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $curl_response = curl_exec($curl);
    curl_close($curl);
    $respuesta = json_decode($curl_response,true);
    $contador =0;
    foreach ($respuesta['respuesta'] as $datoNuevo) {
          $contador = $contador+1;
          // $nuevoContrato = new CtlContrato();

          // //ingreso de numero de contrato
          // $nuevoContrato->setNumeroContrato($datoNuevo["0"]);

          // //Ingreso de proveedor
          // $proveedorGuardar = $em->getRepository('MinsalModeloBundle:CtlProveedor')->findOneByIdProveedorSinab($datoNuevo["1"]);
          // $nuevoContrato->setContratoProveedor($proveedorGuardar);

          // //ingreso de establecimiento
          // $establecimiento =  $em->getRepository('MinsalModeloBundle:CtlEstablecimiento')->findOneByIdEstablecimientoSinab($datoNuevo["2"]);
          
          // $nuevoContrato->setContratoEstablecimiento($establecimiento);
          

          // //ingreso de id
          // $nuevoContrato->setIdContratoSinab($datoNuevo["3"]);
          
          // //ingreso de compra
          // $compra = $em->getRepository('MinsalModeloBundle:CtlModalidadCompra')->findByNumeroModalidad($datoNuevo["4"]);
          // $nuevoContrato->setNumeroModalidadCompra($compra[0]);

          // //ingreso del monto de contrato
          // $nuevoContrato->setMontoContrato($datoNuevo["5"]);

          //   $em->persist($nuevoContrato);
          //   if($nuevoContrato->getContratoProveedor()!= null){
          //     $em->flush($nuevoContrato);
          //   }



          $rsm = new ResultSetMapping();
          $query = $em->createNativeQuery('INSERT INTO ctl_contrato(
            id_contrato, numero_modalidad_compra, contrato_proveedor, id_establecimiento, 
            numero_contrato, monto_contrato, id_contrato_sinab)
    VALUES (?, ?, ?, ?, 
            ?, ?, ?);
', $rsm);
          //ingreso de compra
          $compra = $em->getRepository('MinsalModeloBundle:CtlModalidadCompra')->findByNumeroModalidad($datoNuevo["4"]);
          $query->setParameter(1, $contador);
          
          $query->setParameter(2, $compra[0]->getId());
          $query->setParameter(3, $datoNuevo["1"]);
          $query->setParameter(4, $datoNuevo["2"]);
          $query->setParameter(5, $datoNuevo["0"]);
          $query->setParameter(6, $datoNuevo["5"]);
          $query->setParameter(7, $datoNuevo["3"]);
          $query->getResult();
            
          
    }

    
  }

  function cargarCompras($em)
  {
    /*--------------------Sincronizacion de compras -----------------------------------*/

    $service_url = 'http://192.168.1.4:8080/v1/sinab/procesoscompras?tocken=eccbc87e4b5ce2fe28308fd9f2a7baf3';

    $curl = curl_init($service_url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $curl_response = curl_exec($curl);
    curl_close($curl);
    $respuesta = json_decode($curl_response,true);
    foreach ($respuesta['respuesta'] as $datoNuevo) {
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
        $service_url = 'http://192.168.1.4:8080/v1/sinab/establecimientos?tocken=eccbc87e4b5ce2fe28308fd9f2a7baf3';
        $curl = curl_init($service_url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $curl_response = curl_exec($curl);
        curl_close($curl);
        $respuesta = json_decode($curl_response,true);
        foreach ($respuesta['respuesta'] as $establecimiento ) {
          $nuevoEstablecimiento = new CtlEstablecimiento();
          $nuevoEstablecimiento->setidEstablecimientoSinab($establecimiento["0"]);
          $nuevoEstablecimiento->setCodigoEstablecimiento($establecimiento["1"]);
          $nuevoEstablecimiento->setNombreEstablecimiento($establecimiento["3"]);
          $em->persist($nuevoEstablecimiento);
          $em->flush($nuevoEstablecimiento);
        }
  }

  function cargarProgramaciones($em){
    /*--------SINCRONIZACION DE PROGRAMACIONES-------------*/
    $service_url = 'http://192.168.1.4:8080/v1/sinab/estimacionesmedicamentos?tocken=eccbc87e4b5ce2fe28308fd9f2a7baf3';
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

  function cargarPlanificaciones($em){
  /*--------SINCRONIZACION DE PLANIFICACIONES-------------*/
    $service_url = 'http://192.168.1.4:8080/v1/sinab/planificacionmedicamentos?tocken=eccbc87e4b5ce2fe28308fd9f2a7baf3';
    $curl = curl_init($service_url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $curl_response = curl_exec($curl);
    curl_close($curl);
    $respuesta = json_decode($curl_response,true);
        foreach ($respuesta['respuesta'] as $pr ) {
          $nuevaProgramacion = new CtlPlanificacion();
          $nuevaProgramacion->setIdProgramacion($pr["0"]);
          $nuevaProgramacion->setDescripcionProgramacion($pr["1"]);
          $em->persist($nuevaProgramacion);
          $em->flush($nuevaProgramacion);
        }
  }
  function cargarUnidades($em){
    /*--------SINCRONIZACION DE UNIDADES DE MEDIDA----------*/
    $service_url = 'http://192.168.1.4:8080/v1/sinab/unidadesmedidas?tocken=eccbc87e4b5ce2fe28308fd9f2a7baf3';
    $curl = curl_init($service_url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $curl_response = curl_exec($curl);
    curl_close($curl);
    $respuesta = json_decode($curl_response,true);
        foreach ($respuesta['respuesta'] as $u) {
          $nuevaUnidad = new CtlUnidadMedida();
          $nuevaUnidad->setDescripcion($u["1"]);

          $em->persist($nuevaUnidad);
          $em->flush($nuevaUnidad);
        }
  }
function cargarProductos($em){
  /*-------SINCRONIZACION DE PRODUCTOS ---------------*/
  
   $service_url = 'http://192.168.1.4:8080/v1/sinab/medicamentos?tocken=eccbc87e4b5ce2fe28308fd9f2a7baf3';
    $curl = curl_init($service_url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $curl_response = curl_exec($curl);
    curl_close($curl);
    $respuesta = json_decode($curl_response,true);
        foreach ($respuesta['respuesta'] as $p) {
          $nuevoProducto = new CtlProducto();
          $nuevoProducto->setIdProductoSibasi($p["0"]);
          $nuevoProducto->setCodigoProducto($p["1"]);
          $nuevoProducto->setNombreProducto($p["2"]);
          $um=$em->getRepository('MinsalModeloBundle:CtlUnidadMedida')->find($p["3"]);
          $nuevoProducto->setUnidadMedidaProducto($um);
          $nuevoProducto->setIdEstablecimientoSinab($p["4"]);
          $em->persist($nuevoProducto);
          $em->flush($nuevoProducto);
        }

}
function cargarproductoContrato($em){
  $service_url = 'http://192.168.1.4:8080/v1/sinab/medicamentoscontratos?tocken=eccbc87e4b5ce2fe28308fd9f2a7baf3';
  $curl = curl_init($service_url);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
  $curl_response = curl_exec($curl);
  curl_close($curl);
  $respuesta = json_decode($curl_response,true);
  $contador = 0;
  foreach ($respuesta['respuesta'] as $p) {
    $contador = $contador +1;
    /*$nuevoProductoContrato = new MtnProductoContrato();
    $nuevoProductoContrato->setMtnProducto($p["0"]);
    $nuevoProductoContrato->setMtnContrato($p["2"]);
    $nuevoProductoContrato->setMtnProveedor($p["1"]);
    $nuevoProductoContrato->setCantidad($p["3"]);
    $nuevoProductoContrato->setPrecioUnitario($p["4"]);
    $nuevoProductoContrato->set($p["5"]);

    $em->persist($nuevoProductoContrato);
    $em->flush($nuevoProductoContrato);*/

    $rsm = new ResultSetMapping();
          $query = $em->createNativeQuery('INSERT INTO mtn_producto_contrato(
            id, mtn_producto, mtn_contrato, cantidad, precio_unitario, mtn_proveedor, 
            id_establecimiento_sinab)
    VALUES (?, ?, ?, ?, ?, ?, 
            ?);', $rsm);
          //id pc.IDPRODUCTO, pc.IDPROVEEDOR, pc.IDCONTRATO, pc.CANTIDAD, pc.PRECIOUNITARIO,pc.IDESTABLECIMIENTO
          $query->setParameter(1, $contador);
          //mtn_producto
          $query->setParameter(2, $p["0"]);
          //mtn_contrato
          $query->setParameter(3, $p["2"]);
          //cantidad
          $query->setParameter(4, $p["3"]);
          //precio_unitario
          $query->setParameter(5, $p["4"]);
          //mtn_proveedor
          $query->setParameter(6, $p["1"]);
          //id_establecimiento_sinab
          $query->setParameter(7, $p["5"]);

          $query->getResult();


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
    //cargarProgramaciones($em);
    //cargarPlanificaciones($em);
    //cargarUnidades($em);
    //cargarProductos($em);
    //cargarproductoContrato($em);
    /*se renderizan los contratos e incrementos */
    $compras= $em->getRepository('MinsalModeloBundle:CtlModalidadCompra')->findAll();

    $incrementos = $em->getRepository('MinsalModeloBundle:CtlIncremento')->findAll();
    $prorrogas = $em->getRepository('MinsalModeloBundle:CtlProrroga')->findAll();

    $estimaciones = $em->getRepository('MinsalModeloBundle:CtlProgramacion')->findAll();
    $planificaciones = $em->getRepository('MinsalModeloBundle:CtlPlanificacion')->findAll();

    return $this->render('MinsalPlantillaBundle:InicioProceso:inicio.html.twig', array(
      //Elementos del scrolleditable
      'compras' => $compras,
      //elementos del select
      'estimaciones' => $estimaciones,
      'planificaciones'=>$planificaciones,
      //datos de tablas de incremento o prorroga
      'incrementos' => $incrementos,
      'prorrogas' => $prorrogas
    ));
  
  }
  

  /*Funcion para crear incrementos*/
  public function crearIncrementoAction(Request $request)
  {
          
        $prorroga = $request->get('esProrroga');

        //Confirmamos que sea un prorroga
        if($prorroga == 1){
        $em = $this->getDoctrine()->getManager();

        //Obtenemos los valores que nos interesan
        $cod = $request->get('cod');
        $planificacion = $request->get('planificacion');
        $estado = $em->getRepository('MinsalModeloBundle:CtlEstados')->find(6);
        $prorroga = new CtlProrroga();
        $compra = $em->getRepository('MinsalModeloBundle:CtlModalidadCompra')->findById($cod);
        $prorroga->setEstadoProrroga($estado);
        $prorroga->setFechaCreacion(new \DateTime("now"));

        foreach($compra as $com)
        {
          $prorroga->setProrrogaModalidadCompra($com);
        }

        $programacion = $em->getRepository('MinsalModeloBundle:CtlPlanificacion')->find($planificacion);
        //Se asigna la planificacion a la prorroga
        $prorroga->setPlanificacion($programacion);

        $em->persist($prorroga);
        $em->flush($prorroga);

        


    }
    {
      $em = $this->getDoctrine()->getManager();
      $cod = $request->get('cod');
      $meses = $request->get('meses');
      $estimacion = $request->get('estimacion');
      $estado = $em->getRepository('MinsalModeloBundle:CtlEstados')->find(1);
      $incremento = new CtlIncremento();
      $compra = $em->getRepository('MinsalModeloBundle:CtlModalidadCompra')->findById($cod);
      $incremento->setestadoIncremento($estado);
      $incremento->setMesesDesestimar($meses);
      $incremento->setFechaCreacion(new \DateTime("now"));

      foreach($compra as $com)
      {
        $incremento->setIncrementoModalidadCompra($com);
       }

      $programacion = $em->getRepository('MinsalModeloBundle:CtlProgramacion')->find($estimacion);
      //Se asignac la estimacion al incremento
      $incremento->setEstimacion($programacion);
      //Se persisten los datos        
      $em->persist($incremento);
      $em->flush($incremento);
    


    }

      $compras= $em->getRepository('MinsalModeloBundle:CtlModalidadCompra')->findAll();
      $incrementos = $em->getRepository('MinsalModeloBundle:CtlIncremento')->findAll();
      $estimaciones = $em->getRepository('MinsalModeloBundle:CtlProgramacion')->findAll();
      $prorrogas = $em->getRepository('MinsalModeloBundle:CtlProrroga')->findAll();
    
    return $this->render('MinsalPlantillaBundle:InicioProceso:inicio.html.twig', array(
      'prorrogas' => $prorrogas,
      'compras' => $compras,
      'incrementos' => $incrementos,
      'estimaciones' => $estimaciones,
      

    ));


  }


  public function depurarMedicamentosAction(Request $request)
  {
    return $this->render('MinsalPlantillaBundle:Analizador:depurarMedicamentos.html.twig'); 
  }
}
