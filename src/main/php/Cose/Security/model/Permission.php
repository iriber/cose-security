<?php

namespace Cose\Security\model;

use Cose\model\impl\Entity;

/**
 * Permission
 * @Entity @Table(name="security_permission")
 *  
 * @author bernardo
 * 
 */
class Permission extends Entity{

	/** @Column(type="string") **/
	private $name;
	
	public function getName()
	{
	    return $this->name;
	}

	public function setName($name)
	{
	    $this->name = $name;
	}
	
	public function __toString(){
		return $this->getName();
	}
	
}
