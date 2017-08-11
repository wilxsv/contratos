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

 function cargarEstablecimientos($em)
  {
    /*---------------Sincronizacion de Establecimientos-------------*/
        $service_url = 'http://192.168.1.14:8080/v1/sinab/establecimientos?tocken=eccbc87e4b5ce2fe28308fd9f2a7baf3';
        $curl = curl_init($service_url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $curl_response = curl_exec($curl);
        curl_close($curl);
        $respuesta = json_decode($curl_response,true);
        foreach ($respuesta['respuesta'] as $establecimiento ) {
          $rsm = new ResultSetMapping();
          $query = $em->createNativeQuery('INSERT INTO ctl_establecimiento(codigo_establecimiento, nombre_establecimiento,id)VALUES (?, ?, ?);', $rsm);
          //ingreso de compra
          $query->setParameter(1, $establecimiento["1"]);
          $query->setParameter(2, $establecimiento["3"]);
          $query->setParameter(3, $establecimiento["0"]);
          $query->getResult();
        }
  }
function cargarCompras($em)
  {
    /*--------------------Sincronizacion de compras -----------------------------------*/

    $service_url = 'http://192.168.1.14:8080/v1/sinab/procesoscompras?tocken=eccbc87e4b5ce2fe28308fd9f2a7baf3';

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
function cargarProveedores($em){
  /* ingreso de proveedores */
      $service_url = 'http://192.168.1.14:8080/v1/sinab/proveedoresporcontratos?tocken=eccbc87e4b5ce2fe28308fd9f2a7baf3';
      $curl = curl_init($service_url);
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
      $curl_response = curl_exec($curl);
      curl_close($curl);
      $respuesta = json_decode($curl_response,true);
      foreach ($respuesta['respuesta'] as $proveedor ) {
        $rsm = new ResultSetMapping();
          $query = $em->createNativeQuery('INSERT INTO ctl_proveedor(id, codigo_proveedor, nombre_proveedor, estado_proveedor, nit) VALUES (?, ?, ?, ?, ?);', $rsm);
          //ingreso de compra
          $query->setParameter(1, $proveedor["0"]);
          $query->setParameter(2, $proveedor["3"]);
          $query->setParameter(3, $proveedor["1"]);
          $query->setParameter(4, 4);
          $query->setParameter(5, $proveedor["2"]);
          $query->getResult();
      }
}
function cargarContratos($em)
  {
    /*--------------Sincronizacion de contratos y verificacion de actualizacion------------------*/

    $service_url = 'http://192.168.1.14:8080/v1/sinab/procesoscompras?tocken=eccbc87e4b5ce2fe28308fd9f2a7baf3';
    $curl = curl_init($service_url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $curl_response = curl_exec($curl);
    curl_close($curl);
    $respuesta = json_decode($curl_response,true);
    foreach ($respuesta['respuesta'] as $datoNuevo) {
          $rsm = new ResultSetMapping();
          $query = $em->createNativeQuery('INSERT INTO ctl_contrato(id, numero_modalidad, establecimiento, monto_contrato,numero_contrato,id_proveedor) VALUES (
            ?, ?, ?, ?, ?,?);', $rsm);
          //ingreso de compra
          $obj = $em->getRepository('MinsalModeloBundle:CtlModalidadCompra')->findBy(array(
              'numeroModalidad'=>$datoNuevo["4"]
            ));
          if ($obj != null) {
            $query->setParameter(1, $datoNuevo["3"]);
          $query->setParameter(2, $obj["0"]->getId());
          
          $query->setParameter(3, $datoNuevo["2"]);
          $query->setParameter(4, $datoNuevo["5"]);
          $query->setParameter(5, $datoNuevo["0"]);
          $query->setParameter(6, $datoNuevo["1"]);
          $query->getResult();
          }
          
            
          
    }

    
  }

  



  function cargarProgramaciones($em){
    /*--------SINCRONIZACION DE PROGRAMACIONES-------------*/
    $service_url = 'http://192.168.1.14:8080/v1/sinab/estimacionesmedicamentos?tocken=eccbc87e4b5ce2fe28308fd9f2a7baf3';
    $curl = curl_init($service_url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $curl_response = curl_exec($curl);
    curl_close($curl);
    $respuesta = json_decode($curl_response,true);
        foreach ($respuesta['respuesta'] as $pr ) {
          $rsm = new ResultSetMapping();
          $query = $em->createNativeQuery('INSERT INTO ctl_programacion(
            id, descripcion_programacion)
    VALUES (?, ?);', $rsm);
            $query->setParameter(1, $pr["0"]);
          $query->setParameter(2, $pr["1"]);
          $query->getResult();
  }
}

  function cargarPlanificaciones($em){
  /*--------SINCRONIZACION DE PLANIFICACIONES-------------*/
    $service_url = 'http://192.168.1.14:8080/v1/sinab/planificacionmedicamentos?tocken=eccbc87e4b5ce2fe28308fd9f2a7baf3';
    $curl = curl_init($service_url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $curl_response = curl_exec($curl);
    curl_close($curl);
    $respuesta = json_decode($curl_response,true);
        foreach ($respuesta['respuesta'] as $pr ) {
          $rsm = new ResultSetMapping();
          $query = $em->createNativeQuery('INSERT INTO ctl_planificacion(
            id, descripcion_programacion)
    VALUES (?, ?);', $rsm);
            $query->setParameter(1, $pr["0"]);
          $query->setParameter(2, $pr["1"]);
          $query->getResult();
        }
  }
  function cargarUnidades($em){
    /*--------SINCRONIZACION DE UNIDADES DE MEDIDA----------*/
    $service_url = 'http://192.168.1.14:8080/v1/sinab/unidadesmedidas?tocken=eccbc87e4b5ce2fe28308fd9f2a7baf3';
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
  
   $service_url = 'http://192.168.1.14:8080/v1/sinab/medicamentos?tocken=eccbc87e4b5ce2fe28308fd9f2a7baf3';
    $curl = curl_init($service_url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $curl_response = curl_exec($curl);
    curl_close($curl);
    $respuesta = json_decode($curl_response,true);
        foreach ($respuesta['respuesta'] as $p) {
          $rsm = new ResultSetMapping();
          $query = $em->createNativeQuery('INSERT INTO ctl_producto(
            id, unidad_medida_producto, codigo_producto, nombre_producto, 
            estado_producto, establecimiento_producto)
    VALUES (?, ?, ?, ?, 
            ?, ?);', $rsm);
            $query->setParameter(1, $p["0"]);
            $query->setParameter(2, $p["3"]);
            
            $query->setParameter(3, $p["1"]);
            $query->setParameter(4, $p["2"]);
            $query->setParameter(5, 9);
            $query->setParameter(6, $p["4"]);
            $query->getResult();
        }

}
function cargarproductoContrato($em){
  $service_url = 'http://192.168.1.14:8080/v1/sinab/medicamentoscontratos?tocken=eccbc87e4b5ce2fe28308fd9f2a7baf3';
  $curl = curl_init($service_url);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
  $curl_response = curl_exec($curl);
  curl_close($curl);
  $respuesta = json_decode($curl_response,true);
  $contador = 0;
  foreach ($respuesta['respuesta'] as $p) {
    $contador++;
          $rsm = new ResultSetMapping();
          $query = $em->createNativeQuery('INSERT INTO mtn_producto_contrato(
            id, mtn_producto, mtn_contrato, cantidad, precio_unitario, mtn_proveedor, 
            mtn_establecimiento)
    VALUES (?, ?, ?, ?, ?, ?, 
            ?);', $rsm);
          //C.IDPRODUCTO, PC.IDPROVEEDOR, PC.IDCONTRATO, PC.CANTIDAD, PC.PRECIOUNITARIO,PC.IDESTABLECIMIENTO
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
          //mtn_establecimiento
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
        $estado = $em->getRepository('MinsalModeloBundle:CtlEstados')->findOneById(6);
        $prorroga = new CtlProrroga();
        $compra = $em->getRepository('MinsalModeloBundle:CtlModalidadCompra')->findById($cod);
        $prorroga->setEstadoProrroga($estado);
        $prorroga->setFechaCreacion(new \DateTime("now"));

        foreach($compra as $com)
        {
          $prorroga->setProrrogaModalidadCompra($com);
        }

        $programacion = $em->getRepository('MinsalModeloBundle:CtlPlanificacion')->findOneById($planificacion);
        //Se asigna la planificacion a la prorroga
        $prorroga->setPlanificacion($programacion->getId());

        $em->persist($prorroga);
        $em->flush($prorroga);

        return new Response('Prorroga Creada, Por favor espere la depuracion de proveedores');

        


    }
    {
      $em = $this->getDoctrine()->getManager();
      $cod = $request->get('cod');
      $meses = $request->get('meses');
      $estimacion = $request->get('estimacion');
      $estado = $em->getRepository('MinsalModeloBundle:CtlEstados')->findOneById(1);
      $incremento = new CtlIncremento();
      $compra = $em->getRepository('MinsalModeloBundle:CtlModalidadCompra')->findById($cod);
      $incremento->setestadoIncremento($estado);
      $incremento->setMesesDesestimar($meses);
      $incremento->setFechaCreacion(new \DateTime("now"));

      foreach($compra as $com)
      {
        $incremento->setNumeroModalidadCompra($com);
       }
       $programacion = $em->getRepository('MinsalModeloBundle:CtlProgramacion')->findOneById($estimacion);
      
         $incremento->setEstimacion($programacion);
       

      
      //Se asignac la estimacion al incremento
      
      //Se persisten los datos        
      
      if ($incremento != null) {
        $em->persist($incremento);
        $em->flush($incremento);
        return new Response('Incremento Creado, Por favor espere la depuracion de proveedores');
      }
      
    


    }
  }


  public function depurarMedicamentosAction(Request $request)
  {
    return $this->render('MinsalPlantillaBundle:Analizador:depurarMedicamentos.html.twig'); 
  }
}
