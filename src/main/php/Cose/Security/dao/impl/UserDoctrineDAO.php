<?php
namespace Cose\Security\dao\impl;

use Cose\Security\model\User;

use Cose\Security\dao\IUserDAO;

use Cose\Crud\dao\impl\CrudDAO;

use Cose\criteria\ICriteria;
use Doctrine\ORM\QueryBuilder;
/**
 * dto para user
 *  
 * @author bernardo
 *
 */
class UserDoctrineDAO extends CrudDAO implements IUserDAO{
	
	protected function getClazz(){
		return get_class( new User() );
	}
	
	
	protected function getQueryBuilder(ICriteria $criteria){
		
		$queryBuilder = $this->getEntityManager()->createQueryBuilder();
		
		$queryBuilder->select('u')->from( $this->getClazz() , 'u');
		
		return $queryBuilder;
	}
	
	protected function getQueryCountBuilder(ICriteria $criteria){
		
		$queryBuilder = $this->getEntityManager()->createQueryBuilder();
		
		$queryBuilder->select('count(u.oid)')->from( $this->getClazz() , 'u');
								
		return $queryBuilder;
	}

	protected function enhanceQueryBuild(QueryBuilder $queryBuilder, ICriteria $criteria){
	
		$username = $criteria->getUsername();
		if( !empty($username) ){
			$queryBuilder->where("u.username = '$username'");
		}
	}
}