<?php

namespace Minsal\ContratoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/*
	 * Direccion Fisica: src/Minsal/ContratoBundle/Controller/AnalizadorController.php

*/

class AnalizadorController extends Controller
{	
	/*
		* funcion para el renderizado de la dashboard del analisis, recibe como parametro
		el codigo de licitacion
	*/
	public function dashboardAction()
	{
		
		return $this->render('MinsalPlantillaBundle:Analizador:dashboard.html.twig');
	}

	/*
		* funcion para guardar el analisis generado por unabas en la vista dashboard
	*/

	public function guardarAnalisis($analisis_json)
	{
		
	}

}
