<?php
namespace Cose\Security\exception;

use Cose\exception\ServiceException;

/**
 * Excepción que indica que el password es incorrecto.
 * 
 * @author bernardo
 * @since 04-08-2013
 */

class InvalidPasswordException extends ServiceException{
	
	public function __construct($msg=null){
		if($msg==null)
			$msg = "invalid password";
		
		parent::__construct($msg);
	}
	
}
