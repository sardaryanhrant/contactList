jQuery(document).ready(function($){	

	function verifyEmailAddress(emailAddress){
		var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
  		return emailReg.test(emailAddress);
	}

	/*Registration Ajax Request*/
	$('.register-form button[type="submit"]').click(function(e){
		e.preventDefault();

		var fname 			= $('.register-form input[name="fname"]').val();
		var lname 			= $('.register-form input[name="lname"]').val();
		var email 			= $.trim($('.register-form input[name="email"]').val());
		var phone 			= $.trim($('.register-form input[name="phone"]').val());
		var password        = $.trim($('.register-form input[name="password"]').val());
		var confirmPassword = $.trim($('.register-form input[name="confirmPassword"]').val());

		if(verifyEmailAddress(email) && email != '' && phone != '' && password != '' && confirmPassword != '' && password === confirmPassword){
			$.ajax({
			 	method: "POST",
			  	url: "http://localhost:8080/ajax.php",
			  	beforeSend: function( xhr ) {},		  
		  		data: { 
		  		  	name: "John", 
		  		  	location: "Boston" ,
		  		  	action:'register'
		  		}
			})
			.done(function( data ) {
			    if ( data ) {
			      console.log( data );
			    }
			});
		}else{
			$('.register-form input[required="required"]').each(function(){
				var name = $(this).attr('name');

				if(!$(this).val()){
					$(this).addClass('errorInput');
					$(this).parent().find('.errorTxt').fadeIn();
				}else{
					$(this).removeClass('errorInput');
					$(this).parent().find('.errorTxt').fadeOut();
				}

				if(verifyEmailAddress(email) && email != '' && name == 'email'){
					$(this).removeClass('errorInput');
					$(this).parent().find('.errorTxt').fadeOut();
				}else if(name == 'email'){
					$(this).addClass('errorInput');
					$(this).parent().find('.errorTxt').fadeIn();
				}

				if(password !='' &&  password !== confirmPassword ){
					$('.errorConfirm').fadeIn();
				}else{
					$('.errorConfirm').fadeOut();
				}
			});
		}
	});

	/*Login Ajax Request*/
	$('.login-block button[type="submit"]').click(function(e){
		e.preventDefault();

		$.ajax({
			 	method: "POST",
			  	url: "http://localhost:8080/ajax.php",
			  	beforeSend: function( xhr ) {},		  
		  		data: { 
		  		  	name: "John", 
		  		  	location: "Boston" ,
		  		  	action:'login'
		  		}
			})
			.done(function( data ) {
			    if ( data ) {
			      console.log( data );
			    }
			});

	});
});