<?php
namespace Cose\Security\annotation;

use Addendum\Annotation;

/**
 * Annotation para definir la seguridad sobre los servicios
 * 
 * @author bernardo
 * @since 01/10/2013
 */
class Secured extends Annotation {

	public $permission;
	
}