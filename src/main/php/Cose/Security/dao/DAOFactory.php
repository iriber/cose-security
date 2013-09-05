<?php
namespace Cose\Security\dao;

use Cose\Security\dao\impl\UserDoctrineDAO;



/**
 * Factory de DAOs
 *  
 * @author bernardo
 *
 */
class DAOFactory {
	
	//datos para la conexi�n al medio persistente.
	
	/**
	 * DAO para User.
	 * 
	 * @return IUserDAO
	 */
	public static function getUserDAO(){
	
		return new UserDoctrineDAO();	
	}
}