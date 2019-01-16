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
		var confirm_password= $.trim($('.register-form input[name="confirmPassword"]').val());

		if(verifyEmailAddress(email) && email != '' && phone != '' && password != '' && confirm_password != '' && password === confirm_password){
			$.ajax({
			 	method: "POST",
			  	url: "http://localhost:8080/ajax.php",
			  	beforeSend: function( xhr ) {
			  		$('.btn-login img').fadeIn();
			  	},		  
		  		data: { 
		  		  	first_name: fname, 
		  		  	last_name: lname, 
		  		  	email: email,
		  		  	phone_number:phone,
		  		  	password:password,
		  		  	confirm_password:confirm_password,
		  		  	action:'register'
		  		}
			})
			.done(function( data ) {
				d = JSON.parse(data);
			    if ( d.status == 'false' ) {
			      	$('.ajax-message').text(d.message);
			    }else{
			    	$('.ajax-message').text('');
			    	$('.success-message').text(d.message);
			    	$('.success-message').fadeIn();
			    	setTimeout(function(){
			    		$('.success-message').fadeOut();
			    	}, 5000);
			    	$('input').removeClass('errorInput');
			    }
			    $('.btn-login img').fadeOut();
			    $('.errorConfirm').fadeOut();
			    $('.errorTxt').fadeOut();
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
	$('.login-form button[type="submit"]').click(function(e){
		e.preventDefault();

		var username = $('.login-form input[name="username"]').val();
		var password = $('.login-form input[name="password"]').val();

		$.ajax({
			 	method: "POST",
			  	url: "http://localhost:8080/ajax.php",
			  	beforeSend: function( xhr ) {},		  
		  		data: { 
		  		  	username: username, 
		  		  	password:password,
		  		  	action:'login'
		  		}
			})
			.done(function( data ) {
			    if ( data ) {
			      console.log( data );
			    }
			});
	});


	/*Ajax Request For Deleting User*/
	$('.delete-sign').click(function(){
		var user_id = $(this).data('id');

		$.ajax({
			 	method: "POST",
			  	url: "http://localhost:8080/ajax.php",	  
		  		data: { 
		  		  	user_id: user_id, 
		  		  	action:'delete'
		  		}
			})
			.done(function( data ) {
			    if ( data ) {
			      console.log( data );
			    }
			});
	});


});