<?php
namespace Cose\Security\service;

use Cose\Crud\service\ICrudService;

/**
 * interfaz para el servicio de user
 *  
 * @author bernardo
 *
 */
interface IUserService extends ICrudService {
	
	/**
	 * Recupera un usuario dado el username
	 * @param $username
	 * 
	 * @throws ServiceException
	 */
	function getUserByUsername($username);
	
	
}