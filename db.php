<?php 
$servername = "localhost";
$username = "admin";
$password = "f!8*DNmysql";
$db = 'contacts';

// Create connection
$conn = mysqli_connect( $servername, $username, $password, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}else{

	/*Creating Table Users If Not Exists*/

	$queryUsers = "SELECT ID FROM users";
	$resultUsers = mysqli_query($conn, $queryUsers);

	if(empty($resultUsers)) {
        $queryUsers = "CREATE TABLE users (
          	id int(11) AUTO_INCREMENT,
          	email varchar(255) NOT NULL,
          	password varchar(255) NOT NULL,
          	confirm_password varchar(255) NOT NULL,
          	phone_number varchar(255) NOT NULL,
          	created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
          	PRIMARY KEY  (ID)
        )";
        $resultUsers = mysqli_query($conn, $queryUsers);
	}


	/*Creating Table Favorites If Not Exists*/

	$queryFavorites = "SELECT ID FROM favorites";
	$resultFavorites = mysqli_query($conn, $queryFavorites);

	if(empty($resultFavorites)) {
        $queryFavorites = "CREATE TABLE favorites (
          	id int(11) AUTO_INCREMENT,
          	fav_user_id varchar(255) NOT NULL,
          	user_id int NOT NULL,
          	created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
          	PRIMARY KEY  (ID),
          	FOREIGN KEY (user_id) REFERENCES users(id)
        )";
        $resultFavorites = mysqli_query($conn, $queryFavorites);
	}
}
