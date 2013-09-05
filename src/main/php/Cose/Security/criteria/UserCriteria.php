<?php
namespace Cose\Security\criteria;

use Cose\criteria\impl\Criteria;

/**
 * criteria de user
 *  
 * @author bernardo
 *
 */
class UserCriteria extends Criteria{

	private $username;

	public function getUsername()
	{
	    return $this->username;
	}

	public function setUsername($username)
	{
	    $this->username = $username;
	}
}

