<?php
namespace Cose\Security\exception;

use Cose\exception\ServiceException;

/**
 * Excepción que indica que el usuario no fue encontrado.
 * 
 * @author bernardo
 * @since 04-08-2013
 */


class UserNotFoundException extends ServiceException{
	
	public function __construct($msg=null){
		if($msg==null)
			$msg = "user not found";
		
		parent::__construct($msg);
	}
	
}
