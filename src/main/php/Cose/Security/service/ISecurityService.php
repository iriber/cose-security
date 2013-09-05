<?php
namespace Cose\Security\service;

use Cose\Security\model\User;
use Cose\Security\exception\UserNotFoundException;
use Cose\Security\exception\InvalidPasswordException;

use Cose\exception\ServiceException,
	Cose\service\IService;

/**
 * Interface que define los métodos de seguridad
 * para los servicios.
 * 
 * @author bernardo
 * @since 14/09/2012
 *
 */
interface ISecurityService extends IService{

	/**
	 * se autentica el usuario
	 * @param $username nombre de usuario
	 * @param $password clave
	 * @return IUser
	 * @throws UserNotFoundException, InvalidPasswordException, ServiceException 
	 */
	function authenticate( $username, $password );
	
	/**
	 * determina si el usuario tiene permisos para ejecutar el servicio.
	 * @param $user usuario
	 * @param $service servicio
	 * @return boolean
	 * @throws ServiceException
	 */
	function authorize( User $user, IService $service, $method="" );
	
		
}
