<?php session_start();
if(isset($_SESSION['user_id']) && $_SESSION['user_id'] != 1){
	header("Location: http://localhost:8080/login.php");
    exit;
}else{
	$servername = "localhost";
	$username 	= "admin";
	$password 	= "f!8*DNmysql";
	$db 		= 'contacts';

	// Create connection
	$conn = mysqli_connect( $servername, $username, $password, $db);
	$res = mysqli_query( $conn, "SELECT * FROM users"); 
	$result = $res->fetch_all(MYSQLI_ASSOC);
	$conn->close();	
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>User Contacts</title>
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<link rel="icon" type="image/png" sizes="32x32" href="https://bioneex.com/wp-content/themes/bioneex/favicon/favicon-32x32.png">
	<link rel="stylesheet" type="text/css" href="http://localhost:8080/css/style.css">
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>	
	<script src="http://localhost:8080/js/usercontact.js"></script>
</head>
<body>
	<a class="logout" href="">Log Out</a>
	<div class="container">		
		<h1>Users Contacts</h1>
		<table class="table">
	  	<thead>
		    <tr>
		      <th scope="col">#</th>
		      <th scope="col">First Name</th>
		      <th scope="col">Last Name</th>
		      <th scope="col">Email</th>		      
		      <th scope="col">Phone Number</th>
		      <th>User Role</th>
		      <th scope="col">Created Date</th>
		    </tr>
	  	</thead>
	  	<tbody>
	  	<?php $i = 1; foreach($result as $row){?>
		    <tr>
		      <th scope="row"><?= $i;?></th>
		      <td><?= $row['first_name'];?></td>
		      <td><?= $row['last_name'];?></td>
		      <td><?= $row['email'];?></td>
		      <td><?= $row['phone_number'];?></td>
		      <td><?= $row['user_role'];?></td>
		      <td><?= $row['created_at'];?> <?php if($row['id'] !=1 ): ?> <span class="delete-sign" data-id="<?= $row['id'];?>">X</span><?php endif; ?></td>
		    </tr>
		<?php $i++; } ?>
	  	</tbody>
	</table>
	</div>
</body>
</html>