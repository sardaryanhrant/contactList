<?php 

define('__ROOT__', dirname(__FILE__)); 
require_once(__ROOT__.'/db.php'); 
require_once(__ROOT__.'/models.php');


/**
 * 
 */
class Register
{
	public function create()
	{
		$first_name = $_POST['first_name'];
		$last_name = $_POST['last_name'];
		$email = $_POST['email'];
		$phone_number = $_POST['phone_number'];
		$password = $_POST['password'];
		$confirmPassword = $_POST['confirm_password'];

		if(!empty($email) && !empty($phone_number) && !empty($password) && !empty($confirmPassword) && $password === $confirmPassword ){
			$user = new User($first_name, $last_name, $email, $password, $phone_number);
			$user->save();
		}	

	}
}


/**
 * 
 */
class Login
{

	public function checkCredentials()
	{
		$username = $_POST['username'];
		$password = $_POST['password'];
		$user = new Auth($username, $password);

		if($user->getUser()){
			session_start();
			$_SESSION['user_id'] = $user->getUser();
			header("Location: http://localhost:8080");
		}else{
			die(json_encode(array('status'=>false, 'message'=>'Username or password are incorrect')));
		}

	}
}

$action = $_POST['action'];

switch ($action) {
    case "login":
    	$login = new Login;
        die($login->checkCredentials());
        break;
    case "register":
       $register = new Register;
       die($register->create());
        break;
    case "account":
        die($action);
        break;
    case "delete":
        die($action);
        break;
}







?>
