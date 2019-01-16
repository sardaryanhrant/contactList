<?php 


/**
 * 
 */
class User
{
	public $email;
	public $first_name;
	public $last_name;	
	public $phone_number;
	public $password;

	
	function __construct($first_name, $last_name, $email, $password, $phone_number)
	{
		$this->first_name 		= $first_name;
		$this->last_name 		= $last_name;
		$this->email 			= $email;
		$this->password 		= password_hash($password, PASSWORD_DEFAULT);
		$this->phone_number		= $phone_number;
	}

	public function save()
	{
		$servername = "localhost";
		$username = "admin";
		$password = "f!8*DNmysql";
		$db = 'contacts';

		// Create connection
		$conn = mysqli_connect( $servername, $username, $password, $db);

		$sql = "INSERT INTO users (first_name, last_name, email, password, phone_number)
		VALUES ('{$this->first_name}', '{$this->last_name}', '{$this->email}', '{$this->password}', '{$this->phone_number}')";

		if ($conn->query($sql) === TRUE) {
			die(json_encode(array('status'=>'true', 'message'=>'Thank you for your registration
				')));
		} else {
			die(json_encode(array('status'=>'false', 'message'=>'Email already exists in our DB')));
		}
		$conn->close();		
	}

	public function delete($id)
	{
			
	}
}

/**
 * 
 */
class Auth
{
	public $username;
	public $password;

	function __construct($username, $password)
	{
		$this->username = $username;
		$this->password = $password;
	}

	public function getUser()
	{
		$servername = "localhost";
		$username 	= "admin";
		$password 	= "f!8*DNmysql";
		$db 		= 'contacts';

		// Create connection
		$conn = mysqli_connect( $servername, $username, $password, $db);

		$row    = mysqli_fetch_row($result);

		if (!empty($row) && password_verify ($this->password, $row[0])) {
			return $row[1];
		} else {
			return false;
		}
		$conn->close();		
	}
}


?>