<?php
namespace Cose\Security\service\impl;

use Cose\Security\exception\UserNotFoundException;

use Cose\Security\criteria\UserCriteria;

use Cose\Security\dao\DAOFactory, 
	Cose\Security\service\IUserService;

use Cose\Crud\service\impl\CrudService;
use Cose\exception\DAOException;
use Cose\exception\ServiceNoResultException;
/**
 * servicio para user
 *  
 * @author bernardo
 *
 */
class UserServiceImpl extends CrudService implements IUserService {
	
	protected function getDAO(){
		return DAOFactory::getUserDAO();
	}
	
	function validateOnAdd( $entity ){}
	
	function validateOnUpdate( $entity ){}
	
	function validateOnDelete( $oid ){}
	
	/**
	 * (non-PHPdoc)
	 * @see service/Cose\Security\service.IUserService::getUserByUsername()
	 */
	function getUserByUsername($username){
	
		try{
			
			$criteria = new UserCriteria();
			$criteria->setUsername($username);
		
			$user = $this->getSingleResult( $criteria );
	
			return $user;

		
		} catch (ServiceNoResultException $e) {

			throw new UserNotFoundException( $e->getMessage() );
			
		} catch (Exception $e) {
				
			throw new ServiceException( $e->getMessage() );
		}
		
	}	
}