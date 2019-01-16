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
	<section class="login-block">
    <div class="container">
	<div class="row">
		<div class="col-md-5 login-sec">
		    <h2 class="text-center">Register</h2>
		    <form class="register-form">
			  	<div class="form-group">
				    <label for="fname" class="text-uppercase">First Name</label>
				    <input id="fname" name="fname" type="text" class="form-control" placeholder="First Name">			    
			  	</div>
			  	<div class="form-group">
				    <label for="lname" class="text-uppercase">Last Name</label>
				    <input id="lname" name="lname" type="text" class="form-control" placeholder="Last Name">			    
			  	</div>
			  	<div class="form-group">
				    <label for="email" class="text-uppercase">Email <sup>*</sup> </label>
				    <input id="email" required="required" name="email" type="email" class="form-control" placeholder="Email">
				    <span class="errorTxt">Enter an email address please</span>    
				    <div class="ajax-message"></div>
			  	</div>
			  	<div class="form-group">
				    <label for="phone" class="text-uppercase">Phone Number <sup>*</sup></label>
				    <input id="phone" required="required" name="phone" type="tel" class="form-control" placeholder="Phone Number">
				    <span class="errorTxt">Enter phone number please</span>			    
			  	</div>
			  	<div class="form-group">
				    <label for="exampleInputPassword1" class="text-uppercase">Password <sup>*</sup></label>
				    <input type="password" minlength="6" required="required" name="password" class="form-control" placeholder="">
				    <span class="errorTxt">Enter password please</span>
			  	</div>  
			  	<div class="form-group">
				    <label for="confirmPassword" class="text-uppercase">Confirm Password <sup>*</sup></label>
				    <input id="confirmPassword"  minlength="6" required="required" name="confirmPassword" type="password" class="form-control" placeholder="Confirm Password">
				    <span class="errorTxt">Confirm password please</span>
				    <span class="errorConfirm">Passwords are not same</span>
			  	</div>
  
			    <div class="form-check">			    	
				    <label class="form-check-label">
				      <!-- <input type="checkbox" class="form-check-input"> -->
				      <!-- <small>Remember Me</small> -->
				    </label>
				    <button type="submit" class="btn btn-login float-right">
				    	Register
				    	<img width="15" height="auto" style="margin-top: -4px;" src="images/loading.gif">
					</button>
					<div class="success-message">
						Thanm you for your registration 
					</div>
			  	</div>			  
			</form>
		</div>
		<div class="col-md-7 banner-sec">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            	<div class="carousel-inner" role="listbox">
				    <div class="carousel-item active">
				      	<!-- <img class="d-block img-fluid" src="https://static.pexels.com/photos/33972/pexels-photo.jpg" alt="First slide">  -->
				    </div>
	            </div>		    
			</div>
		</div>
	</div>
</section>
</body>
</html>