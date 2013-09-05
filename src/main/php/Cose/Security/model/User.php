<?php
namespace Cose\Security\model;

use Cose\Security\model\UserGroup;

use Cose\model\impl\Entity;

/**
 * User
 * @Entity @Table(name="security_user")
 *  
 * @author bernardo
 * 
 */
class User extends Entity{

	/** @Column(type="string") **/
	private $username;
	
	/** @Column(type="string") **/
	private $password;

	/** @Column(type="string") **/
	private $name;
	
	/** @Column(type="string") **/
	private $email;
	
    /**
     * @ManyToMany(targetEntity="UserGroup")
     * @JoinTable(name="security_users_groups",
     *      joinColumns={@JoinColumn(name="user_oid", referencedColumnName="oid")},
     *      inverseJoinColumns={@JoinColumn(name="usergroup_oid", referencedColumnName="oid")}
     *      )
     */
    private $groups;

	public function getUsername()
	{
	    return $this->username;
	}

	public function setUsername($username)
	{
	    $this->username = $username;
	}

	public function getPassword()
	{
	    return $this->password;
	}

	public function setPassword($password)
	{
	    $this->password = $password;
	}
	
	public function __toString(){
		return $this->getUsername();
	}
	


	public function getGroups()
	{
	    return $this->groups;
	}

	public function setGroups($groups)
	{
	    $this->groups = $groups;
	}
	
	public function hasUsergroup( UserGroup $group ){
	
		$ok = false;
		
		foreach ($this->getGroups() as $myGroup) {
			$ok = $group->getOid()== $myGroup->getOid();
			if( $ok )
				break;
		}
		
		return $ok;
		
	}

	public function getName()
	{
	    return $this->name;
	}

	public function setName($name)
	{
	    $this->name = $name;
	}

	public function getEmail()
	{
	    return $this->email;
	}

	public function setEmail($email)
	{
	    $this->email = $email;
	}
}
