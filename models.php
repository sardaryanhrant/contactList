<?php 

/**
 * 
 */
class User
{
	protected $firstName;
	protected $lastName;
	protected $email;
	protected $phoneNumber;
	protected $password;
	protected $confirmPassword;

	
	function __construct($firstName,$lastName,$email,$phoneNumber,$password,$confirmPassword)
	{
		$this->email 			= $email;
		$this->lastName 		= $lastName;
		$this->firstName 		= $firstName;
		$this->password 		= $password;
		$this->confirmPassword  = $confirmPassword;
	}

	public function createUser()
	{

	}
}

/**
 * 
 */
class Favorites
{
	
	function __construct(argument)
	{
		# code...
	}
}

/**
 * 
 */
class Messaqes
{
	
	function __construct(argument)
	{
		# code...
	}
}


?>