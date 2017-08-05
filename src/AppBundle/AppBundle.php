<?php

namespace AppBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;


use Symfony\Component\Security\Http\Authentication\AuthenticationSuccessHandlerInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Router;

class AppBundle extends Bundle
{

}



class LoginSuccessHandler implements AuthenticationSuccessHandlerInterface
{
    protected $router, $security;
    
    public function __construct(Router $router, SecurityContext $security)
    {
        $this->router = $router;
        $this->security = $security;
    }
    
    public function onAuthenticationSuccess(Request $request, TokenInterface $token)
    {
        
        //$url = 'minsal_contrato_inicio_proceso_inicio';
        if($this->security->isGranted('ROLE_UNABAST')) {
            $url = 'minsal_contrato_inicio_proceso_inicio';
        }
        elseif ($this->security->isGranted('ROLE_UACI')){
        	$url = 'minsal_contrato_listado_proceso';
        }
        elseif ($this->security->isGranted('ROLE_UFI')) {
        	$url = 'minsal_contrato_listado_incrementos';
        }

        $response = new RedirectResponse($this->router->generate($url));
            
        return $response;
    }
}
