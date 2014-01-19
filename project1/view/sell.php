<?php
require_once('../includes/helper.php');
render('header', array('title' => 'Sell'));
?>

<form method="POST" action="sell"> 
	<?php
	foreach($holdings as $holding)
		print htmlspecialchars($holding["symbol"]).
	 	"<input type='radio' name='symbol' value='{$holding["symbol"]}'/>" ;
    ?>
	<input type="submit" value="Sell"/>
</form>

<?php
render('footer');
?> 