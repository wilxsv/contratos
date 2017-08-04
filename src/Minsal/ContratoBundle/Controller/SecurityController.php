<?php

namespace Minsal\ContratoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class SecurityController extends Controller
{
	public function loginAction()
	{
		$authenticationUtils = $this->get('security.authentication_utils');

		$error = $authenticationUtils->getLastAuthenticationError();

		$lastUserName = $authenticationUtils->getLastUsername();

		return $this->render('MinsalIncrementoBundle:Security:login.html.twig', array('last_username' => $lastUserName, 'error' => $error));
	}

	public function loginCheckAction()
	{
		
	}
}
