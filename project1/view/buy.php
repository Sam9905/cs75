<?php
require_once('../includes/helper.php');
render('header', array('title' => 'Buy'));
?>

<form method="POST" action="buy"> 
	Symbol : <input type="text" name="symbol"/>
	Number of shares : <input type="text" name="shares"/>
	<input type="submit" value="Buy"/>
</form>

<?php
render('footer');
?>