<?php
namespace Cose\Security\service\impl;

use Cose\Security\service\ServiceFactory;

use Cose\Security\model\User, 
	Cose\Security\service\ISecurityService,
	Cose\Security\service\SecurityContext,
	Cose\Security\exception\InvalidPasswordException;

use Cose\utils\ReflectionUtils;

use Cose\exception\ServiceException,
	Cose\exception\DAOException,
	Cose\service\impl\Service,
	Cose\service\IService;

/**
 * Interface para los servicios de seguridad
 * 
 * @author bernardo
 *
 */
class SecurityServiceImpl extends Service implements ISecurityService{

	/**
	 * (non-PHPdoc)
	 * @see service/impl/Cose\service\impl.Service::getDAO()
	 */
	protected function getDAO(){}
	
	/**
	 * (non-PHPdoc)
	 * @see Cose\service.ISecurityService::authenticate()
	 */
	function authenticate( $username, $password ){

		//\Logger::getLogger(__CLASS__)->info("autenticando $username, $password" );
		
		//throw new ServiceException("autenticando $username, $password");
		
		$userService = ServiceFactory::getUserService();
		$user = $userService->getUserByUsername($username);
		
		if( $password != $user->getPassword() )
			throw new InvalidPasswordException();			
		
		return $user;
	}
	
	/**
	 * (non-PHPdoc)
	 * @see Cose\service.ISecurityService::authorize()
	 */
	function authorize( User $user, IService $service, $method="" ){
		//\Logger::getLogger(__CLASS__)->info("autorizando $user,  service: " . get_class($service) .  " method: $method");
		return true;
	}

}