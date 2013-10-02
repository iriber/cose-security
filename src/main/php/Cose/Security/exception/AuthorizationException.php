<?php
namespace Cose\Security\exception;

use Cose\exception\ServiceException;

/**
 * Excepción par indicar que no se tiene autorización para ejecutar
 * un determinado servicio.
 * 
 * @author bernardo
 * @since 01-10-2013
 */

class AuthorizationException extends ServiceException{
	
	private $permission;
	
	public function __construct($permission,$msg=null){
		if($msg==null)
			$msg = "authorization.exception.msg";
		
		parent::__construct($msg);
		
		$this->setPermission($permission);
	}
	

	public function getPermission()
	{
	    return $this->permission;
	}

	public function setPermission($permission)
	{
	    $this->permission = $permission;
	}
}
