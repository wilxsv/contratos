<?php

namespace Minsal\UsuarioBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class SecurityController extends Controller
{
	public function loginAction()
	{
		$authenticationUtils = $this->get('security.authentication_utils');

		$error = $authenticationUtils->getLastAuthenticationError();

		$lastUserName = $authenticationUtils->getLastUsername();

		return $this->render('MinsalPlantillaBundle:Seguridad:login.html.twig', array(
			'last_username' => $lastUserName,
			'error' => $error)
		);
	}

	public function loginCheckAction()
	{
		global $url;
	}
}
