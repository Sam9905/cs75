<?php
require_once('../includes/helper.php');
render('header', array('title' => 'C$75 Finance'));
?>

<form method="POST" action="register" onsubmit="return validateForm();">
    E-mail address: <input type="text" name="email" /><br />
    Password: <input type="password" name="password" /><br />
    Confirm Password: <input type="password" name="confirmpassword" /><br />
	<input type="submit" value="Register" />
</form>

<script type='text/javascript'>

function validateForm()
{
	isValid = true;
	// check if the email address was entered (min=6: x@x.to)
	emailField = $("input[name=email]");
	if (emailField.val().length < 6)
		isValid = false;
	if($("input[name=password]") == $("input[name=confirmpassword]")){
		return isValid;
	}
}

// set the focus to the email field (located by id attribute)
$("input[name=email]").focus();

</script>

<?php
render('footer');
?>