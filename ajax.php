<?php 

define('__ROOT__', dirname(__FILE__)); 
require_once(__ROOT__.'/db.php'); 


$action = $_POST['action'];

switch ($action) {
    case "login":
        die($action);
        break;
    case "register":
        die($action);
        break;
    case "account":
        die($action);
        break;
}






/**
 * 
 */
class Login
{
	
	function userAuthorization($username, $password){
		$username = $_POST['username'];
		$password = $_POST['password'];

	}
}







?>
