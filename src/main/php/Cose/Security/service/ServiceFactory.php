<?php
namespace Cose\Security\service;

use Cose\Security\service\impl\SecurityServiceImpl;

use Cose\Security\service\impl\UserServiceImpl;


/**
 * Factory de servicios
 *  
 * @author bernardo
 *
 */
class ServiceFactory {
	
	/**
	 * @return IUserService
	 */
	public static function getUserService(){
	
		return new UserServiceImpl();	
	}
	
	/**
	 * @return ISecurityService
	 */
	public static function getSecurityService(){
	
		return new SecurityServiceImpl();	
	}
}