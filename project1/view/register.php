<?php
require_once('../includes/helper.php');
render('header', array('title' => 'C$75 Finance'));
?>

			<p class="navbar-text navbar-right">Registering</a></p>
		</div>
	</div>
</div>
<br/>
<br/>
<br/>
<br/>
<div class="container">
	<div class="jumbotron col-md-6 col-md-offset-3">
		<form method="POST" action="register" onsubmit="return validateForm();" role="form">
		   	<div class="form-group">
		    	<label>Email address</label>
		    	<input type="email" name="email" class="form-control" placeholder="Enter email">
		  	</div>
		  	<div class="form-group">
		   	 	<label>Password</label>
		    	<input type="password" name="password" class="form-control" placeholder="Password">
		  	</div>
		  	<div class="form-group">
		   	 	<label>Confirm Password</label>
		    	<input type="password" name="confirmpassword" class="form-control" placeholder="Confirm Password">
		  	</div>
			<div class="checkbox">
			    <label>
			      <input type="checkbox"> Agree to Terms and Conditions
			    </label>
		  	</div>
		  	<input type="submit" value="Register" class="btn btn-primary"/>
		</form>
	</div>
</div>

<script type='text/javascript'>
function validateForm(){
	isValid = true;
	// check if the email address was entered (min=6: x@x.to)
	emailField = $("input[name=email]");
	if (emailField.val().length < 6)
		isValid = false;
	if($("input[name=password]") == $("input[name=confirmpassword]")){
		return isValid;
	}
}
$("input[name=email]").focus();
</script>

<?php
render('footer');
?>