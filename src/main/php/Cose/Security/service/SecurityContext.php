<?php

namespace Cose\Security\service;



/**
 * Contexto de seguridad para los servicios.
 * 
 * @author bernardo
 * @since 14/09/2012
 * 
 */

use Cose\Security\service\impl\SecurityServiceImpl;

use Cose\utils\ReflectionUtils,
	Cose\service\IService;

class SecurityContext {
	
	/**
	 * instancia singleton
	 * @var SecurityContext
	 */
	private static $instance;
	
	/**
	 * @var ISecurityService
	 */
	private $securityService;
	
	/**
	 * usuario autenticado.
	 * @var IUser
	 */
	private $user;
	
	
	/**
	 * instancia singleton
	 */
	public static function getInstance() {
		
		if( self::$instance == null ) {
			
			if(!isset($_SESSION['securityContext'])){
				$_SESSION['securityContext'] = serialize( new SecurityContext() );
			}
			self::$instance = unserialize( $_SESSION['securityContext'] );
			
		}
		return self::$instance;
	}
	
	private function __construct() {
		$this->securityService = new SecurityServiceImpl();
	}
	
	/**
	 * determina si se puede ejecutar el servicio indicado.
	 * @param string $service servicio a ejecutar.
	 * @return boolean
	 */
	public function authorize( IService $service, $method ) {
		
		return $this->securityService->authorize( $this->user, $service, $method );
	}
	
	/**
	 * se loguea el usuario en el contexto de seguridad
	 * @param $username nombre de usuario
	 * @param $password clave
	 * @throws ServiceException 
	 */
	function login( $username, $password ){
		$this->user = $this->securityService->authenticate( $username, $password );
		$_SESSION['securityContext'] = serialize( $this );
	}
	
	/**
	 * se desloguea el usuario en el contexto de seguridad
	 * @throws ServiceException 
	 */
	function logout(){
		$this->user = null;
		$_SESSION['securityContext'] = serialize( $this );
	}
	
	

	public function getUser()
	{
	    return $this->user;
	}

	public function setUser($user)
	{
	    $this->user = $user;
	}
}

?>