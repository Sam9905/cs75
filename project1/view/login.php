<?php
require_once('../includes/helper.php');
render('header', array('title' => 'C$75 Finance'));
?>
		    <form class="navbar-form navbar-left" role="form" method="POST" action="login" onsubmit="return validateForm();">
		        <div class="form-group">
		            <input type="text" name="email" placeholder="Email" class="form-control">
		        </div>
		        <div class="form-group">
		            <input type="password" name="password" placeholder="Password" class="form-control">
		        </div>
		       	<button type="submit" value="Login" class="btn btn-success">Sign in</button>
		    </form>
			<p class="navbar-text navbar-right">Not registered yet!! <a href="register" class="navbar-link">REGISTER</a></p>
		</div>
	</div>
</div>
<br/>
<br/>
<br/>
<br/>
<div class="container">
	<div class="jumbotron" style="background-image:url(../images/backblack.jpg);">
		<h1 style="color:#FFCC00;">Stocks and Shares</h1>
		<p style="color:#FFCC00;">Invest your money</p>
	</div>
</div>

<script type='text/javascript'>
function validateForm(){
	isValid = true;
	// check if the email address was entered (min=6: x@x.to)
	emailField = $("input[name=email]");
	if (emailField.val().length < 6)
		isValid = false;
	return isValid;
}
$("input[name=email]").focus();
</script>

<?php
render('footer');
?>
